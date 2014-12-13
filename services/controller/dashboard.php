<?php
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

class dashboard extends Controller {
	
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
		
		// $this->pesertaHelper = $this->loadModel('pesertaHelper');
	}
	
	public function index(){
       
		// pr($_SESSION);
		return $this->loadView('dashboard');

	}

	
}

?>
