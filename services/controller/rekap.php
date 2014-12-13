<?php
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

class rekap extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		global $basedomain;
		$this->loadmodule();
		$this->view = $this->setSmarty();
		$this->view->assign('basedomain',$basedomain);
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
		$this->httpGet = $this->loadModel('httpGet');
	}
	
	public function index(){
		
		$link = "http://localhost/bu_p3swot/index.php/services/pendaftar/db4a9a257d1831b7e141785bee9fff502ee328ca/all/0/5";
		// $link = "http://p3swot.beasiswaunggulan.kemdiknas.go.id/index.php/services/pendaftar/db4a9a257d1831b7e141785bee9fff502ee328ca/all";
		
		$pendaftar = $this->getDataFromServer($link);
		
		
		$no = 1;
		foreach ($pendaftar->data as $key=>$val){
			
			if ($val->anggaran){
				$pendaftar->data[$key]->anggaran = number_format($val->anggaran);
			}
			$pendaftar->data[$key]->no = $no;
			$no++;
		}
		
		// pr($pendaftar);
		
		$this->view->assign('pendaftar',$pendaftar->data);
		return $this->loadView('rekap');

	}
	
	function getDataFromServer($link)
	{
		/* if allow_url_fopen is disabled */
		// $getcontent = $this->httpGet->ffl_HttpGet($link);
		// $content = json_decode($getcontent['body']);
		
		$content = json_decode(file_get_contents($link));
		// pr($content);
		if ($content)return $content;
		return false;
		
	}
	
	function edit()
	{
		
		$id = _g('id');
		$link = "http://localhost/bu_p3swot/index.php/services/pendaftar/db4a9a257d1831b7e141785bee9fff502ee328ca/pid/{$id}";
		// $link = "http://p3swot.beasiswaunggulan.kemdiknas.go.id/index.php/services/pendaftar/db4a9a257d1831b7e141785bee9fff502ee328ca/all";
		
		$pendaftar = $this->getDataFromServer($link);
		
		// pr($pendaftar);
		$no = 1;
		foreach ($pendaftar->data as $key=>$val){
			
			if ($val->anggaran){
				$pendaftar->data[$key]->anggaran = number_format($val->anggaran);
			}
			$pendaftar->data[$key]->no = $no;
			
			if ($val->tgl_sk){
				$tgl_sk = explode('-',$val->tgl_sk);
				$pendaftar->data[$key]->tgl_sk = $tgl_sk[1].'/'.$tgl_sk[2].'/'.$tgl_sk[0];
			}
			
			if ($val->tgl_kontrak){
				$tgl_kontrak = explode('-',$val->tgl_kontrak);
				$pendaftar->data[$key]->tgl_kontrak = $tgl_kontrak[1].'/'.$tgl_kontrak[2].'/'.$tgl_kontrak[0];
			}
			
			$no++;
		}
		
		// pr($pendaftar);
		
		$this->view->assign('pendaftar',$pendaftar->data[0]);
		return $this->loadView('input');
	}
	
	function saveData()
	{
		global $basedomain;
		$ch = curl_init();
		
		if ($_POST){
			
			$data = array();
			
			// pr($_POST);
			$data['no_sk'] = _p('no_sk');
			if (_p('tgl_sk')){
				$tgl_sk = explode('/',_p('tgl_sk'));
				$data['tgl_sk'] = $tgl_sk[2].'-'.$tgl_sk[0].'-'.$tgl_sk[1];
			}
			
			// $data['tgl_sk'] = _p('tgl_sk');
			
			$data['kontrak'] = _p('kontrak');
			if (_p('tgl_kontrak')){
				$tgl_kontrak = explode('/',_p('tgl_kontrak'));
				$data['tgl_kontrak'] = $tgl_kontrak[2].'-'.$tgl_kontrak[0].'-'.$tgl_kontrak[1];
			}
			
			$data['anggaran'] = _p('anggaran');
			$data['idpendaftaran'] = _p('idpendaftaran');
			$data['idperiode_seleksi'] = _p('idperiode');
			
			
			curl_setopt($ch, CURLOPT_URL, 'http://localhost/bu_p3swot/index.php/services/updateData');
			curl_setopt($ch, CURLOPT_POST, 1);
			// curl_setopt($ch, CURLOPT_POST, $data);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$exce = curl_exec($ch);
			// $newData = json_decode($exce,true);
			
			// echo '<pre>';
			// print_r($newData);
			redirect($basedomain.'rekap');
			exit;
		}
		// pr($_POST);
		
		exit;
		
	}
}

?>
