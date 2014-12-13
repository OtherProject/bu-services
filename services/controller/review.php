<?php

class review extends Controller {
	
	var $models = FALSE;
	var $view;
	public function __construct()
	{
        global $basedomain,$app_domain;
		$this->loadmodule();
        $this->view = $this->setSmarty();
        $this->view->assign('basedomain',$basedomain);
        $this->view->assign('app_domain',$app_domain);
	}
	public function loadmodule()
	{
		
		$this->pesertaHelper = $this->loadModel('pesertaHelper');
        $this->excelHelper = $this->loadModel('excelHelper');
	}
	
	public function index(){
		
		logFile('test log');


		$getData = $this->pesertaHelper->getListPeserta();
		// pr($getData);

		$getReviewer = $this->pesertaHelper->getReviewer();
		// pr($getData);
		$this->view->assign('peserta',$getData);
		$this->view->assign('reviewer',$getReviewer);
		$this->view->assign('user',$_SESSION['user']);
		return $this->loadView('review');

	}
	
	function parseExcel()
	{
		/*
		New scenario !
		1. Parse data xls 
		2. Validate data before upload
		3. Store data to tmp table
		3. Try to move data from tmp table to real table
		4. Done
		
		*/
		
		global $EXCEL, $basedomain;
		
		
		if ($_FILES){
			
			$numberOfSheet = 2;
			$startRowData = 0;
			$startColData = 0;
			$formNametmp = array_keys($_FILES);
			$formName = $formNametmp[0];
			
			if (empty($formName)) die;
			
			$startTime = microtime(true);
			/* parse data excel */
			
			$checkFileBefore = $this->pesertaHelper->ifFileExist($_FILES['tes']['name']);
			if ($checkFileBefore){echo 'file already exist'; die();} 
			logFile('load excel begin');
			$fetchMaster = $this->excelHelper->fetchMaster($formName, $numberOfSheet,$startRowData,$startColData);
			
			
			// pr($fetchMaster);
			if ($fetchMaster){
				logFile('fetch excel success');
				$storeMasterData = $this->storePeserta($fetchMaster['master_data']); 
				$storeReferenceData = $this->storeRefPeserta($fetchMaster['reference_data']);
				// exit;
				if ($storeMasterData){
					logFile('store master data');
					$this->pesertaHelper->lockFileName($_FILES['tes']['name']);
					$endTime = microtime(true);
					
					if ($storeMasterData) echo 'Insert success  ('. execTime($startTime,$endTime).')';
					else echo 'Insert data failed';
					
					
				}
			}
		}else{
		
			echo "File is empty";
		}
		
		redirect($basedomain.'review');
		exit;
	}
	
	function storePeserta($master_data)
	{
		
		
		$field = array('nama','alamat','tempat_lahir','tanggal_lahir','kota','kode_pos','agama','gender','status_keluarga','nama_ortu','email','no_telp','usia');
		$convert = array('Nama'=>'nama','Alamat'=>'alamat','Tempat Lahir'=>'tempat_lahir','Kota'=>'kota','Kode Pos'=>'kode_pos','Agama'=>'agama',
						'Gender'=>'gender','Status Keluarga'=>'status_keluarga','Nama Orang-tua'=>'nama_ortu','E-mail'=>'email',
						'Pekerjaan'=>'pekerjaan','Pendidikan'=>'pendidikan','Semester Saat Ini'=>'semester_berjalan','Jurusan'=>'jurusan',
						'Nama Perusahaan'=>'nama_perusahaan','Nama Kepala Perusahaan'=>'kepala_perusahaan','Jabatan'=>'jabatan',
						'Alamat Perusahaan'=>'alamat_perusahaan','Kota Perusahaan'=>'kota_perusahaan','Telepon Perusahaan'=>'tlp_perusahaan',
						'Fax Perusahaan'=>'fax_perusahaan','No. Telepon'=>'no_tlp','Usia'=>'usia');
		$data = array();
		
		$index = 0;
		
		if ($master_data){
			foreach ($master_data as $val){
						
				
				foreach ($val as $keys => $value){
					
					// $field = implode(',',$val['field_name']);
					// pr($keys);
					$fieldKey = @array_keys($convert);
					if (in_array($keys, $fieldKey)){
						$newData[$index][$convert[$keys]] = $value;
					}
					// $newData[$val['sheet']]['data'][] = $data; 
					
				}
				$index++;
			}
			// pr($newData);exit;
			if ($newData){
				foreach ($newData as $val){
					
					$this->pesertaHelper->storePeserta($val);
				}
				
				return true;
			}
			
			// pr($newData);
		}
		
		return false;
	}
	
	function storeRefPeserta($master_data)
	{
		
		foreach ($master_data as $key=>$val){ 
			
			$id_peserta = $this->pesertaHelper->getPeserta(false,  $val['nama'],true);
			
			$master_data[$key]['id_peserta'] = $id_peserta[0]['id'];
		}
		
		if ($master_data){
			foreach ($master_data as $val){
						
				
				$this->pesertaHelper->storeRefPeserta($val);
				
			}
			return true;
			// pr($newData);
		}
		
		return false;
	}
	
