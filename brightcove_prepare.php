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

  function jsonDecode ($json) { 
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
	
	
	$first_set_of_playlist_scroll_left_right = 5;
	
	$playlists = array(
		0 => array(
					'playlist_name' => '101 Extras',
					'id' => '48759451001'
					),
		1 => array(
					'playlist_name' => 'Comedy',
					'id' => '58518976001'
					),
		2 => array(
					'playlist_name' => 'Osmin Webisodes',
					'id' => '1067741571001'
					),
		3 => array(
					'playlist_name' => 'Extreme Extras',
					'id' => '58491372001'
					),	
		5 => array(
					'playlist_name' => 'Model Latina Las Vegas Profiles',
					'id' => '1067741562001'
					),
		6 => array(
					'playlist_name' => 'Mission Menu',
					'id' => '1163757251001'
					),
					
		7 => array(
					'playlist_name' => 'Exclusives',
					'id' => '58551281001'
					),					
												
									
	);
	
	
	foreach( $playlists  as  $playlist){
			$json_url = 'http://api.brightcove.com/services/library?command=find_playlist_by_id&media_delivery=http&token=mfu5Nh2a27pJx7LrgZbLx363WrLDHUmtJ5BXY0GkYK4.&playlist_id='.$playlist['id'];
			$ch = curl_init( $json_url );
				$options = array(
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HTTPHEADER => array('Content-type: application/json')
			);
			
			curl_setopt_array( $ch, $options );
			$result = curl_exec($ch);
			$video['clips']  = json_decode($result)->videos;	
			$video['playlist_name'] = $playlist['playlist_name'];
			$videos[]= 	$video;
	}




?>