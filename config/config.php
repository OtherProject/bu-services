<?php

define ('APP_CONTROLLER', APPPATH.'controller/');
define ('APP_VIEW', APPPATH.'view/');
define ('APP_MODELS', APPPATH.'model/');

/* Konfigurasi APP */

$CONFIG['default']['app_server'] = TRUE;
$CONFIG['default']['app_status'] = 'Development';
$CONFIG['default']['app_debug'] = TRUE;
$CONFIG['default']['app_underdevelopment'] = FAlSE;
$CONFIG['default']['php_ext'] = '.php';
$CONFIG['default']['html_ext'] = '.html';
$CONFIG['default']['default_view'] = 'home';
$CONFIG['default']['login'] = 'login';
$CONFIG['default']['admin'] = false;
$CONFIG['default']['salt'] = "12345678PnD";
$CONFIG['default']['hostname'] = "10.10.200.115";

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,4))=='https'?'https':'http';
// $protocol = isset($_SERVER["https"]) ? 'https' : 'http';

$CONFIG['default']['base_url'] = $protocol.'://localhost/sutresna/';
$CONFIG['default']['root_path'] = $_SERVER['DOCUMENT_ROOT'].'/sutresna';

$CONFIG['default']['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/sutresna/public_assets/';
$CONFIG['default']['max_filesize'] = 2097152;
$CONFIG['default']['upload_path_temporary'] = "/home/";
$CONFIG['default']['zip_foldername'] = "PUT_YOUR_ZIP_HERE";

$CONFIG['default']['css'] = APPPATH.'css/';
$CONFIG['default']['images'] = APPPATH.'images/';
$CONFIG['default']['js'] = APPPATH.'js/';

$CONFIG['default']['zip_ext'] = array('application/zip', 'application/x-zip', 'application/x-zip-compressed',  'application/octet-stream', 'application/x-compress', 'application/x-compressed', 'multipart/x-zip');
$CONFIG['default']['image'] = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/bmp');
$CONFIG['default']['document'] = array('application/pdf');
$CONFIG['default']['unzip'] = 'zipArchive'; //s_linux or zipArchive

$basedomain = $CONFIG['default']['base_url'];

$CONFIG['uri']['short'] = false;
$CONFIG['uri']['friendly'] = true;
$CONFIG['uri']['extension'] = ".html";

$CONFIG['email']['EMAIL_FROM_DEFAULT'] = "trinata.webmail@gmail.com";
$CONFIG['email']['EMAIL_SMTP_HOST'] = "mail.gmail.com";
$CONFIG['email']['EMAIL_SMTP_USER'] = "trinata.webmail@gmail.com";
$CONFIG['email']['EMAIL_SMTP_PASSWORD'] = "testermail";
$CONFIG['email']['EMAIL_SUBJECT'] = "[ NOTIFICATION ] Portal Services";

/* Twitter key */

$CONFIG['twitter']['CONSUMER_KEY'] = "";
$CONFIG['twitter']['CONSUMER_SECRET'] = "";
$CONFIG['twitter']['OAUTH_CALLBACK'] = $basedomain.'login/twitterCallBack/';

/* FB Key */

$CONFIG['fb']['appId'] = "";
$CONFIG['fb']['secret'] = "";

?>
