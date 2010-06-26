<?php 

class Authentication
{	
	/**
	 * Start the session
	 * 
	 */
	static function init() 
	{
		if( !isset($_SESSION) )
		{
			session_start();
		}
				
	}
	
	/**
	 * Authenticate a user
	 * 
	 * @param String $username
	 * @param String $password
	 * @param Array  $session
	 * @param String $profileName
	 * @param Object $database
	 * @return Mixed
	 * 
	 */
	static function login($userName, $password, &$session, $profileName, $database)
	{	
		$sql = "SELECT 
					{$profileName}_ID, {$profileName}_EMAIL, {$profileName}_PASSWORD
				FROM
					{$profileName}
				WHERE 
					{$profileName}_EMAIL = '{$userName}' AND {$profileName}_PASSWORD = '" . md5($password) . "'";
					
			
		$userRes = $database->query($sql);
		
		if ( $database->countRows($userRes) > 0 ) 
		{
		    $userRow = $database->fetchRow($userRes);
		    
		    $session["{$profileName}_ID"] = $userRow["{$profileName}_ID"];
		    $session["{$profileName}_EMAIL"] = $userName;
		    
		    return $session["{$profileName}_ID"];
		} 
		else 
		{
		    return 0;	
		}
	} 
	
	/**
	 * Logout a user
	 * 
	 * @return Void
	 * 
	 */
	static function logout()
	{	
		session_destroy();
	} 
	
	/**
	 * Is User Logged In?
	 * 
	 * @param String $session
	 * @param String $profileName
	 * @return Boolean True if user is logged in
	 *  
	 */
	static function isLoggedIn(&$session, $profileName)
	{	
		if ( isset($session["{$profileName}_ID"]) && $session["{$profileName}_ID"] > 0 )
		{
			return true;			
		}    
		
		return false;
	}
	
}

?>