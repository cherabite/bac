<?php
require_once APPPATH.'libraries/array_config_writer/class-array-config-writer.php';
class Config_writer{
	
	public function get_instance($file=null, $var_name='config'){
		if(! $file){
			$file=APPPATH.'config/config.php';
		}
		return new Array_Config_Writer($file,$var_name);
	}
}



?>