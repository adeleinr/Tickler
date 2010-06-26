<?php

class Proxy{

	

	static function recordClick($fid, $database){
		
		$sql = "UPDATE
					CLICK
				SET 
					FEED_CLICKS = FEED_CLICKS + 1
				WHERE
					FK_FEED_ID = $fid";
		
		echo $sql;
		$res = $database->query($sql);
		return $res;
		
	}


}

?>