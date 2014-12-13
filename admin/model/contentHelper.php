<?php
class contentHelper extends Database {
	
	var $prefix = "bu";

	function getData()
	{
		$sql = "SELECT * FROM code_activity";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function getMessage()
	{
		$sql = "SELECT m.*, um.name,um.email FROM my_message m LEFT JOIN user_member um ON m.receive = um.id ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function saveMessage($data)
	{
		foreach ($data as $key => $val){
			$tmpfield[] = $key;
			$tmpdata[] = "'$val'";
		}
		// from,to,subject,content,createdate,n_status
		$tmpfield[] = 'fromwho';
		$tmpfield[] = 'createdate';
		$tmpfield[] = 'n_status';
		
		$date = date('Y-m-d H:i:s');
		$tmpdata[] = 0;
		$tmpdata[] = "'{$date}'";
		$tmpdata[] = 1;
		
		$field = implode(',',$tmpfield);
		$data = implode(',',$tmpdata);
		
		$sql = "INSERT INTO my_message ({$field}) 
				VALUES ({$data})";
		// pr($sql);
		// exit;
		$res = $this->query($sql);
		if ($res) return true;
		return false;
	}
	
	function get_user($data)
	{
		$query = "SELECT * FROM user_member WHERE email = '{$data}'";
		
		$result = $this->fetch($query,1);
		
		return $result;
	}
	
	function importData($name=null)
	{
		$query = "INSERT INTO import (name,n_status) VALUES ('{$name}', 1)";
		// pr($query);
		$result = $this->query($query);
		
		return $result;
	}

	function getListTable($db_name=false, $dbID=1)
	{

		$ignoreTable = array('social_member','admin_member','activity_log');
		$sql = "SHOW TABLES FROM {$db_name} ";
		$res = $this->fetch($sql,$dbID);
		if ($res){

			foreach ($res as $key => $value) {
				
				if (!in_array($value['Tables_in_'.$db_name], $ignoreTable)){
					$newData[] = $value['Tables_in_'.$db_name];
				}
				
			}

			return $newData;
		} 

		
		return false;
	}

	function getListField($db=0, $tabel_name=false)
	{

		$ignoreTable = array('id');
		$sql = "SHOW COLUMNS FROM {$tabel_name} ";
		$res = $this->fetch($sql,1, $db);
		// pr($res);
		if ($res){

			foreach ($res as $key => $value) {
				
				if (!in_array($value['Tables_in_'.$db_name], $ignoreTable)){
					$newData[] = $value['Field'];

				}
				
			}

			return $newData;
		} 

		
		return false;
	}

	function getRule($db=0, $table=false, $debug=0)
	{


		if ($table) $filter = " AND tabel = '{$table}'";

		$sql = array(
                'table'=>"tbl_rule",
                'field'=>"*",
                'condition' => "idDatabase = {$db} {$filter}",
                );

        $res = $this->lazyQuery($sql,$debug);
        if ($res) return $res;
		return false;
	}


	function saveUserRule($data, $debug=false)
	{

		$rule = implode(',', $data['ids']);
		$sql = array(
                'table'=>"social_member",
                'field'=>"aksesVerified = '{$rule}'",
                'condition' => "id = {$data['userid']}",
                );

        $res = $this->lazyQuery($sql,$debug,2);

        if ($res) return $res;
		return false;
	}

	function saveMasterTable($data, $debug=false)
	{

		if ($id) $filter = " AND k.id = {$id}";

		$arrfieldIgnore = array('id');
		
		$field = array();
		$nilai = array();
		$dataUpdate = array();


		// pr($data);
		if ($data['field']){

			foreach ($data['field'] as $key => $value) {
				if (!in_array($value, $arrfieldIgnore)){
					if ($value){
						$nilai[] = "$value";
						
					}
				}
			}
		}

		
		// pr($nilai);
		$field[] = 'idDatabase';
		$field[] = 'tabel';
		$field[] = 'field';
		$field[] = 'n_status';

		$nilaidata[] = $data['database'];
		$nilaidata[] = "'{$data['tabel']}'";

		$impFieldData = "'".implode(',', $nilai)."'";
		$nilaidata[] = $impFieldData;
		$nilaidata[] = 1;

		
		$impField = implode(',', $field);
		$impData = implode(',', $nilaidata);

		$impFieldUpdate = "field = ".$impFieldData;


		$sql = array(
                'table'=>"tbl_rule",
                'field'=>"{$impField}",
                'value' => "{$impData}",
                'update' => "{$impFieldUpdate}"
                );

        $res = $this->lazyQuery($sql,$debug,4);

        if ($res) return $res;
		return false;
	}

	function setAlias($data, $debug=false)
	{

		$field[] = 'method';
		$field[] = 'alias';
		$field[] = 'fieldPrimary';
		
		$nilaidata[] = "'{$data['tabel']}'";
		$nilaidata[] = "'{$data['alias']}'";
		$nilaidata[] = "'{$data['fieldPrimary']}'";

		$impField = implode(',', $field);
		$impData = implode(',', $nilaidata);

		$impFieldUpdate = "alias = '{$data['alias']}', fieldPrimary = '{$data['fieldPrimary']}'";

		$sql = array(
                'table'=>"tbl_method_alias",
                'field'=>"{$impField}",
                'value' => "{$impData}",
                'update' => "{$impFieldUpdate}"
                );

        $res = $this->lazyQuery($sql,$debug,4);

        if ($res) return $res;
		return false;
	}

	function getAlias($method=false, $debug=false)
    {
        $sql = array(
                    'table' =>"tbl_method_alias",
                    'field' => "*",
                    'condition' => "method = '{$method}'",
                );
        $result = $this->lazyQuery($sql,$debug);
        if ($result) return $result;
        return false;
    }

	

}
?>