<?php
/**
* Format Class
*/
class Format 
{
 	public function formatDate($date){
 			return date('M j, Y, g:i a', strtotime($date));
 	}

 	public function textShorten($text, $limit = 400){
 		$text = $text." ";
 		$text = substr($text, 0 , $limit);
 		// $text = substr($text, strpos($text, ' '));
 		$text =$text."......";
 		return $text;
 	}

 	public function validation($data){
 		$data = trim($data);
 		$data = stripcslashes($data);
 		$data = htmlspecialchars($data);
 		return $data;
 	}
}

?>