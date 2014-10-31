<?php
	
class tableCreator{

	public static $itemnames = ['Date and Time of Tweet',
								'Tweet',
								'Tweeted By',
								'Screen name',
								'Followers',
								'Friends',
								'Listed'];
								
	public static $followersnames = ['Name',
									'Screen name'];
								
	public static $postnames = ['Posted On','Post','Screen Name'];

	public static function showTimeline($getfield, $string){
		
		echo '<table border="2"><tr>';
		$i = 0;
				
		foreach(self::$itemnames as $name){					
			echo '<th>' . self::$itemnames[$i] . '</th>';
			$i++;
		}
		
		foreach($string as $items){					
			$table .= '<tr>';
			$table .= '<td>' . $items['created_at'] . '</td>';
			$table .= '<td>' . $items['text'] . '</td>';
			$table .= '<td>' . $items['user']['name'] . '</td>';
			$table .= '<td>' . $items['user']['screen_name'] . '</td>';
			$table .= '<td>' . $items['user']['followers_count'] . '</td>';
			$table .= '<td>' . $items['user']['friends_count'] . '</td>';
			$table .= '<td>' . $items['user']['listed_count'] . '</td>';
			$table .= '</tr>';
		}			
		$table .= '</table>';
		echo $table; 
	}
	
	public static function showFollowers($string){
	
		echo '<table border="2"><tr>';
		$i = 0;
				
		foreach(self::$followersnames as $name){					
			echo '<th>' . self::$followersnames[$i] . '</th>';
			$i++;
		}
		
		foreach($string[0] as $items){					
			$table .= '<tr>';
			$table .= '<td>' . $items['name'] .'</td>';
			$table .= '<td>' . $items['screen_name'] . '</td>';
			$table .= '</tr>';
		}			
		$table .= '</table>';
		echo $table; 
	}
	
	public static function showPost($string){

		if (!empty($string)){
    		$postfields = array('status' => 'Test Tweet');
			echo '<h4>Post Successful</h4>';
		}
	}
	
}

?>
