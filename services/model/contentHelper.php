<?php
class contentHelper extends Database {
	
	var $prefix = "bpom";

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

	function getWilayah($name=null)
	{
		$query = "SELECT * FROM tbl_wilayah WHERE parent = 0 ORDER BY nama_wilayah";
		// pr($query);
		$result = $this->fetch($query,1);
		
		return $result;
	}

	function getBalai($name=null)
	{
		$query = "SELECT * FROM tbl_balai WHERE parent = 0 ORDER BY namaBalai";
		// pr($query);
		$result = $this->fetch($query,1);
		
		return $result;
	}

	function getDataEvaluasi($id=false, $n_status=1)
	{

		$filter = "";
		if ($id) $filter = " AND e.id = {$id}";

		$query = "SELECT e.*, p.merek, p.produsen, p.alamat, p.jenis, i.typeGambar,
					i.tulisanGambar, b.namaBalai
					FROM {$this->prefix}_evaluasi e LEFT JOIN {$this->prefix}_product p 
					ON e.produkID = p.id LEFT JOIN  {$this->prefix}_product_image_type i
					ON e.jenisGambar = i.id LEFT JOIN  tbl_balai b
					ON e.balaiID = b.kodeBalai 
					WHERE e.n_status = {$n_status} {$filter}";
		// pr($query);
		$result = $this->fetch($query,1);
		
		return $result;
	}

	function updateDataEvaluasi($data=array())
	{

		if (empty($data)) return false;

		$ignoreList = array('id','alamat','tulisanGambar');
		foreach ($data as $key => $value) {
			
			if (!in_array($key, $ignoreList)){
				$tmpField[] = "`$key` = ". "'".$value."'";
				
			}
		}

		
		$impData = implode(',', $tmpField);

		$sql = "UPDATE {$this->prefix}_evaluasi SET {$impData} WHERE id = {$data['id']} LIMIT 1";
		// pr($sql);
		$res = $this->query($sql);
		if ($res) return true;
		return false;
	}

	function validateData($id=false, $n_status=2)
	{

		if (!$id) return false;
		$sql = "UPDATE {$this->prefix}_evaluasi SET n_status = {$n_status} WHERE id IN ({$id})";
		// pr($sql);
		$res = $this->query($sql);
		if ($res) return true;
		return false;
	}

	function getIndustri($id=false)
	{

		$sql = array(
                    'table' =>"{$this->prefix}_industri",
                    'field' => "*",
                    'condition' => "id = {$id}",
                    'limit' => 1
                );
        $result = $this->lazyQuery($sql);
        if ($result) return $result;
        return false;
	}

	function getMerekProduk($id=false)
	{
		$sql = array(
                    'table' =>"{$this->prefix}_product",
                    'field' => "*",
                    'condition' => "n_status = 1",
                    
                );
        $result = $this->lazyQuery($sql);
        if ($result) return $result;
        return false;
	}

	function getProdusen($id=false)
	{
		$sql = array(
                    'table' =>"{$this->prefix}_product",
                    'field' => "*",
                    'condition' => "n_status = 1 AND id = {$id}",
                    
                );
        $result = $this->lazyQuery($sql);
        if ($result) return $result;
        return false;
	}
}
?>