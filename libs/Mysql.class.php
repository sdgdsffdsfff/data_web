<?php
class Db_Mysql
{

	/**
	 * _config Basic config of the database	 *
	 * @var array
	 */
	private $_config = array();


	/**
	 * Database connection
	 *
	 * @var object|resource|null
	 */
	private $_connection = null;


	/**
	 * Query handler
	 *
	 * @var resource
	 */
	private	$_query	= null;


	/**
	 * error
	 *
	 * @var	str
	 */
	private	$_error	= '';



	/**
	 * constructor
	 *
	 * @param array	$config
	 * $config is an array of key/value	pairs
	 * containing configuration	options.  These	options	are	common to most adapters:
	 *
	 * database		  => (string) The name of the database to user
	 * user			  => (string) Connect to the database as this username.
	 * password		  => (string) Password associated with the username.
	 * host			  => (string) What host	to connect to, defaults	to localhost
	 *
	 * Some	options	are	used on	a case-by-case basis by	adapters:
	 *
	 * port			  => (string) The port of the database
	 * persistent	  => (boolean) Whether to use a	persistent connection or not, defaults to false
	 * charset		  => (string) The charset of the database
	 * @version	2010-3-9
	 */
	public function	__construct($config)
	{
		/**
		* allow	key
		*
		* @var array
		*/
		$keys =	array('host', 'port', 'user', 'password', 'database', 'persistent',	'charset');

		foreach	($keys as $key)
		{
			if (isset($config[$key]))
			{
				$this->_config[$key] = $config[$key];
			}
		}

		/**
		 * Default config
		 *
		 * @var	array
		 */
		$defaults =	array(

			'host' => '127.0.0.1',
			'port' => 3306,
			'user' => 'root',
			'password' => '',
			'database' => 'test',
			'charset' => 'utf8',
			'persistent' =>	false
		);

		$this->_config += $defaults;

		$this->_connect($this->_config);

	}


	/**
	 * Connect to MySQL
	 *
	 * @return resource	connection
	 */
	private function _connect($params)
	{
		if (!extension_loaded('mysql'))
		{
			$this->error = 'Can	not	find mysql extension.';
		}

		$func =	($params['persistent'])	? 'mysql_pconnect' : 'mysql_connect';

		$connection = @$func(
			$params['host'] . ':' . $params['port'],
			$params['user'],
			$params['password']
		);

		if (is_resource($connection) && mysql_select_db($params['database'], $connection))
		{
			$this->_connection = $connection;
			$this->query('SET NAMES	"' . $this->_config['charset'] . '";');
			return $this->_connection;
		}else{
			echo "mysql cannot connect";
		}

		return $this->error();
	}


    /** 
     * Query SQL
     * 
     * @param sql , SQL Statement
     * 
     * @return Query Resource, or NULL
     */
	public function	query($sql)
	{
		$this->_query =	mysql_query($sql, $this->_connection);
		if(!$this->_query){
            print_r(mysql_error($this->_connection));
            return NULL;
		}
		return	$this->_query;
	}


    /** 
     * Get one Query sql result	for	select
     * 
     * @param sql 
     * 
     * @return 
     */
	public function	queryOne($sql)
	{
		$this->query($sql);
		$result	= $this->fetch('');
		return $result;
	}


	/**
	 * Get all Query sql result	for	select
	 *
	 * @param string $sql
	 * @return array
	 */
	public function	queryAll($sql)
	{
		$this->query($sql);
		$result	= $this->fetchAll('');
		return $result;
	}

	/**
	 * Get last	insert id	 exp:insert
	 *
	 * @return int
	 */
	public function	getLastId()
	{
		return mysql_insert_id($this->_connection);
	}


	/**
	 * Return the rows affected	of the last	sql	 exp:delete,update
	 *
	 * @return int
	 */
	public function	affectedRows()
	{
		return mysql_affected_rows($this->_connection);
	}


	/**
	 * Free	result
	 *
	 */
	public function	free()
	{
		mysql_free_result($this->_query);
	}


	/**
	 * Close mysql connection
	 *
	 */
	public function	close()
	{
		if (is_resource($this->_connection))
		{
			mysql_close($this->_connection);
		}
	}


