<?php 

class Category{
	
	const imgURL = "/View/ClientPresentation/Images/";

	static function getImageURL($categoryID, $database){
		
		$sql = "SELECT * FROM
					CATEGORY
				WHERE
					CATEGORY_ID = '{$categoryID}'";
		
		$res = $database->query($sql);
		
		if ( $url = $database->fetchRow($res) )
		{
			
			return self::imgURL.$url['CATEGORY_URL'].".png";
		}
		
	}


}


?>