<?php
abstract class BaseController
{
    protected $_app;

    public function __construct($app)
    {
        $this->_app = $app;
    }
    
    function post($keys)
    {
        foreach(array_keys($keys) as $key){
            $keys[$key] = $this->_app->request()->post($key);
        }
        return $keys;
    }

    public function get($keys)
    {
        foreach(array_keys($keys) as $key){
            $keys[$key] = mysql_real_escape_string($this->_app->request()->get($key));
        }
        return $keys;
    }

    public function params($keys)
    {
        $params = $this->_app->request()->params();
        foreach(array_keys($keys) as $key){
            if(isset($params[$key])){
                $keys[$key] = mysql_real_escape_string($this->_app->request()->params($key));
            }
        }
        return $keys;
    }

    protected function err()
    {
        $resp = [
            'meta'=>[
                'status'=>404
            ],
            'response'=>[]
        ];
        $this->_app->response()->header('Content-Type', 'application/json');
        echo json_encode($resp);
    }
    
    protected function ok($data)
    {
        $resp = [
            'meta'=>[
                'status'=>200,
                'msg' => 'ok'
            ],
            'response'=>$data
        ];
        $this->_app->response()->header('Content-Type', 'application/json');
        echo json_encode($resp, JSON_NUMERIC_CHECK);
    }


}





