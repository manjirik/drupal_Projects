<?php
class phpFunctions
{
	
		public function fileUpload($fileArray)
		{
			if(count($fileArray)>0)
			{
				$fileObj = $fileArray["fileObj"];
				if($fileObj["error"]!=4)
				{
					if($fileObj["size"]>ADMIN_FILE_MAX_UPLOAD_SIZE)
					{
						//file size exceeded that ADMIN_FILE_MAX_UPLOAD_SIZE
						return array(1,'');				
					}
					else
					{
						$tmpFilePath = $fileObj["tmp_name"];	
						$fileName = $fileObj["name"];
						$fileNameArr = explode(".",$fileName);				
						$fileNameRevArr = array_reverse($fileNameArr);
						$fileExtention = $fileNameRevArr[0];	
						$imgName = $fileArray["imgName"].".".$fileExtention;
						$finalFile = $fileArray["fileUploadPath"].$imgName;					
						if(copy($tmpFilePath, $finalFile)) 
						{
							//file uploaded successfully
							return array(2,$imgName);
						}
						else
						{
							//error occurred while file upload
							return array(3,'');
						}
					}
				}
				else
				{
					//file object is empty
					return array(4,'');
				}
			}
			else
			{
				//file object is empty
				return array(4,'');
			}			
		}
	//-----------------------------------------------------------------------------------------------------------
		public function fileUploadold($fileArray)
		{
			if(count($fileArray)>0)
			{
				$fileObj = $fileArray["fileObj"];
				/*
					echo '<pre>';
					print_r($fileObj);
					die;
				*/				
				if($fileObj["error"]!=4)
				{
					if($fileObj["size"]>ADMIN_FILE_MAX_UPLOAD_SIZE)
					{
						//file size exceeded that ADMIN_FILE_MAX_UPLOAD_SIZE
						return array(1,'');				
					}
					else
					{
						$tmpFilePath = $fileObj["tmp_name"];	
						$fileName = $fileObj["name"];
						$fileNameArr = explode(".",$fileName);				
						$fileNameRevArr = array_reverse($fileNameArr);
						$fileExtention = $fileNameRevArr[0];
						$imgName = $fileArray["imgPrefix"]."img_".date("d_m_Y_h_i_s_a").".".$fileExtention;
						$finalFile = $fileArray["fileUploadPath"].$imgName;					
						if(copy($tmpFilePath, $finalFile)) 
						{
							//file uploaded successfully
							return array(2,$imgName);
						}
						else
						{
							//error occurred while file upload
							return array(3,'');
						}
					}
				}
				else
				{
					//file object is empty
					return array(4,'');
				}
			}
			else
			{
				//file object is empty
				return array(4,'');
			}			
		}
	//-----------------------------------------------------------------------------------------------------------
		public  function getDBStringOld($string)
		{
			return mysql_real_escape_string(strip_tags(trim($string)));		
		}
	//-----------------------------------------------------------------------------------------------------------
		public function getDBString($string)
		{
			$string = strip_tags(trim($string));			
			$string = htmlspecialchars($string, ENT_QUOTES);
			return $string;
		}
	//-----------------------------------------------------------------------------------------------------------
		public  function getDBString1($string)
		{
			$string = strip_tags(trim($string));			
			return $string;
		}
	//-----------------------------------------------------------------------------------------------------------
		public  function getDBString2($string)
		{
			$string = strip_tags(trim($string));	
			$string = htmlspecialchars_decode($string);
			return $string;
		}
	//-----------------------------------------------------------------------------------------------------------		
		public function getDBString3($string)
		{				
			$string = htmlspecialchars($string, ENT_QUOTES);
			return $string;
		}
	//-----------------------------------------------------------------------------------------------------------
		public  function getStrFrmDb($string)
		{					
			return htmlspecialchars_decode(trim($string));
		}
	//-----------------------------------------------------------------------------------------------------------
		public  function getStrFrmDb1($string)
		{					
			return htmlspecialchars_decode(trim($string), ENT_QUOTES);
		}	
	//-----------------------------------------------------------------------------------------------------------
		public  function displayDate($date,$format)
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
                case 4:
                    return date("d/m/Y",strtotime($date));
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
		public  function writeFile($fileContents)
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
		public  function daysInMonth($month, $year)
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
		
		 * Get the date / time difference with PHP
		 * @param        string                                 $start
		 * @param        string                                 $end
		 * @return       array
		 */
		public  function get_time_difference( $start, $end )
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