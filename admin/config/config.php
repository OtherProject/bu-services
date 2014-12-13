<?php
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

define ('APP_CONTROLLER', APPPATH.'controller/');
define ('APP_VIEW', APPPATH.'view/');
define ('APP_MODELS', 'model/');

/* Konfigurasi APP */

$CONFIG['admin']['app_server'] = TRUE;
$CONFIG['admin']['smarty_enabled'] = false;
$CONFIG['admin']['app_status'] = 'Development';
$CONFIG['admin']['app_debug'] = TRUE;
$CONFIG['admin']['app_underdevelopment'] = FAlSE;
$CONFIG['admin']['smarty_enabled'] = true;
$CONFIG['admin']['php_ext'] = '.php';
$CONFIG['admin']['html_ext'] = '.html';
$CONFIG['admin']['default_view'] = 'home';
$CONFIG['admin']['login'] = 'login';


$CONFIG['admin']['app_url'] = 'http://localhost/sutresna/';
$CONFIG['admin']['base_url'] = 'http://localhost/sutresna/admin/';
$CONFIG['admin']['root_path'] = $_SERVER['DOCUMENT_ROOT'].'/sutresna/admin';

$CONFIG['admin']['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/sutresna/public_assets/';
$CONFIG['admin']['image'] = array('image/jpeg', 'image/pjpeg','image/png');
$CONFIG['admin']['max_filesize'] = 2097152;

$CONFIG['admin']['css'] = APPPATH.'css/';
$CONFIG['admin']['images'] = APPPATH.'images/';
$CONFIG['admin']['js'] = APPPATH.'js/';

$basedomain = $CONFIG['admin']['base_url'];
$app_domain = $CONFIG['admin']['app_url'];

/* Konfigurasi DB */

$dbConfig[0]['host'] = 'localhost';
$dbConfig[0]['user'] = 'root';
$dbConfig[0]['pass'] = 'root123root';
$dbConfig[0]['name'] = 'bu_services';
$dbConfig[0]['server'] = 'mysql';

// seleksi
$dbConfig[1]['host'] = 'localhost';
$dbConfig[1]['user'] = 'root';
$dbConfig[1]['pass'] = 'root123root';
$dbConfig[1]['name'] = 'simbada';
$dbConfig[1]['server'] = 'mysql';

// alumni
$dbConfig[2]['host'] = 'localhost';
$dbConfig[2]['user'] = 'root';
$dbConfig[2]['pass'] = 'root123root';
$dbConfig[2]['name'] = 'bu_alumni';
$dbConfig[2]['server'] = 'mysql';

// p3swot
$dbConfig[3]['host'] = 'localhost';
$dbConfig[3]['user'] = 'root';
$dbConfig[3]['pass'] = 'root123root';
$dbConfig[3]['name'] = 'p3swot';
$dbConfig[3]['server'] = 'mysql';

// doms
$dbConfig[4]['host'] = 'localhost';
$dbConfig[4]['user'] = 'root';
$dbConfig[4]['pass'] = 'root123root';
$dbConfig[4]['name'] = 'bu_doms';
$dbConfig[4]['server'] = 'mysql';

// keuangan
$dbConfig[5]['host'] = 'localhost';
$dbConfig[5]['user'] = 'root';
$dbConfig[5]['pass'] = 'root123root';
$dbConfig[5]['name'] = 'bu_keuangan';
$dbConfig[5]['server'] = 'mysql';

// laporan
$dbConfig[6]['host'] = 'localhost';
$dbConfig[6]['user'] = 'root';
$dbConfig[6]['pass'] = 'root123root';
$dbConfig[6]['name'] = 'bu_laporan';
$dbConfig[6]['server'] = 'mysql';

// disposisi
$dbConfig[7]['host'] = 'localhost';
$dbConfig[7]['user'] = 'root';
$dbConfig[7]['pass'] = 'root123root';
$dbConfig[7]['name'] = 'bu_submission';
$dbConfig[7]['server'] = 'mysql';

?>
