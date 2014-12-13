<?php
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

class evaluasi extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();

		global $app_domain;
		$this->loadmodule();
		$this->view = $this->setSmarty();
		$sessionAdmin = new Session;
		$this->admin = $sessionAdmin->get_session();
		// $this->validatePage();
		$this->view->assign('app_domain',$app_domain);
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
	}
	
	public function index(){
		
		$data = $this->contentHelper->getDataEvaluasi();
		// pr($data);
		if ($data){
			
			$this->view->assign('data',$data);
		}
		
		if ($_POST['status']){

			if (count($_POST['ids']>0)){

				$id = implode(',', $_POST['ids']);

				$status = intval($_POST['status']);
				$approve = $this->contentHelper->validateData($id, $status);
				if ($approve){
					echo "<script>window.location.href='".$basedomain."evaluasi'</script>";
					// redirect($basedomain.'evaluasi');
				}
			}
			
		}
		
		// pr($data);exit;
		

		return $this->loadView('evaluasi/evaluasi');

	}

	public function iklanmlr(){
		
		$data = $this->contentHelper->getDataEvaluasi();
		// pr($data);
		if ($data){
			
			$this->view->assign('data',$data);
		}
		
		if ($_POST['status']){

			if (count($_POST['ids']>0)){

				$id = implode(',', $_POST['ids']);

				$status = intval($_POST['status']);
				$approve = $this->contentHelper->validateData($id, $status);
				if ($approve){
					echo "<script>window.location.href='".$basedomain."evaluasi'</script>";
					// redirect($basedomain.'evaluasi');
				}
			}
			
		}
		
		// pr($data);exit;
		

		return $this->loadView('evaluasi/evaluasi-mlr');

	}

	public function iklanmlr_detail(){
		
		$data = $this->contentHelper->getDataEvaluasi();
		// pr($data);
		if ($data){
			
			$this->view->assign('data',$data);
		}
		
		if ($_POST['status']){

			if (count($_POST['ids']>0)){

				$id = implode(',', $_POST['ids']);

				$status = intval($_POST['status']);
				$approve = $this->contentHelper->validateData($id, $status);
				if ($approve){
					echo "<script>window.location.href='".$basedomain."evaluasi'</script>";
					// redirect($basedomain.'evaluasi');
				}
			}
			
		}
		
		// pr($data);exit;
		

		return $this->loadView('evaluasi/evaluasi-mlr-detail');

	}

	public function iklantv(){
		
		$data = $this->contentHelper->getDataEvaluasi();
		// pr($data);
		if ($data){
			
			$this->view->assign('data',$data);
		}
		
		if ($_POST['status']){

			if (count($_POST['ids']>0)){

				$id = implode(',', $_POST['ids']);

				$status = intval($_POST['status']);
				$approve = $this->contentHelper->validateData($id, $status);
				if ($approve){
					echo "<script>window.location.href='".$basedomain."evaluasi'</script>";
					// redirect($basedomain.'evaluasi');
				}
			}
			
		}
		
		// pr($data);exit;
		

		return $this->loadView('evaluasi/evaluasi-iklantv');

	}

	public function iklantv_detail(){
		
		$data = $this->contentHelper->getDataEvaluasi();
		// pr($data);
		if ($data){
			
			$this->view->assign('data',$data);
		}
		
		if ($_POST['status']){

			if (count($_POST['ids']>0)){

				$id = implode(',', $_POST['ids']);

				$status = intval($_POST['status']);
				$approve = $this->contentHelper->validateData($id, $status);
				if ($approve){
					echo "<script>window.location.href='".$basedomain."evaluasi'</script>";
					// redirect($basedomain.'evaluasi');
				}
			}
			
		}
		
		// pr($data);exit;
		

		return $this->loadView('evaluasi/evaluasi-iklantv-detail');

	}

	public function iklanphw(){
		
		$data = $this->contentHelper->getDataEvaluasi();
		// pr($data);
		if ($data){
			
			$this->view->assign('data',$data);
		}
		
		if ($_POST['status']){

			if (count($_POST['ids']>0)){

				$id = implode(',', $_POST['ids']);

				$status = intval($_POST['status']);
				$approve = $this->contentHelper->validateData($id, $status);
				if ($approve){
					echo "<script>window.location.href='".$basedomain."evaluasi'</script>";
					// redirect($basedomain.'evaluasi');
				}
			}
			
		}
		
		// pr($data);exit;
		

		return $this->loadView('evaluasi/evaluasi-phw');

	}

	public function iklanphw_detail(){
		
		$data = $this->contentHelper->getDataEvaluasi();
		// pr($data);
		if ($data){
			
			$this->view->assign('data',$data);
		}
		
		if ($_POST['status']){

			if (count($_POST['ids']>0)){

				$id = implode(',', $_POST['ids']);

				$status = intval($_POST['status']);
				$approve = $this->contentHelper->validateData($id, $status);
				if ($approve){
					echo "<script>window.location.href='".$basedomain."evaluasi'</script>";
					// redirect($basedomain.'evaluasi');
				}
			}
			
		}
		
		// pr($data);exit;
		

		return $this->loadView('evaluasi/evaluasi-phw-detail');

	}
	public function detail(){

		global $basedomain;

		$id = _g('id');


		$getMerek = $this->contentHelper->getMerekProduk();
		$this->view->assign('getMerek',$getMerek);

		
		if (!$id){
			$this->view->assign('addnew',true);
		}else{
			$data = $this->contentHelper->getDataEvaluasi($id);
			// pr($data);
			$this->view->assign('data',$data[0]);
		}
		
		$this->view->assign('id',$id);
		if ($_POST['id']){

			$update = $this->contentHelper->updateDataEvaluasi($_POST);
			if ($update){
				$this->view->assign('status',true);
			}else{
				$this->view->assign('status',false);
			}
		}


		if (isset($_GET['act'])){
			if (intval($_GET['act'])>0){


				$approve = $this->contentHelper->validateData($id,$_GET['act']);
				if ($approve){
					echo "<script>window.location.href='".$basedomain."evaluasi'</script>";
					// redirect($basedomain.'evaluasi');
				}else{
					$this->view->assign('status',false);
				}
			}
		}

		return $this->loadView('evaluasi/evaluasi-detail');
	}
	
	
	// function ajax()
	// {
		
	// 	$id = _p('id');
	// 	$n_status = _p('n_status');
		
	// 	$data = $this->models->updateStatusFrame($id, $n_status);
	// 	if ($data){
	// 		print json_encode(array('status'=>true));
	// 	}else{
	// 		print json_encode(array('status'=>false));
	// 	}

	// 	exit;
	// }

	function ajax()
	{

	    $id = _p('merek');
	    $getKab = $this->contentHelper->getProdusen($id);
	    if ($getKab){
	      print json_encode(array('status'=>true, 'res'=>$getKab));
	    }else{
	      print json_encode(array('status'=>false));
	    }
	    
	    exit;
	}
}

?>
