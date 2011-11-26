
<?php     

	 function object_to_array($data){
	  if(is_array($data) || is_object($data)){
	    $result = array(); 
	    foreach($data as $key => $value)
	    { 
	      $result[$key] = $this->object_to_array($value); 
	    }
	    return $result;
	  }
	  return $data;
	}


  function jsonDecode ($json) 
  { 
      $json = str_replace(array("\\\\", "\\\""), array("&#92;", "&#34;"), $json); 
      $parts = preg_split("@(\"[^\"]*\")|([\[\]\{\},:])|\s@is", $json, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE); 
      foreach ($parts as $index => $part) 
      { 
          if (strlen($part) == 1) 
          { 
              switch ($part) 
              { 
                  case "[": 
                  case "{": 
                      $parts[$index] = "array("; 
                      break; 
                  case "]": 
                  case "}": 
                      $parts[$index] = ")"; 
                      break; 
                  case ":": 
                    $parts[$index] = "=>"; 
                    break;    
                  case ",": 
                    break; 
                  default: 
                      return null; 
              } 
          } 
          else 
          { 
              if ((substr($part, 0, 1) != "\"") || (substr($part, -1, 1) != "\"")) 
              { 
                  return null; 
              } 
          } 
      } 
      $json = str_replace(array("&#92;", "&#34;", "$"), array("\\\\", "\\\"", "\\$"), implode("", $parts)); 
      return eval("return $json;"); 
  } 


$json_url = 'http://api.brightcove.com/services/library?command=find_playlist_by_id&media_delivery=http&token=mfu5Nh2a27pJx7LrgZbLx363WrLDHUmtJ5BXY0GkYK4.&playlist_id=1045731469001';
$ch = curl_init( $json_url );
	$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => array('Content-type: application/json')
);

curl_setopt_array( $ch, $options );


$result = curl_exec($ch);

$videos = json_decode($result)->videos;


//echo '<pre>';print_r( $videos );echo '</pre>';  


foreach( $videos  as  $key => $video ){
	echo $key."<br />";
	echo $video->id."<br />";
	echo $video->name."<br />";
	echo $video->thumbnailURL."<br />";
}



?>
