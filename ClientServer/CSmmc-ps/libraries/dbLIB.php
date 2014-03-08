<?php
// FILE: dbLIB (part of WIDiso,
// https://github.com/aleph3d/WIDiso.git)
// TYPE: A function Library (PHP5)
// LICENSE: MIT (Copyright 2014 Hannah Dunitz)
function encodeDataSafe($data) {
	$out = urlencode(htmlentities($data, ENT_QUOTES));
	return $out;
}
function decodeDataSafe($data) {
	$out = stripslashes(urldecode(html_entity_decode($data, ENT_QUOTES)));
	return $out;
}
function myQuery($query) {
	$thequery = NEW DBclass();
	$out =$thequery->simpleQuery($query);
	return $out;
}
class DBclass {
	var $out;
	var $xc;
	
	public function simpleQuery($query) {
		$db = new mysqli(dbhost, dbuser, dbpass, dbname);
		$explode = explode("'",$query);
		$query = "";
		$x = 0;
		while(isset($explode[$x])) {
			if((($x/2) == (floor($x/2))) and $x != 0) {
				$escape = $db->mysqli_real_escape_string($explode[$x]);
				$explode[$x] = "'".$escape."'";
			}
			$query = $query.$explode[$x];
			$x++;
		}
		if(!$result = $db->query($query)){
			return FALSE;
		}
		if(($db->connect_errno > 0)){
			return FALSE;
		}
		$temp['rows'] = $db->mysqli_rows($result);
		$x = 0;
		if($outarray['rows'] > 0) {
			while ($x < $outarray['rows']) {
				$resultrows = $db->mysqli_array($result);
				$outarray['rowdata'][$x] = $resultrows;
				$x++;
			}
			$out = $outarray;
		}
		else {
			$out = $result;
		}
		$db->free();
		$db->close();
		
	}
	
	public function result() {
		$xc = 0;
		if(isset($out['rowdata'][$xc])) {
		$xo = $xc;
		$xc++;
		return $outarray['rowdata'][$xo];
		}
		
	}
	
	public function rows() {
		return $out['rows'];
	}
}