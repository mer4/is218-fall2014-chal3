<?php
	
class tableCreator{

	public static $itemnames = ['Time and Date of Tweet',
								'Tweet',
								'Tweeted By',
								'Screen name',
								'Followers',
								'Friends',
								'Listed'];

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
}

?>
