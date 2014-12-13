<?php


class login extends Controller {
	
	var $models = FALSE;
	var $view;

	
	function __construct()
	{
		global $basedomain;
		$this->loadmodule();
		$this->view = $this->setSmarty();
		$this->view->assign('basedomain',$basedomain);
    }
	
	function loadmodule()
	{
        $this->userHelper = $this->loadModel('userHelper');
        $this->loginHelper = $this->loadModel('loginHelper');
        $this->activityHelper = $this->loadModel('activityHelper');
        // $this->helper_model = $this->loadModel('helper_model');

	}
	
	function index(){

        global $CONFIG, $basedomain;

        
        return $this->loadView('login');
    }
	
    
    /**
     * @todo enter the site as user
     */        
    function doLogin(){

        global $basedomain;
        //query data
        $getUserappData = $this->loginHelper->goLogin();
        // pr($getUserappData);
        if ($getUserappData){
            
            if ($getUserappData['verified']>0){
                redirect($basedomain.'account');    
            }
            
        }else{
            redirect($basedomain);
        }

        exit;
    }
    


}

?>
