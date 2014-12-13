<?php
ob_start();
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

class member extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		global $basedomain,$app_domain;
		parent::__construct();
		$this->loadmodule();
		$this->view = $this->setSmarty();
		$this->view->assign('basedomain',$basedomain);
		$this->view->assign('app_domain',$app_domain);

		
	}
	public function loadmodule()
	{
		
		$this->userHelper = $this->loadModel('userHelper');
		$this->pesertaHelper = $this->loadModel('pesertaHelper');
	}
	
	public function index(){
       
		
		$listUser = $this->userHelper->getListUser();

		$user = $_SESSION['user'];
		$this->view->assign('user',$user);
		$this->view->assign('userlist',$listUser);
		return $this->loadView('member/member');

	}

	public function add(){
       	
       	global $basedomain;
		$token = _p('token');
		if ($token){


			$storeUser = $this->userHelper->addUser();
			

			$upload = uploadFile('ttd');
			
			if ($upload['status']){
				
				$updateTTD = $this->userHelper->updateUserImage($upload['filename'],$storeUser['id']);
			}
		

			if ($storeUser) redirect($basedomain.'member');
		}

		$listUser = $this->userHelper->getListUser();
		// pr($listUser);

		$this->view->assign('userlist',$listUser);
		return $this->loadView('member/member_add');

	}
	
	public function edit(){
       	
       	global $basedomain;
		$token = _p('token');
		if ($token){

			// pr($_POST);
			$upload = uploadFile('ttd');
			// pr($upload);

			$userid = _p('idpeserta');

			if ($upload['status']){
				
				$updateTTD = $this->userHelper->updateUserImage($upload['filename'],$userid);
			}

			// pr($updateTTD);
			// exit;
			$storeUser = $this->userHelper->updateUserProfile(false,$userid);

			if ($storeUser) redirect($basedomain.'member');
		}

		$id = _g('id');
		$listUser = $this->userHelper->getListUser($id);
		// pr($listUser);

		$this->view->assign('peserta',$listUser[0]);
		$this->view->assign('edit',true);
		return $this->loadView('member/member_add');

	}

	function deleteMember()
	{
		$userid = _p('userid');

		$delUser = $this->userHelper->deleteUser($userid);
		if ($delUser){
			echo json_encode(array('status'=>true));
		}else{
			echo json_encode(array('status'=>false));
		}

		exit;
	}

	function viewdetail()
	{

		global $basedomain;
		$token = _p('token');
		if ($token){

			// pr($_POST);
			$upload = uploadFile('ttd');
			// pr($upload);

			$userid = _p('idpeserta');

			if ($upload['status']){
				
				$updateTTD = $this->userHelper->updateUserImage($upload['filename'],$userid);
			}

			
			$storeUser = $this->userHelper->updateUserProfile(false,$userid);

			if ($storeUser) redirect($basedomain.'member');
		}

		$id = _g('id');
		$listUser = $this->pesertaHelper->getReviewerData($id);
		// pr($listUser);

		// $user = $_SESSION['user'];

		$this->view->assign('userlist',$listUser);
		$this->view->assign('edit',true);
		$this->view->assign('idpeserta',$id);
		return $this->loadView('member/member_detail');
	}

	function downloadXls()
	{
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=$filename");  //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		$filename = "review_report_".date('Ymd_gia').".xls";
		$id = _g('id');
		$userlist = $this->pesertaHelper->getReviewerData($id);
		if ($userlist){
			echo "<table border='2'>";
				echo "<tbody>";
					echo "<tr><th>Nama Reviewer</th>";
							foreach ($userlist as $val):
					  		echo "<td>{$val[nama]}</td>";
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
		$userlist = $this->pesertaHelper->getReviewerData($id);

		$this->view->assign('userlist',$userlist);
		$this->view->assign('peserta',false);
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
