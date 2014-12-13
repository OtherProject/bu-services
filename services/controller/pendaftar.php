<?php
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

class pendaftar extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		$this->view = $this->setSmarty();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
		$this->httpGet = $this->loadModel('httpGet');
	}
	
	public function index(){
		
		// $link = "http://localhost/bu_p3swot/index.php/services/pendaftar/db4a9a257d1831b7e141785bee9fff502ee328ca/all";
		$link = "http://p3swot.beasiswaunggulan.kemdiknas.go.id/index.php/services/pendaftar/db4a9a257d1831b7e141785bee9fff502ee328ca/all";
		
		$pendaftar = $this->getDataFromServer($link);
		// pr($pendaftar);
		
		$this->view->assign('pendaftar',$pendaftar->data);
		return $this->loadView('member/pendaftar');

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
}

?>