	function edit()
	{
		
		$id = _g('id');
		$peserta = $this->pesertaHelper->getListPeserta($id);
		if ($peserta){

			$bobot_array = array("jalur_bobot","toefl_bobot","toeic_bobot","akreditasi_bobot","kelulusan_bobot","prestasi_bobot",
								"pelatihan_bobot","kejuaraan_bobot","organisasi_bobot", "pengalaman_bobot","riset_bobot","rekomendasi_bobot");
			foreach ($peserta[0] as $key => $value) {
				if (in_array($key, $bobot_array)){
					$peserta[0][$key] = intval($value);
				}
			}
		}
		// pr($peserta);
		$this->view->assign('peserta',$peserta[0]);

		if (_p('token')){
			
			$idpeserta = _p('idpeserta');

// pr($_FILES);
// 			exit;
			$updateScore = $this->pesertaHelper->updateScore();
			if ($updateScore){
				redirect($basedomain.'edit/?id='.$idpeserta);
				exit;
			}

		}else{
			return $this->loadView('review_edit');
		}
		
	}
	
	function truncate()
	{
		$this->collectionHelper->truncateData(true,true);
	}

	function ajax()
	{

		$idreview = _p('idreview');
		$idpeserta = _p('idpeserta');
		$reviewer = $this->pesertaHelper->setReviewer($idreview,$idpeserta);
		if ($reviewer){
			$getreviewer = $this->pesertaHelper->getDataReview($idpeserta);
			if ($getreviewer){
				print json_encode(array('status'=>true, 'res'=>$getreviewer));
			}else{
				print json_encode(array('status'=>false));
			}
		}else{
			print json_encode(array('status'=>false));
		}
		exit;
	}

	function detailReview()
	{
		$id = _g('id');
		$listUser = $this->pesertaHelper->getPesertaData($id);
		// pr($listUser);

		$user = $_SESSION['user'];

		if ($listUser){
			foreach ($listUser as $key => $value) {
				$data['jalur_total'] += $value['jalur_total'];
				$data['toefl_bobot'] += $value['toefl_bobot'];
				$data['toeic_bobot'] += $value['toeic_bobot'];
				$data['kelulusan_bobot'] += $value['kelulusan_bobot'];
				$data['prestasi_bobot'] += $value['prestasi_bobot'];
				$data['pelatihan_bobot'] += $value['pelatihan_bobot'];
				$data['kejuaraan_bobot'] += $value['kejuaraan_bobot'];
				$data['organisasi_bobot'] += $value['organisasi_bobot'];
				$data['pengalaman_bobot'] += $value['pengalaman_bobot'];
				$data['riset_bobot'] += $value['riset_bobot'];
				$data['rekomendasi_bobot'] += $value['rekomendasi_bobot'];
				$data['rekap_total_score'] += $value['rekap_total_score'];
			}


		}

		$data['jumlah_peserta'] = count($listUser);
		// pr($data);
		$this->view->assign('user',$user);
		$this->view->assign('userlist',$listUser);
		$this->view->assign('edit',true);
		$this->view->assign('idpeserta',$id);
		$this->view->assign('totalReview',$data);

		return $this->loadView('review_detail');
	}

	function downloadXls()
	{

		
		$filename = "review_report_".date('Ymd_gia').".xls";
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=$filename");  //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);

		$id = _g('id');
		$userlist = $this->pesertaHelper->getPesertaData($id);
		if ($userlist){
			echo "<table>";
				echo "<tbody>";
					echo "<tr><th>Nama Reviewer</th>";
							foreach ($userlist as $val):
					  		echo "<td>{$val[name]}</td>";
					  		endforeach;
					  	echo "</tr>";

						echo "<tr>  <th>Jenis BU</th>";
							foreach ($userlist as $val):
							echo "<td>SLN</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>Jalur</th>";
							foreach ($userlist as $val):
								if ($val[jalur]==1) $jalur = "UN";
								else $jalur = "IPK";
							echo "<td >$jalur</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A IPK</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[jalur_total]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A Toefl</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[toefl_bobot]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A Toeic</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[toeic_bobot]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A Kelulusan</th>";
							foreach ($userlist as $val):
							echo "<td>{$val[kelulusan_bobot]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A Prestasi</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[prestasi_bobot]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A Pelatihan</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[pelatihan_bobot]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A Kejuaraan</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[kejuaraan_bobot]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A Organisasi</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[organisasi_bobot]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A Pengalaman</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[pengalaman_bobot]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A Penelitian</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[riset_bobot]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>N.A Rekomendasi</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[rekomendasi_bobot]}</td>";
							endforeach;
						echo "</tr>";
						echo "<tr>  <th>Score Total</th>";
							foreach ($userlist as $val):
							echo "<td >{$val[rekap_total_score]}</td>";
							endforeach;
						echo "</tr>";
						
				  echo "</tbody> ";   
				  
			echo "</table>";
		}

		exit;
	}
	

	function downloadPDF()
	{

		$id = _g('id');
		$userlist = $this->pesertaHelper->getPesertaData($id);

		$this->view->assign('userlist',$userlist);
		$this->view->assign('peserta',true);
		$template = $this->loadView('download_review');
		// pr($template);
		// exit;
		$pdfpath = '../'.LIBS.'pdf/';
		$HTML2PDF = $this->load($pdfpath,'html2pdf.class','HTML2PDF');
		
		// $html2pdf = new HTML2PDF('P', 'A4', 'fr');
		$HTML2PDF->setDefaultFont('Arial');
		$HTML2PDF->writeHTML($template, false);
		$HTML2PDF->Output('review_report_'.date('Ymd_gia').'.pdf'); 
		
		exit;
	}
}

?>
