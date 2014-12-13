<?php
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

class about extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
	}
	
	public function index(){
       
		
		return $this->loadView('about/about');

	}
	
}

?>
