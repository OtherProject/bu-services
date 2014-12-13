<?php
class userHelper extends Database {
	
    var $date;
    var $salt;
    var $token;

    function __construct()
    {
        $session = new Session;
        $getSessi = $session->get_session();
        $this->user = $getSessi['default'];

        $this->prefix = "bpom";
        $this->date = date('Y-m-d H:i:s');
        $this->salt = 'ovancop2014';
        $this->token = substr(str_shuffle('QWERTYUIOPLKJHGFDSAZXCVBNM1234567890qwertyuioplkjhgfdsazxcvbnm'),0,30);
        $this->secret = sha1(substr(str_shuffle('QWERTYUIOPLKJHGFDSAZXCVBNM1234567890'),0,15));
        $this->emailToken = sha1($this->prefix.$this->salt.$this->date);
    }
    
    function createAccount($data=false, $debug=false)
    {

        // pr($data);
        $field = array('namaDepan','namaBelakang','instansi','alamat','noTelepon','email','appName');
        foreach ($data as $key => $value) {
            
            if (in_array($key, $field)){
                $tmpF[] = $key;
                $tmpV[] = "'".$value."'";
            }
        }

        $tmpF[] = "token";
        $tmpF[] = "secretKey";
        $tmpF[] = "createdDate";
        $tmpF[] = "emailToken";
        $tmpF[] = "salt";
        $tmpF[] = "password";

        $tmpV[] = "'{$this->token}'";
        $tmpV[] = "'{$this->secret}'";
        $tmpV[] = "'{$this->date}'";
        $tmpV[] = "'{$this->emailToken}'";
        $tmpV[] = "'{$this->salt}'";
        $tmpV[] = "'YOUR PASSWORD'";


        $impField = implode(',', $tmpF);
        $impData = implode(',', $tmpV);

        $sql = "INSERT IGNORE INTO social_member ({$impField}) VALUES ({$impData})";
        // pr($sql);
        $sql = array(
                'table'=>"social_member",
                'field'=>"{$impField}",
                'value'=> "{$impData}",
                );

        $res = $this->lazyQuery($sql,$debug,1);
        if ($res){
            $data['token'] = $this->emailToken;
            return $data;
        } 
        return false;

    }

    function saveIndustri($data=false)
    {
        $field = array('namaIndustri','namaPimpinan','noKTP','jenisKelamin','alamatPimpinan'); 

        foreach ($data as $key => $value) {
            
            if (in_array($key, $field)){
                $tmpF[] = $key;
                $tmpV[] = "'".$value."'";
            }
        }

        
        $tmpF[] = "createDate";
        $tmpF[] = "n_status";
        

        $tmpV[] = "'".$this->date."'";
        $tmpV[] = 1;
        

        $impField = implode(',', $tmpF);
        $impData = implode(',', $tmpV);

        $sql = "INSERT IGNORE INTO {$this->prefix}_industri ({$impField}) VALUES ({$impData})";
        
        $res = $this->query($sql);
        $id = $this->insert_id();
        if ($id) return $id;
        return false;
    }

    /**
     * @todo edit user profile, update user data from inputed data
     */
    function editProfile($data=false){
        if($data==false) return false;
        
        if (empty($data['twitter'])){
            $dataTwitter = 'NULL';
        }else{
            $dataTwitter = "'".$data['twitter']."'";
        }
        
        if (empty($data['website'])){
            $dataWeb = 'NULL';
        }else{
            $dataWeb = "'".$data['website']."'";
        }
        
        if (empty($data['phone'])){
            $dataPhone = 'NULL';
        }else{
            $dataPhone = "'".$data['phone']."'";
        }
        
        $session = new Session;
        $ses_user = $session->get_session();
        $user = $ses_user;                
             
        $sql = "UPDATE `person` SET `name` = '".$data['name']."', `email` = '".$data['email']."', `project` = '".$data['project']."', `institutions` = '".$data['institutions']."', `twitter` = $dataTwitter, `website` = $dataWeb, `phone` = $dataPhone WHERE `id` = '".$user['login']['id']."' ";
        $res = $this->query($sql,0);
        //$sql2 = "UPDATE `florakb_person` SET `username` = '".$data['username']."' WHERE `id` = '".$user['login']['id']."' ";
        //$res2 = $this->query($sql2,1);
        //if($res && $res2){return true;}
        if($res){return true;}
    }
    
    /**
     * @todo edit user password
     */
    function editPassword($data=false){
        if($data==false) return false;
        
        global $CONFIG;
		$salt = $CONFIG['default']['salt'];
		$password = sha1($data['newPassword'].$salt);
        
        $session = new Session;
        $ses_user = $session->get_session();
        $user = $ses_user;
        
        $sql = "UPDATE `florakb_person` SET `password` = '".$password."', `salt` = '".$salt."' WHERE `id` = '".$user['login']['id']."' ";
        $res = $this->query($sql,1);
        if($res){return true;}
    }
    
    /**
     * @todo get data user/person
     * 
     * @param $data = 
     * @param $field =  field name
     */
    function getUserData($field='id',$data=false){
        if($data==false){
            
            $data = $this->user['id'];
        }
       
        $sql = "SELECT * FROM `social_member` WHERE {$field} = '".$data."' ";
        // pr($sql);
        $res = $this->fetch($sql);  
        if(empty($res)){return false;}
        return $res; 
    }
    
    /**
     * @todo get data user/person app
     * 
     * @param $data = 
     * @param $field =  field name
     */
    function getUserappData($field,$data,$n_status=0){
        if($data==false) return false;
        $filter = "";
        if ($n_status) $filter = " AND n_status = {$n_status}";

        $sql = "SELECT * FROM `florakb_person` WHERE `$field` = '".$data."' {$filter}";
        $res = $this->fetch($sql,0,1);  
        if(empty($res)){return false;}
        return $res; 
    }

    function getCategory()
    {

        $sql = "SELECT *
                FROM {$this->tblprefix}_category
                WHERE n_status =1
                LIMIT 0 , 30";

        $res = $this->fetch($sql,1);  
        if ($res)return $res; 
        return false;
    }
    
    function setCategory($catID=array())
    {
        
       
        $sql = "INSERT IGNORE INTO {$this->tblprefix}_member_interest (userid, category_id, date_join, n_status)
                VALUES ({$this->user['id']}, '{$catID}', '{$this->date}',1)";
        // pr($sql);
        $res = $this->query($sql);  
        if ($res)return true; 
        return false;
    }
}
?>