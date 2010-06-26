<?php

/**
  * Class for managing MySQL RDBMS
  *
  */
class Database
{
    private $hostname = "";
    private $username = "";
    private $password = "";
    private $dbName = "";
	static private $dbConnection = false;
    public $errorTrace = Array();
    
    /**
	  * Constructs database connection
	  *
	  * @param String $hostname
	  * @param String $username
	  * @param String $password
	  * @param String $dbName
	  *
	  */
    function __construct($hostname, $username, $password, $dbName) 
	{
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
        
		if (!self::$dbConnection) {        
			self::$dbConnection = @mysql_connect($this->hostname, $this->username, $this->password);
		}          
        
		@mysql_select_db($this->dbName, self::$dbConnection);
        
		if (mysql_errno())
		{
			$this->errorTrace[] = mysql_error();
        }
    }
    
	/**
	  * Queries data
	  *
	  * @param String $sql
	  * @return	Resource
	  *
	  */
    public function query($sql) 
	{
        $dataSet = @mysql_query($sql, self::$dbConnection);
        
		if (!$dataSet) 
		{
			$this->errorTrace[] = mysql_error();
		}
        
		return $dataSet;
    }
    
	/**
	  * Fetches row from query result
	  *
	  * @param Resource $dataSet
	  * @return Array
	  *
	  */
    public function fetchRow($dataSet) 
	{
		return @mysql_fetch_assoc($dataSet);
	}
    
	/**
	  * Counts rows from query result
	  *
	  * @param Resource $dataSet
	  * @return Integer
	  *
	  */
    public function countRows($dataSet) 
	{
		return @mysql_num_rows($dataSet);
    }
    
	/**
	  * Counts affected rows from query result
	  *
	  * @param Resource $dataSet
	  * @return Integer
	  *
	  */
    public function affectedRows() 
	{
		return @mysql_affected_rows();
    }
    
        
	/**
	  * Changes dataset pointer position
	  *
	  * @param Resource	$dataSet
	  * @param Integer $position
	  * @return void
	  *
	  */
    public function changePosition($dataSet, $position) 
	{
        @mysql_data_seek($dataSet, $position);
    }
    
	/**
	  * Gets the last primary key stored in any table
	  *
	  * @return	Integer
	  *
	  */
    public function getLastId() 
	{
		return @mysql_insert_id();
    }
}

?>
