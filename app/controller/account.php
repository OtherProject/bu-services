<?php


class account extends Controller {
	
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
    $this->contentHelper = $this->loadModel('contentHelper');
    $this->apiHelper = $this->loadModel('apiHelper');
	}
	
  function index(){

		global $CONFIG, $basedomain;

    $getUser = $this->userHelper->getUserData();
    // pr($getUser);
    if ($getUser['aksesVerified']){
      $getRUle = $this->apiHelper->getUserRule($getUser['aksesVerified']);
      if ($getRUle){
        foreach ($getRUle as $key => $value) {
          $tmp = $this->apiHelper->getAlias($value['tabel'], true);
          if ($tmp) $getAlias[] = $tmp;
        }

        $this->view->assign('rule',$getAlias); 
      }
    }
		
    
    $this->view->assign('user',$getUser);	
    
     // pr($getAlias);
  	return $this->loadView('account');
  }
	
	function industri(){

    global $CONFIG, $basedomain;

   
    
    $id_industri = $this->user['industri_id'];
    $getIndustri = $this->contentHelper->getIndustri($id_industri);

    $getProv = $this->contentHelper->getKab();
    // pr($getIndustri);
    $this->view->assign('user',$this->user);  
    $this->view->assign('data',$getIndustri[0]);  
    $this->view->assign('lokasi',$getProv); 

    $getCurrentKab = $this->contentHelper->getKab($getIndustri[0]['provinsi']);
    $getCurrentProv = $this->contentHelper->getLokasi($getCurrentKab[0]['parent']);

    if ($getCurrentKab){
      $this->view->assign('kabupaten',$getCurrentKab[0]);  
      $this->view->assign('provinsi',$getCurrentProv[0]);  
    }
    
    if ($_POST){
      // pr($_POST);

      $saveData = $this->contentHelper->saveDataIndustri($_POST);
      if ($saveData) reload($basedomain.'account/industri');
    }
     // pr($getIndustri);
    return $this->loadView('account-industri');
  }

  function pabrik()
  {

    global $basedomain;

    $id_industri = $this->user['industri_id'];
    $getIndustri = $this->contentHelper->getIndustri($id_industri);
    $this->view->assign('datapabrik',$getIndustri[0]); 
    // pr($getIndustri);
    $getPabrik = $this->contentHelper->getPabrik(false,$getIndustri[0]['id']);
    // pr($getPabrik);
    if ($getPabrik){

      foreach ($getPabrik as $key => $value) {
        $tmp = $this->contentHelper->getKab($value['provinsi']);
        $getPabrik[$key]['alamatPabrik'] = $tmp[0];
      }

      // pr($getPabrik);
      $this->view->assign('pabrik',$getPabrik);  
    }

    $getProv = $this->contentHelper->getKab();
    // pr($getIndustri);
    $this->view->assign('user',$this->user);  
    $this->view->assign('data',$getIndustri[0]);  
    $this->view->assign('lokasi',$getProv); 

    if ($_POST){
      // pr($_POST);

      $saveData = $this->contentHelper->saveDataPabrik($_POST);
      if ($saveData){

        // pr($_FILES);
        if(!empty($_FILES)){
          if($_FILES['fileNPPBKC']['name'] != ''){
            $image = uploadFile('fileNPPBKC',null,'document');
            // pr($image);
            // exit;
            if ($image){
              $image['id'] = $_POST['id'];
              $updateData = $this->contentHelper->updateDataPabrik($image);
              if ($updateData) reload($basedomain.'account/pabrik');
            }
          }

        }
        reload($basedomain.'account/pabrik');
      }

    }

    if (isset($_GET['id'])){

      $getIndustri = $this->contentHelper->getIndustri($id_industri);
      $this->view->assign('datapabrik',$getIndustri[0]); 
      // pr($getIndustri);
      $getPabrik = $this->contentHelper->getPabrik($_GET['id']);
      // pr($getPabrik);
      if ($getPabrik){

        foreach ($getPabrik as $key => $value) {
          $tmp = $this->contentHelper->getKab($value['provinsi']);
          $getPabrik[$key]['alamatPabrik'] = $tmp[0];
          $tmpKab = $this->contentHelper->getKab($value['provinsi']);
          $getPabrik[$key]['getCurrentKab'] = $tmpKab[0];
          $tmpProv = $this->contentHelper->getLokasi($tmpKab[0]['parent']);
          $getPabrik[$key]['getCurrentProv'] = $tmpProv[0];
        }

        
        // pr($getPabrik);
        $this->view->assign('data',$getPabrik[0]);  
      }

      $this->view->assign('id',$_GET['id']);  
    }


    return $this->loadView('account-pabrik');
  }

  function pelaporan()
  {

    global $basedomain;
    $id_industri = $this->user['industri_id'];
    $getIndustri = $this->contentHelper->getIndustri($id_industri);

    $this->view->assign('listindustri',$getIndustri); 
    
    $getPelaporanKemasan = $this->contentHelper->getPelaporanKemasan(false,$getIndustri[0]['id']);
    // pr($getPelaporanKemasan);
    $this->view->assign('laporankemasan',$getPelaporanKemasan); 

    $getPabrik = $this->contentHelper->getPabrik(false,$getIndustri[0]['id']);
    if ($getPabrik){

        foreach ($getPabrik as $key => $value) {
          $tmp = $this->contentHelper->getKab($value['provinsi']);
          $getPabrik[$key]['alamatPabrik'] = $tmp[0];
          $tmpKab = $this->contentHelper->getKab($value['provinsi']);
          $getPabrik[$key]['getCurrentKab'] = $tmpKab[0];
          $tmpProv = $this->contentHelper->getLokasi($tmpKab[0]['parent']);
          $getPabrik[$key]['getCurrentProv'] = $tmpProv[0];
        }

        
        
        $this->view->assign('listpabrik',$getPabrik);  
    }

    $getProduk = $this->contentHelper->getProduk();
    $this->view->assign('produk',$getProduk);  
    // pr($getProduk);

    if ($_POST){
      // pr($_POST);
      // pr($_FILES);

      $saveData = $this->contentHelper->saveDataKemasan($_POST);
      if ($saveData){

        // pr($_FILES);
        if(!empty($_FILES)){
          

            $foto = array('fotoDepan','fotoBelakang','fotoKanan','fotoKiri','fotoAtas','fotoBawah');
            foreach ($foto as $key => $value) {

              if($_FILES[$value]['name'] != ''){
                $image = uploadFile($value,null,'image');
                // pr($image);
                // exit;
                if ($image){
                  $dataImage[$value] =  $image;
                }
              }
            }
          // pr($dataImage);
          
          $dataImage['pabrikID'] = $_POST['pabrikID'];
          $updateData = $this->contentHelper->updateDataKemasan($dataImage);
          if ($updateData) reload($basedomain.'account/pelaporan');


        }
        reload($basedomain.'account/pelaporan');
      }
    }

    if (isset($_GET['id'])){

      $getPabrik = $this->contentHelper->getPabrik($id);
      // pr($getPabrik);
      if ($getPabrik){
        $getIndustri = $this->contentHelper->getIndustri($getPabrik[0]['indusrtiID']);
        

        $data['ind'] = $getIndustri[0];
        $data['pabrik'] = $getPabrik[0];
      }

      $id_industri = $this->user['industri_id'];
      $getIndustri = $this->contentHelper->getIndustri($id_industri);

      // exit;
      $getPelaporanKemasan = $this->contentHelper->getPelaporanKemasan($_GET['id']);
      // pr($getPelaporanKemasan);
      $this->view->assign('laporankemasandetail',$getPelaporanKemasan[0]); 
    }

    return $this->loadView('account-pelaporan');
  }

  function pelaporan_nikotin()
  {

    global $basedomain;
    $id_industri = $this->user['industri_id'];
    $getIndustri = $this->contentHelper->getIndustri($id_industri);

    $this->view->assign('listindustri',$getIndustri); 
    
    $getPelaporanNikotin = $this->contentHelper->getPelaporanNikotin(false,$getIndustri[0]['id']);
    // pr($getPelaporanNikotin);
    $this->view->assign('laporannikotin',$getPelaporanNikotin); 

    $getLab = $this->contentHelper->getLab();
    // pr($getLab);
    $this->view->assign('lab',$getLab); 

    $getPabrik = $this->contentHelper->getPabrik(false,$getIndustri[0]['id']);
    if ($getPabrik){

        foreach ($getPabrik as $key => $value) {
          $tmp = $this->contentHelper->getKab($value['provinsi']);
          $getPabrik[$key]['alamatPabrik'] = $tmp[0];
          $tmpKab = $this->contentHelper->getKab($value['provinsi']);
          $getPabrik[$key]['getCurrentKab'] = $tmpKab[0];
          $tmpProv = $this->contentHelper->getLokasi($tmpKab[0]['parent']);
          $getPabrik[$key]['getCurrentProv'] = $tmpProv[0];
        }

        
        
        $this->view->assign('listpabrik',$getPabrik);  
    }

    $getProduk = $this->contentHelper->getProduk();
    $this->view->assign('produk',$getProduk);  
    // pr($getProduk);

    if ($_POST){
      // pr($_POST);
      // pr($_FILES);
      // exit;
      $saveData = $this->contentHelper->saveDataNikotin($_POST);
      if ($saveData){

        // pr($_FILES);
        if(!empty($_FILES)){
          

            $foto = array('sertifikat');
            foreach ($foto as $key => $value) {

              if($_FILES[$value]['name'] != ''){
                $image = uploadFile($value,null,'image');
                // pr($image);
                // exit;
                if ($image){
                  $dataImage[$value] =  $image;
                }
              }
            }
          // pr($dataImage);
          
          $dataImage['pabrikID'] = $_POST['pabrikID'];
          $dataImage['industriID'] = $_POST['industriID'];
          $updateData = $this->contentHelper->updateDataNikotin($dataImage);
          if ($updateData) reload($basedomain.'account/pelaporan_nikotin');


        }
        reload($basedomain.'account/pelaporan_nikotin');
      }
    }

    if (isset($_GET['id'])){

      $getPabrik = $this->contentHelper->getPabrik($id);
      // pr($getPabrik);
      if ($getPabrik){
        $getIndustri = $this->contentHelper->getIndustri($getPabrik[0]['indusrtiID']);
        

        $data['ind'] = $getIndustri[0];
        $data['pabrik'] = $getPabrik[0];
      }

      $id_industri = $this->user['industri_id'];
      $getIndustri = $this->contentHelper->getIndustri($id_industri);

      // exit;
      $getPelaporanNikotin = $this->contentHelper->getPelaporanNikotin($_GET['id']);
      // pr($getPelaporanNikotin);
      $this->view->assign('kemasanedit',$getPelaporanNikotin[0]); 
    }
    return $this->loadView('account-pelaporan-nikotin');
  }

  function ajaxPabrik()
  {

    $id = _p('kode_wilayah');
    if ($id){
      $getPabrik = $this->contentHelper->getPabrik($id);
      // pr($getPabrik);
      if ($getPabrik){
        $getIndustri = $this->contentHelper->getIndustri($getPabrik[0]['indusrtiID']);
        

        $data['ind'] = $getIndustri[0];
        $data['pabrik'] = $getPabrik[0];
        // pr($data);
        print json_encode(array('status'=>true, 'res'=>$data));
      }else{
        print json_encode(array('status'=>false));
      }
    }else{
      print json_encode(array('status'=>false));
    }
    
    
    exit;
  }

  function ajaxLab()
  {

    $id = _p('kode_wilayah');
    if ($id){
      $getLab = $this->contentHelper->getLab($id);
      // pr($getPabrik);
      if ($getLab){
        
        // pr($data);
        print json_encode(array('status'=>true, 'res'=>$getLab[0]));
      }else{
        print json_encode(array('status'=>false));
      }
    }else{
      print json_encode(array('status'=>false));
    }
    
    
    exit;
  }

  function ajax()
  {

    $id = _p('kode_wilayah');
    $getKab = $this->contentHelper->getKab(false, $id);
    if ($getKab){
      print json_encode(array('status'=>true, 'res'=>$getKab));
    }else{
      print json_encode(array('status'=>false));
    }
    
    exit;
  }

  function formRegister()
  {
    global $basedomain;
   
   if(!$this->user) {redirect($basedomain."home/connect");exit;} 
    $getUserInfo = $this->loginHelper->getUserInfo();
    if ($getUserInfo['verified']>0){
      redirect($basedomain.'uploadfoto/pilihframe');
    }

    $this->view->assign('user',$this->user);
    return $this->loadView('form');
  }

  function inputForm()
  {

    global $basedomain;

    $inputData=$this->contentHelper->registerUser($_POST); 
    if ($inputData)redirect($basedomain.'uploadfoto/pilihframe');

  }

  

	function loginSocmed()
  {

    global $CONFIG, $basedomain;

    
  }
  function thanks(){
    return $this->loadView('thanks');

  }

  function privacy(){
     return $this->loadView('privacy');

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
