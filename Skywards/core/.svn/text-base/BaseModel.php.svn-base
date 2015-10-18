<?php
class BaseModel {
	
	
	public $db;
	public function __construct() {
		
		$this->db=new ezSQL_mysql();
		$this->db->connect(DB_USER_NAME,DB_PASSWORD,DB_HOST_NAME);
		$this->db->select(DB_NAME);
		$this->db->query("set names utf8");
		if(isset($this->db->captured_errors) && is_array($this->db->captured_errors))  {
			foreach($this->db->captured_errors as $error) {
				$log_file=LOGS_FOLDER.DS.'db_logs.txt';
				file_put_contents($log_file,$error['error_str']."\n",FILE_APPEND);
			}
		}
	}
	
	/*
	 * Function name: insert
	 * Purpose: insert table data 
	 * Parameters:
	 * 	$paramArray = array, table columns along with values	 
	 * 	$table_name = string
	 * Return value: 
	 * 	True: inserted rows
	 * 	False: fail
	 * Created By: Manish Patel / 2013-01-27
	 * Updated By: Your Name / Date	 
	 *
	 */
	
	protected function insert($paramArray,$table_name)
	{		
		if( count($paramArray) > 0 && $table_name != '')			
		{
			$seperator = '';
			$column = '';
			$val = '';
			foreach($paramArray as $field => $value) {			
				$column .= $seperator."`".$field."`";
				$val .= $seperator."'".$this->db->escape($value)."'";
				$seperator = ',';
			}
			$column = '(' . $column . ')';
			$val = '(' . $val . ')';
			$query = "INSERT INTO $table_name $column  values $val ";               
			$this->db->query($query);		
			return $this->db->insert_id;
		} 
		return false;		
	}
	
	/*
	 * Function name: update
	 * Purpose: update table data 
	 * Parameters:
	 * 	$paramArray = array, table columns along with values	 
	 * 	$table_name = string
	 *  $where = string
	 * Return value: 
	 * 	True: affected rows
	 * 	False: fail
	 * Created By: Manish Patel / 2013-01-27
	 * Updated By: Your Name / Date	 
	 *
	 */
	
	protected function update($paramArray,$table_name,$where)
	{		
		if( count($paramArray) > 0 && $table_name != '' && $where != '')			
		{
			$seperator = '';
			$column = '';			
			foreach($paramArray as $field => $value) {			
				$column .= $seperator."`".$field."` = '".$this->db->escape($value)."'";				
				$seperator = ',';
			}			
			$query = "UPDATE $table_name SET $column WHERE ".$this->db->escape($where)." ";               
			$this->db->query($query);				
			return $this->db->rows_affected;			
		} 
		return false;		
	}
	
	/*
	 * Function name: delete
	 * Purpose: delete table data 
	 * Parameters: 		 
	 * 	$table_name = string
	 *  $where = string
	 * Return value: 
	 * 	True: affected rows
	 * 	False: fail
	 * Created By: Manish Patel / 2013-01-27
	 * Updated By: Your Name / Date	 
	 *
	 */
	
	protected function delete($table_name,$where)
	{		
		if( $table_name != '' && $where != '')			
		{					
			$query = "DELETE FROM $table_name WHERE $where ";               
			$this->db->query($query);				
			return $this->db->rows_affected;			
		} 
		return false;		
	}	
	
	/*
	 * Function name: getResults
	 * Purpose: get table data (single table data)
	 * Parameters: 		 
	 *  $fields = array of table columns which needs to be fetch
	 * 	$table_name = string
	 *  $where = string
	 *  $limit = string
	 *  $order_by = string
	 * Return value: 
	 * 	True: affected rows
	 * 	False: fail
	 * Created By: Manish Patel / 2013-01-27
	 * Updated By: Your Name / Date	 
	 *
	 */
	public function getResults($fields = array(), $table_name, $where='1', $limit='1',$order_by='') 
	{		
		if( $table_name != '')			
		{
			$order_by = trim($order_by);
			$where = trim($where);
			$limit = trim($limit);
			$field = count($fields) > 0 ? implode(',',$fields) : '*';
			$where = ($where != '') ? $where : ' 1 ';
			$limit = ($limit == 'all')? ' ' : 'limit '.$limit.'';
			$order_by = ($order_by != '')? $order_by : '';
			$query = "SELECT $field FROM $table_name WHERE $where $order_by  $limit";
            $results = $this->db->get_results($query);
			if($results)
				return $results;
			return false;	
		}
		return false;
	}
	
	/*
	 * Function name: replace
	 * Purpose: replace table data (multiple rows supported)
	 * Parameters:
	 * 	$fields = array, table columns
	 * 	$values = array, columns values
	 * 	$table_name = string
	 * Return value: 
	 * 	True: inserted rows
	 * 	False: fail
	 * Created By: Manish Patel / 2013-01-27
	 * Updated By: Your Name / Date	 
	 *
	 */
	protected function replace($fields,$values,$table_name)
	{	
		if( count($values) > 0 && $table_name != '' && $fields != '')			
		{
			$seperator_val = '';
			$all_val = '';	
			foreach($values as $key => $value) {
				$seperator = '';
				$val = '';
				foreach($value as $k => $v) {
					if(is_null($v)) {
						$val .= $seperator."null";				
					} else {
						$val .= $seperator."'".$this->db->escape($v)."'";				
					}
					$seperator = ',';
				}			
				$all_val .= $seperator_val. '(' . $val . ')';
				$seperator_val = ',';
			}
			$column = ' ( '.$fields.' ) ';
			$query = "REPLACE INTO $table_name $column  values $all_val ";               
			
			$this->db->query($query);		
			return $this->db->rows_affected;
		}
			
		return false;		
	}
	
	
	
	/* public function countDownDate()
	{
			$sql = "SELECT draw_date FROM draw_details WHERE user_entry_id is null ORDER BY draw_date ASC LIMIT 0,1";
			
	} */
}