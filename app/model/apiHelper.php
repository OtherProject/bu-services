<?php
class apiHelper extends Database {
	
    var $date;
    var $salt;
    var $token;

    function __construct()
    {
        $session = new Session;
        $getSessi = $session->get_session();
        $this->user = $getSessi['default'];

        $this->prefix = "bu";
        $this->date = date('Y-m-d H:i:s');
        $this->salt = 'ovancop2014';
        
    }
    
    function retrieveData($db=1, $method=false, $id=false, $limit=10)
    {

        $alias = $this->getAlias($method);
        $realTable = $alias[0]['method'];
        
        $filter = "";
        if ($id) $filter .= " AND {$alias[0]['fieldPrimary']} = {$id} ";

        $sql = "SELECT * FROM {$realTable} WHERE 1 {$filter} LIMIT $limit";

        // pr($sql);
        $res = $this->fetch($sql,1,$db);  
        if ($res)return $res; 
        return false;

    }

    function getUserRule($ruleID=false, $debug=false)
    {
        $sql = array(
                    'table' =>"tbl_rule",
                    'field' => "*",
                    'condition' => "id IN ({$ruleID})",
                );
        $result = $this->lazyQuery($sql,$debug);
        if ($result) return $result;
        return false;
    }

    function getAlias($method=false, $real=false)
    {

        $condition = " alias ";
        if ($real) $condition = " method ";

        $sql = array(
                    'table' =>"tbl_method_alias",
                    'field' => "*",
                    'condition' => "{$condition} = '{$method}'",
                );
        $result = $this->lazyQuery($sql,$debug);
        if ($result) return $result;
        return false;
    }

    function verifiedUser($token=false, $secret_key=false)
    {

        $sql = array(
                    'table' =>"social_member",
                    'field' => "aksesVerified",
                    'condition' => "token = '{$token}' AND secretKey = '{$secret_key}' AND n_status = 1",
                );
        $result = $this->lazyQuery($sql,$debug);
        if ($result){

            $dataRule = $result[0]['aksesVerified'];

            $sql = array(
                        'table' =>"tbl_rule",
                        'field' => "*",
                        'condition' => "id IN ({$dataRule})",
                    );
            $res = $this->lazyQuery($sql,$debug);
            
            if ($res) return $res;
        }
        return false;
    }

    function checkRule($data, $limit=10)
    {

        $db = $data['idDatabase'];
        $table = $data['tabel'];
        $field = $data['field'];
        $id = $data['idData'];
        $fieldPrimary = $data['fieldPrimary'];
       
        $filter = "";
        if ($id) $filter .= " AND $fieldPrimary = {$id} ";

        $sql = "SELECT {$field} FROM {$table} WHERE 1 {$filter} LIMIT $limit";

        // pr($sql);
        $res = $this->fetch($sql,1,$db);  
        if ($res) return $res;
        return false;
    }
}
?>