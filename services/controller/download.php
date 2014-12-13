<?php
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

class download extends Controller {
	
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
		// $this->httpGet = $this->loadModel('httpGet');
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
		return $this->loadView('download');

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
	
	function completeForm()
	{
		$id = _g('id');
		
		$link = "http://localhost/bu_p3swot/index.php/services/pendaftar/db4a9a257d1831b7e141785bee9fff502ee328ca/pid/{$id}";
		
		
		$pendaftar = $this->getDataFromServer($link);
		$this->view->assign('pendaftar',$pendaftar->data[0]);
		
		return $this->loadView('complete_form_download');
	}
	
	
	function getData()
	{
		
		ob_start();
		global $CONFIG, $basedomain;
		$id = _p('idpendaftar');
		$nama_rek = _p('nama_rek');
		$no_rek = _p('no_rek');
		$bank = _p('bank');
		
		$link = "http://localhost/bu_p3swot/index.php/services/pendaftar/db4a9a257d1831b7e141785bee9fff502ee328ca/pid/{$id}";
		
		
		$pendaftar = $this->getDataFromServer($link);
		
		
		$no = 1;
		foreach ($pendaftar->data as $key=>$val){
			
			if ($val->anggaran){
				$pendaftar->data[$key]->anggaran = number_format($val->anggaran);
			}
			$pendaftar->data[$key]->no = $no;
			$no++;
		}
		
		$date = changeDate(date('Y-m-d H:i:s'));
		$dateExplode = explode(' ',$date);
		// pr($pendaftar);exit;
		$this->view->assign('date',$dateExplode);
		$this->view->assign('nama_rek',$nama_rek);
		$this->view->assign('no_rek',$no_rek);
		$this->view->assign('bank',$bank);
		$this->view->assign('pendaftar',$pendaftar->data[0]);
		$template = $this->loadView('kontrak');
		
		$pdfpath = '../'.LIBS.'pdf/';
		$HTML2PDF = $this->load($pdfpath,'html2pdf.class','HTML2PDF');
		
		// $html2pdf = new HTML2PDF('P', 'A4', 'fr');
		$HTML2PDF->setDefaultFont('Arial');
		$HTML2PDF->writeHTML($template, false);
		$HTML2PDF->Output($pendaftar->data[0]->idpendaftaran.'.pdf'); 
		
		exit;
	}
}

?>
