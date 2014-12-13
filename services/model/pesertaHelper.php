<?php
ob_start();
class pesertaHelper extends Database {
	
	function storePeserta($dataArr)
	{
		
		foreach ($dataArr as $key=>$val){
			$cfieldArr[] = $key;
			$cvalueArr[] = "'$val'";
			
			if ($key !='nama'){
				$tmpUpdate[] = "{$key} = '$val'";
			}
			if ($key == 'nama') $id = $val;
		}
		
		$cfield = implode(',',$cfieldArr);
		$cdata = implode(',',$cvalueArr);
		$onUpdate = implode(',',$tmpUpdate);
		
		$sql = "INSERT INTO tbl_peserta ({$cfield}) VALUES ({$cdata}) 
				ON DUPLICATE KEY UPDATE  {$onUpdate} ";
		 // pr($sql);
		// exit;
		$res = $this->query($sql);
		if ($res) return true;
		return false;
	}
	
	
	function storeRefPeserta($dataArr)
	{
		
		// pr($dataArr);exit;
		foreach ($dataArr['DATA_NILAI_KOMPETENSI'] as $key=>$val){
			$cfieldArr[] = $key;
			$cvalueArr[] = "'$val'";
			
			if ($key !='nama'){
				$tmpUpdate[] = "{$key} = '$val'";
			}
			if ($key == 'nama') $id = $val;
		}
		foreach ($dataArr['DATA_PENDUKUNG_AKADEMIK'] as $key=>$val){
			$cfieldArr[] = $key;
			$cvalueArr[] = "'$val'";
			
			if ($key !='nama'){
				$tmpUpdate[] = "{$key} = '$val'";
			}
			if ($key == 'nama') $id = $val;
		}
		foreach ($dataArr['DATA_PENDUKUNG_NON_AKADEMIK'] as $key=>$val){
			$cfieldArr[] = $key;
			$cvalueArr[] = "'$val'";
			
			if ($key !='nama'){
				$tmpUpdate[] = "{$key} = '$val'";
			}
			if ($key == 'nama') $id = $val;
		}
		
		$date = date('Y-m-d H:i:s');
		$cfieldArr[] = 'id_peserta';
		$cfieldArr[] = 'upload_date';
		$cfieldArr[] = 'rekap_total_bobot';
		$cfieldArr[] = 'rekap_total_score';

		$cvalueArr[] = $dataArr['id_peserta'];
		$cvalueArr[] = "'{$date}'";
		$cvalueArr[] = "'{$dataArr['rekap_total_bobot']}'";
		$cvalueArr[] = "'{$dataArr['rekap_total_score']}'";
		
		$cfield = implode(',',$cfieldArr);
		$cdata = implode(',',$cvalueArr);
		$onUpdate = implode(',',$tmpUpdate);
		
		$sql = "INSERT IGNORE INTO tbl_score ({$cfield}) VALUES ({$cdata})";
		// pr($sql);
		// exit;
		$res = $this->query($sql);
		if ($res) return true;
		return false;
	}
	