	/**
	 * Fetch one row result
	 *
	 * @param string $type
	 * @return mixd
	 */
	public function	fetch($type	= 'ASSOC')
	{
		$type =	strtoupper($type);

		switch ($type)
		{
			case 'ASSOC':
				$func =	'mysql_fetch_assoc';
				break;
			case 'NUM':
				$func =	'mysql_fetch_array';
				break;
			case 'OBJECT':
				$func =	'mysql_fetch_object';
				break;
			default:
				$func =	'mysql_fetch_assoc';
		}

		$result = $func($this->_query);
		return $result;
	}


    /** 
     * Fetch All result
     * 
     * @param type , data type
     * 
     * @return 
     */
	public function	fetchAll($type = 'ASSOC')
	{
		switch ($type)
		{
			case 'ASSOC':
				$func =	'mysql_fetch_assoc';
				break;
			case 'NUM':
				$func =	'mysql_fetch_array';
				break;
			case 'OBJECT':
				$func =	'mysql_fetch_object';
				break;
			default:
				$func =	'mysql_fetch_assoc';
		}

		$result	= array();
		while ($row	= $func($this->_query))
		{
			$result[] =	$row;
		}
		mysql_free_result($this->_query);
		return $result;
	}


	/**
	 * Get error
	 *
	 * @return string|array
	 */
	public function	error($type	= 'STRING')
	{
		$type = strtoupper($type);

		if (is_resource($this->_connection))
		{
			$errno = mysql_errno($this->_connection);
			$error = mysql_error($this->_connection);
		}
		else
		{
			$errno = mysql_errno();
			$error = mysql_error();
		}
		if ('ARRAY'	== $type)
		{
			return array('code' => $errno, 'msg' => $error);
		}
		return $errno . ':' . $error;
	}
    
    /** 
     * Insert data to table.
     * 
     * @param table , tablename to write
     * @param data , data to write, array
     * 
     * @return last insert id
     */
	public function insert($table, $data) 
	{
		$field = "";
		$value = "";
		$size = count($data);
		$i = 0;
		foreach($data as $inx => $val){
			if(!empty($inx)){
				$i++;
				if($i < $size){
					$field .= $inx.",";
					$value .= "'".$val."',";
				}else{
					$field .= $inx;
					$value .= "'".$val."'";
				}
			}
		}
		$sql = "insert into ".$table." (".$field.") values (".$value.")";
        //echo $sql;
		$ret = $this->query($sql);
        if(NULL == $ret) return -1;
		$result = $this->getLastId();
		return $result;
	}
    
    /** 
     * Update Table with a where statement
     * 
     * @param table , tablename to update
     * @param data , new data
     * @param where , where statement
     * 
     * @return 
     */
	public function update($table, $data, $where){
		$i = 0;
		$size = count($data);
		$update_fields ="";
		
		foreach($data as $inx => $val){
			if(!empty($inx)){
				$i++;
				if($i < $size){
					$update_fields .= $inx."='".$val."',";
				}else{
					$update_fields .= $inx."='".$val."'";
				}
			}
		}
        // clear the last comma.
		$update_fields=rtrim($update_fields,",");
		$sql = "update ".$table." set ".$update_fields." where 1";
		if($where){
			if(is_array($where)){
				foreach($where as $c_inx => $c_val){
					$sql .= " and ".$c_inx."='".$c_val."'";
				}
			}else{
				$sql .= " and ".$where;
			}
		}
		$count = $this->query($sql);
		return $count;
	}


    
    /** 
     * Get Total Records with a where statement
     * 
     * @param table , table to search
     * @param where , where statement
     * @param fields ,  fileds wanted
     * 
     * @return 
     */
	public function getTotalRow($table, $where='', $fields='*'){
		$sql = "select count(".$fields.") from ".$table." where 1 ". $where;
		$arr = $this->queryOne($sql);
		$count = 'count('.$fields.')';
		$total_row = $arr[$count];
		$result = isset($total_row) ? $total_row : 0;
		return $result;
	}

    public function db_escape_string($str)
    {
        return mysql_real_escape_string($str, $this->_connection);
    }

    //return errno, when using transaction
    public function get_errno(){
        return mysql_errno($this->_connection);
    }
    
    public function getConnection() {
        return $this->_connection;
    }
    
}

