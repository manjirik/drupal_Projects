<?php 
class Poc extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function view() {
		return array('id'=>1,'name'=>'poc');
	}
	public function insert($params,$table_name) {		
		return parent::insert($params,$table_name);
	}
	public function update($params,$table_name,$where) {		
		return parent::update($params,$table_name,$where);
	}
	
	public function delete($table_name, $where) {		
		return parent::delete($table_name, $where);
	}
	
	public function getResults($fields, $table_name, $where, $limit,$order_by) {		
		return parent::getResults($fields, $table_name, $where, $limit,$order_by);
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
	public function replace($fields, $values,$table_name) {		
		return parent::replace($fields,$values,$table_name);
	}

    /*
	 * Function name: fetch_locked_continents
	 * Purpose: This function fetches continents data.
	 *   Parameters:
	 * 	$fields= user_id
	 * 	$values = int
     * Return value:  array of continents
	 * Created By: nitin tatte / 9/2/2013	 
	 * Updated By: nitin tatte / 9/2/2013	 	 
	 *
	 */

	public function fetch_locked_continents($user_id)
	{
		$continent_sql = "SELECT c.* FROM user_entry as ue LEFT JOIN location as l
                        ON ue.location_id=l.location_id LEFT JOIN continent as c ON c.continent_id  = l.continent_id where ue.user_id='".$user_id."'";
		$continent_data=$this->db->get_results($continent_sql);
		foreach($continent_data as $cont_data)
		{
			$cont_data_arr[]= array('continent_id'=>$cont_data->continent_id,'continent_name'=>$cont_data->continent_name);
			
		}

		return $cont_data_arr;
	}

	
}
?>