	function getReviewer($id=false, $nama=false, $returnid=false)
	{
	
		$filter = "";
		if ($id) $filter .= " AND p.id = {$id}";
		if ($nama) $filter .= " AND p.nama = '{$nama}'";
		
		if ($returnid) $field = "p.id";
		else $field = "*";
		$sql = "SELECT id,name FROM user_member p WHERE usertype = 2 {$filter} ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}

	function getPeserta($id=false, $nama=false, $returnid=false)
	{
	
		$filter = "";
		if ($id) $filter .= " AND p.id = {$id}";
		if ($nama) $filter .= " AND p.nama = '{$nama}'";
		
		if ($returnid) $field = "p.id";
		else $field = "*";
		$sql = "SELECT {$field} FROM tbl_peserta p WHERE 1 {$filter} ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function getListPeserta($id=false, $nama=false, $returnid=false)
	{
	
		$filter = "";
		if ($id) $filter .= " AND s.id = {$id}";
		if ($nama) $filter .= " AND p.nama = '{$nama}'";
		
		if ($returnid) $field = "p.id";
		else $field = "p.*, s.*, rr.ttd";

		if ($_SESSION['user']['usertype']==1) $id_reviewer = " ";
		else $id_reviewer = "AND s.id_reviewer = ".$_SESSION['user']['id'];

		// $id_reviewer = 
		$sql = "SELECT {$field} FROM tbl_score s  LEFT JOIN tbl_peserta p ON s.id_peserta  = p.id 
				LEFT JOIN tbl_review_repo rr ON s.id_reviewer = rr.id_reviewer
				WHERE 1 {$id_reviewer} {$filter} ";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res){
			foreach ($res as $key => $value) {
				$res[$key]['reviewer'] = $this->getDataReview($value['id']);
			}
			return $res;
		} 
		return false;
	}
	
	function lockFileName($filename="")
	{

		$date = date('Y-m-d H:i:s');
		$user = "ovan";
		if ($filename){

			$sql = "INSERT INTO tbl_excel_file (filename, upload_date, upload_by) VALUES ('{$filename}', '{$date}', '{$user}')";
			$res = $this->query($sql);
			if ($res) return true;
			return false;
		}
	}

	function ifFileExist($filename="")
	{

		if ($filename){

			$sql = "SELECT COUNT(1) total FROM tbl_excel_file WHERE filename = '{$filename}'";
			$res = $this->fetch($sql);
			if ($res['total']>0) return true;
			return false;
		}
	}

	function setReviewer($id_review=0, $id_peserta=0)
	{

		$date = date('Y-m-d H:i:s');
		
		if ($id_review and $id_peserta){

			$get = "SELECT COUNT(1) total FROM tbl_score WHERE id_peserta = {$id_peserta} AND id_reviewer = {$id_review} LIMIT 1";
			// pr($get);
			$res = $this->fetch($get);
			if ($res['total']<1){

				$sql = "SELECT * FROM tbl_score WHERE id_peserta = {$id_peserta} AND id_reviewer = 0 LIMIT 1 ";
				// pr($sql);
				$res = $this->fetch($sql);
				if ($res){

					usleep(500);
					foreach ($res as $k => $v){
						if ($k!='id'){
							if ($k=='id_reviewer') $new[$k] = $id_review;
							else $new[$k] = $v;
						}
						
					}

					foreach ($new as $key => $val){
						$field[] = $key;
						$data[] = "'{$val}'";
					}

					$tmpF = implode(',', $field);
					$tmpD = implode(',', $data);

					$sql = "INSERT INTO tbl_score ({$tmpF}) VALUES ({$tmpD})";
					// pr($sql);
					$res = $this->query($sql);
					usleep(500);
					$sql = "INSERT INTO tbl_review_peserta (id_review, id_peserta, date, n_status) 
							VALUES ('{$id_review}', '{$id_peserta}', '{$date}',1) ON DUPLICATE KEY UPDATE date = '{$date}'";
					// pr($sql);
					$res = $this->query($sql);

					if ($res) return true;
				}

			}


			// if ($res) {

			// 	$sql = "UPDATE tbl_score SET id_reviewer = {$id_review} WHERE id_peserta = {$id_peserta} LIMIT 1";
			// 	$res = $this->query($sql);
			// 	if ($res) return true;
			// }
			return false;
		}
	}

	function getReviewer_info($id)
	{
		$sql = "SELECT name FROM user_member WHERE id = $id";
		$res = $this->fetch($sql);
		if ($res) return $res;
		return false;
	}
	
	function getDataReview($id=false)
	{
		if (!$id) return false;
		$sql = "SELECT r.id_review, um.name nama_review FROM tbl_review_peserta r LEFT JOIN user_member um ON r.id_review = um.id
				LEFT JOIN tbl_peserta p ON r.id_peserta = p.id WHERE r.id_peserta = $id";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}

	function updateScore()
	{
		// pr($_POST);

		if ($_POST){
			$ignore = array('token','idpeserta');
			foreach ($_POST as $key=>$val){
				
				if (!in_array($key, $ignore)){
					$cfieldArr[] = $key;
					$cvalueArr[] = "'$val'";
					$tmpUpdate[] = "$key = '{$val}'";
				}
				
				
			}
			
			$id_peserta = _p('idpeserta');

			$tmpUpdate[] = "n_status = 1";
			
			$cfield = implode(',',$cfieldArr);
			$cdata = implode(',',$cvalueArr);
			$onUpdate = implode(',',$tmpUpdate);
			
			$sql = "UPDATE tbl_score SET {$onUpdate} WHERE id = {$id_peserta} AND n_status = 0 LIMIT 1";
			// pr($sql);
			// exit;
			$res = $this->query($sql);
			
		}

		if ($_FILES){

			if ($_FILES['ttd_reviewer']['name']){

				$upload = uploadFile('ttd_reviewer');
			
				$date = date('Y-m-d H:i:s');
				$userid = $_SESSION['user']['id'];
				$sql = "INSERT INTO tbl_review_repo (id_reviewer,ttd,date_upload,n_status) 
						VALUES ({$userid}, '{$upload['filename']}', '{$date}', 1)
						ON DUPLICATE KEY UPDATE ttd = '{$upload['filename']}', date_upload = '{$date}'";
				// pr($sql);
				$res = $this->query($sql);
			}
			
			
		}
		
		// $res = $this->query($sql);
		if ($res) return true;
		return false;
	}

	function getPesertahasReview($id, $type)
	{

		if ($type ==1) $filter = "";
		else $filter = "AND s.id_reviewer = {$id}";
		$sql = "SELECT DISTINCT(p.nama), p.id FROM tbl_peserta p LEFT JOIN tbl_score s ON p.id = s.id_peserta 
				WHERE s.n_status = 1 {$filter}";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}

	function getReviewerData($id)
	{

		$sql = "SELECT p.nama, p.id, s . *, u.image_profile, u.name
				FROM tbl_review_peserta r
				LEFT JOIN tbl_peserta p ON p.id = r.id_peserta
				LEFT JOIN tbl_score s ON p.id = s.id_peserta
				LEFT JOIN user_member u ON r.id_review = u.id
				WHERE r.id_review ={$id}
				AND s.id_reviewer ={$id}";
		// pr($sql);exit;
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
		
	}

	function getPesertaData($id)
	{

		$sql = "SELECT um.name, p.nama as nama_peserta, um.image_profile, s . *
				FROM tbl_score s
				RIGHT JOIN user_member um ON s.id_reviewer = um.id
				RIGHT JOIN tbl_peserta p ON s.id_peserta = p.id
				WHERE s.id_peserta ={$id}
				AND s.n_status =1";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
		
	}

	function getTotalReview()
	{
		
		$data['total'] = 0;
		$data['total_review'] = 0;

		$sql = "SELECT COUNT(1) AS total FROM `tbl_score` where id_reviewer = 0";
		$resTotal = $this->fetch($sql);

		$sql = "SELECT count( DISTINCT (
				id_reviewer
				) ) AS total_review
				FROM `tbl_score`
				WHERE id_reviewer !=0";
		$res = $this->fetch($sql);
		$data['total'] = $resTotal['total'];
		$data['total_review'] = $res['total_review'];
		$data['total_belum_review'] = intval($resTotal['total']-$res['total_review']);

		return $data;
	}
	
	function getDataUnreview($id)
	{
		$sql = "SELECT p.nama
				FROM `tbl_score` s
				LEFT JOIN tbl_peserta p ON s.id_peserta = p.id
				WHERE s.id_reviewer= {$id}
				AND n_status =0";
		$res = $this->fetch($sql,1);
		if($res) return $res;
		return false;
	}
}
?>


