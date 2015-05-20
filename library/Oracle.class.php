<?php

/* Oracle Operation */

class Db_Oracle {
	private $_config = array();
	public function __construct($config){
		$keys = array('user', 'password', 'database', 'persistent', 'charset');
		foreach ($keys as $key)
		{
			if (isset($config[$key]))
			{
				$this->_config[$key] = $config[$key];
			}
		}
		$defaults = array(
				'user' => 'ku6_dev',
				'password' => 'ku6_dev_123',
				'database' => '//10.125.60.22/dw2',
				'charset' => 'utf8',
				'persistent' => true
				);

		$this->_config += $defaults;
		$this->_connect($this->_config);
	}
	private function _connect($params){
		$func = ($params['persistent']) ? 'oci_pconnect' : 'oci_connect';

		$connection = @$func(
				$params['user'],
				$params['password'],
				$params['database'],
				$params['charset']
				);

		if (is_resource($connection))
		{
			$this->_connection = $connection;
			return $this->_connection;
		}else{
			die("oracle cannot connect");
		}
		return $this->error();
	}


	public function parse($sql) {
		$stid = oci_parse($this->_connection, $sql);
		return $stid;
	}

	public function query_id($stid){
		oci_execute($stid);
	}

	public function query($sql){
		$stid = $this->parse($sql);
        if(!oci_execute($stid)){
            return FALSE;
        }
		return $stid;
	}

	public function affectedRows($stid){
		return oci_num_rows($stid);
	}

	public function fetchOne($stid){
		return oci_fetch_array($stid);
	}

	public function fetchAll($stid) {
		$result = array();
		oci_fetch_all($stid, $result);
		return $result;
	}
}
