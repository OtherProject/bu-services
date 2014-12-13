<?php
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

class p3swot extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();

		global $app_domain, $DATA;
		$this->loadmodule();
		$this->view = $this->setSmarty();
		$sessionAdmin = new Session;
		$this->admin = $sessionAdmin->get_session();
		// $this->validatePage();
		$this->view->assign('app_domain',$app_domain);
		$this->view->assign('page',$DATA['admin']);
		$this->page = $DATA['admin'];
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
	}
	
	public function index(){
		
		$getTabelPendaftar = $this->contentHelper->getListTable('p3swot',$db=3);

		$this->view->assign('data',$getTabelPendaftar);
		return $this->loadView('tabel/list-tabel');

	}

	public function detail(){
		
		global $basedomain;
		
		$tb_name = _g('name');
		$getFieldPendaftar = $this->contentHelper->getListField(3, $tb_name);
		// pr($getFieldPendaftar);
		$this->view->assign('data',$getFieldPendaftar);
		$this->view->assign('db',1);
		$this->view->assign('tabel',$tb_name);

		$getAlias = $this->contentHelper->getAlias($tb_name);
		if ($getAlias){
			$this->view->assign('alias',$getAlias[0]);
		}
		$getRule = $this->contentHelper->getRule(1, $tb_name);
		if ($getRule){

			$this->view->assign('active',explode(',', $getRule[0]['field']));
		}
		// pr($getRule);
		if (isset($_POST['simpan'])){

			
			// pr($_POST);exit;
			$data['database'] = _p('idDatabase');
			$data['field'] = $_POST['field'];
			$data['tabel'] = $_POST['tabel'];

			$saveData = $this->contentHelper->saveMasterTable($data, $debug=0);

			if ($saveData){
				$alias['alias'] = $_POST['alias'];
				$alias['fieldPrimary'] = $_POST['fieldPrimary'];
				$alias['tabel'] = $_POST['tabel'];

				$saveAlias = $this->contentHelper->setAlias($alias);
				if ($saveAlias) redirect($basedomain.$this->page['page']);
			} 
			// pr($_POST);
		}
		return $this->loadView('tabel/list-tabel-detail');

	}

	
}

?>
