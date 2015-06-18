<?php
class Pgsql {
    private $linkid; // PostgreSQL连接标识符
    private $_config = [];

    private $result; // 查询的结果
    private $querycount; // 已执行的查询总数

    /*********************************************************
     *类构造函数，用来初始化$host、$user、$passwd和$db字段。
     *********************************************************/
    public function __construct($config) {

        $this->_parseConfig($config);
        $this->connect();

    }

    private function _parseConfig($config){
        $keys =	array('servers', 'user', 'password', 'database', 'persistent',	'charset');
        foreach	($keys as $key)
        {
            if (isset($config[$key]))
            {
                $this->_config[$key] = $config[$key];
            }
        }
        if (isset($this->_config['servers'])) {
            list($this->_config['host'], $this->_config['port']) = array_values($this->_config['servers'][array_rand($this->_config['servers'])]);
        }

    }


    /* 连接Postgresql数据库 */
    public function connect(){

        $this->linkid = pg_connect("host={$this->_config['host']}
                                    port={$this->_config['port']}
                                    dbname={$this->_config['database']}
                                    user={$this->_config['user']}
                                    password={$this->_config['password']}");
        if (! $this->linkid)
            throw new Exception("Could not connect to PostgreSQL server.");

    }

    /* 执行数据库查询。 */
    public function query($query){

        $this->result = @pg_query($this->linkid,$query);
        if(! $this->result)
            throw new Exception("The database query failed.");
        $this->querycount++;
        return $this;
    }

    /* 确定受查询所影响的行的总计。 */
    public function affectedRows(){
        $count = @pg_affected_rows($this->linkid);
        return $count;
    }

    /* 确定查询返回的行的总计。 */
    public function numRows(){
        $count = @pg_num_rows($this->result);
        return $count;
    }

    /* 将查询的结果行作为一个对象返回。 */
    public function fetchObject(){
        $row = @pg_fetch_object($this->result);
        return $row;
    }

    /* 将查询的结果行作为一个索引数组返回。 */
    public function fetchRow(){
        $row = @pg_fetch_row($this->result);
        return $row;
    }

    /* 将查询的结果行作为一个关联数组返回。 */
    public function fetchArray(){
        $row = @pg_fetch_array($this->result, 0, PGSQL_ASSOC);
        return $row;
    }

    /* 将查询的结果行作为一个关联数组返回。 */
    public function fetchAllArray(){
        $rows = @pg_fetch_all($this->result);
        return $rows;
    }

    /* 返回在这个对象的生存期内执行的查询总数。这不是必须的，但是您也许会感兴趣。 */
    public function numQueries(){
        return $this->querycount;
    }
}
?>