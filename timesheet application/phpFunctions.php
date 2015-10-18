<?php
	/*
	|===================================================================================================|
	|	Project Name:	timesheet
	|	Page Name:		phpFunctions.php
	|	Developed By:	Harshal S. Hirve
	|	Email:			harshalh@synechron.com
	|	Date:			27-04-2010
	|	Purpose:		class file, contains all the common php functions
	|===================================================================================================|
	*/
?>
<?php
include_once("config.php");
class phpFunctions
{
	//-----------------------------------------------------------------------------------------------------------
		public static function getStr($string)
		{										
			/*
				$string = htmlspecialchars(strip_tags(trim($string)),ENT_QUOTES);
				$string = str_replace("&","&amp;",$string);
				$string = str_replace('""',"&quot;",$string);
				$string = str_replace("'","&#039;",$string);
				$string = str_replace("<","&lt;",$string);
				$string = str_replace(">","&gt;",$string);
			*/			
			return htmlspecialchars(strip_tags(trim($string)),ENT_QUOTES);
		}
	//-----------------------------------------------------------------------------------------------------------
		public static function showStr($string)
		{	
			$str = str_replace("\n","<br>",trim($string));
			$str = htmlspecialchars_decode(trim($str), ENT_QUOTES);		
			return $str;
		}
	//-----------------------------------------------------------------------------------------------------------
		public static function showStrForEdit($string)
		{	
			$str = str_replace("<br>","\n",trim($string));
			$str = htmlspecialchars_decode(trim($str), ENT_QUOTES);		
			return $str;
		}
	//-----------------------------------------------------------------------------------------------------------
		public static function displayDate($date,$format)
		{
			switch($format)
			{
				case 1:
					return date("M d, Y",strtotime($date));
					break;
				case 2:
					return date("F j, Y g:i:s a",strtotime($date));
					break;
				case 3:
					return date("M d, Y g:i:s a",strtotime($date));
					break;
				default:
      				 return date("M d, Y",strtotime($date));
			} 
		}
	//-----------------------------------------------------------------------------------------------------------
		# This function makes any text into a url frienly
		# This script is created by wallpaperama.com
		function clean_url($text)
		{
			$text=strtolower($text);
			$code_entities_match = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','=');
			$code_entities_replace = array('-','-','','','','','','','','','','','','','','','','','','','','','','','','');
			$text = str_replace($code_entities_match, $code_entities_replace, $text);
			return $text;
		}
	//-----------------------------------------------------------------------------------------------------------
		public static function writeFile($fileContents)
		{
			try
			{	
				$returnVal = 1;														
				if($handle = fopen(XML_FILE_NAME, 'w+')) 
				{
					if(fwrite($handle, $fileContents) === FALSE) 
					{
						$returnVal = 0;
					}
				}				
				fclose($handle);
				return $returnVal;												
			}						
			catch (Exception $e)
			{
				echo $e->getMessage();
				exit();
			}		
		}	
	//-----------------------------------------------------------------------------------------------------------
		public static function daysInMonth($month, $year)
		{
			if((int)$month>0 && (int)$year>0)
			{
				return cal_days_in_month(CAL_GREGORIAN, $month, $year) ; 		
			}
		}
	//-----------------------------------------------------------------------------------------------------------
		/**
		 * Function to calculate date or time difference.
		 * 
		 * Function to calculate date or time difference. Returns an array or
		 * false on error.
		 *
		 * @author       J de Silva                             <giddomains@gmail.com>
		 * @copyright    Copyright &copy; 2005, J de Silva
		 * @link         http://www.gidnetwork.com/b-16.html    Get the date / time difference with PHP
		 * @param        string                                 $start
		 * @param        string                                 $end
		 * @return       array
		 */
		public static function get_time_difference( $start, $end )
		{
			$uts['start']      =    strtotime( $start );
			$uts['end']        =    strtotime( $end );
			if( $uts['start']!==-1 && $uts['end']!==-1 )
			{
				if( $uts['end'] >= $uts['start'] )
				{
					$diff    =    $uts['end'] - $uts['start'];
					if( $days=intval((floor($diff/86400))) )
						$diff = $diff % 86400;
					if( $hours=intval((floor($diff/3600))) )
						$diff = $diff % 3600;
					if( $minutes=intval((floor($diff/60))) )
						$diff = $diff % 60;
					$diff    =    intval( $diff );            
					return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
				}
				else
				{
					trigger_error( "Ending date/time is earlier than the start date/time", E_USER_WARNING );
				}
			}
			else
			{
				trigger_error( "Invalid date/time data detected", E_USER_WARNING );
			}
			return( false );
		}
	//-----------------------------------------------------------------------------------------------------------
}
?>