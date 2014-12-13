<?php
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

class input extends Controller {
	
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
		
		$this->view->assign('pendaftar',1);
		return $this->loadView('input');

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
