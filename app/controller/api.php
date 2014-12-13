<?php


class api extends Controller {
	
	var $models = FALSE;
	var $view;

	
	function __construct()
	{
		global $basedomain;
		$this->loadmodule();
		$this->view = $this->setSmarty();
		$this->view->assign('basedomain',$basedomain);
    $userdata = $this->isUserOnline();
    $this->user = $userdata['default'];
    $browsertype = $this->checkBrowser();
    $this->view->assign('browsertype',$browsertype);

    }
	
	function loadmodule()
	{
    $this->userHelper = $this->loadModel('userHelper');
    $this->apiHelper = $this->loadModel('apiHelper');
	}
	
  function index(){

		global $CONFIG, $basedomain;

   
		$data['token'] = "kPvF2umxfiUEwjL1MhC5tX7d9IY4Zs";
    $data['secret_key'] = "e5130748eb5b0b98f8009274e956c661fdc729f0";
    $data['domain'] = "1";
    $data['method'] = "get_pendaftar";
    $data['limit'] = "10";
    
    $encode = encode($data);
    pr($encode);

  	// return $this->loadView('api-landing');
  }
	
	function get()
  {

    $dataEncode = _g('req');
    // pr($_GET);
    $decode = decode($dataEncode);
    // pr($decode);exit;
    if ($decode){

      $token = $decode['token'];
      $secret_key = $decode['secret_key'];
      $domain = $decode['domain'];
      $method = $decode['method'];
      $limit = $decode['limit'];
      $id = $decode['id'];

      $validateUser = $this->apiHelper->verifiedUser($token, $secret_key);
      if (!$validateUser) $this->error();

      $table = $this->apiHelper->getAlias($method);

      foreach ($validateUser as $key => $value) {
        
        if ($domain == $value['idDatabase'] AND $table[0]['method'] == $value['tabel']){
          $newData = $value;
          $newData['fieldPrimary'] = $table[0]['fieldPrimary'];
          $newData['idData'] = $id;
        }
      }

      if (!$newData) $this->error();
      $checkRule = $this->apiHelper->checkRule($newData);

      if (!$checkRule) $this->error();
      
      print json_encode(array('status'=>true, 'data'=>$checkRule));
      exit;
      
    }else{
      
      $this->error();
    }
  }

  function error()
  {
    print json_encode(array('status'=>false));
    exit;
  }

  function debuging()
  {
    $email = _g('email');
    if ($email==""){print(json_encode(false));exit;}
    $debug = $this->loginHelper->debuging($email);
    if($debug){
      print(json_encode(true));
    }else{
      print(json_encode(false));
    }

    exit;
  }
}

?>
