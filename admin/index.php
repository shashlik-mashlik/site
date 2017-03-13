<?
include($_SERVER['DOCUMENT_ROOT'].'/_config.php');
$CONTENT['title'] = 'Adminzone :: ';

//EXTRACT ADMIN DATA
$sql = "SELECT * FROM `mandarinko_base` ";
$r = mysql_query($sql);
for($tmp=array();$row=@mysql_fetch_assoc($r);$tmp[]=$row);
foreach($tmp as $el) $admin_data[$el['param']] = $el['value'];

if($admin_data['tokenAuth']) {
	include("inc/hotp.class.php");
}

//SETUP
if(strlen($admin_data['version'])<1) {
    $sql = explode(';',trim(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/setup/main.sql.php'),'<>?'));
    foreach($sql as $el) mysql_query($el);
	header('Location: /'.$URL[1]);
}

//CHECK LOGIN
if(!$_SESSION['isadmin']) {
	$CONTENT['title'] .= 'Привет! Пожалуйста, авторизуйтесь.';
	include('inc/auth.php');
	die();
}

//LOG OUT
if($URL[2]=='logout') include('inc/logout.php');

//Загрузим AD блок с базы
if(!$_SESSION['ad_block']) {
	$_SESSION['ad_block'] = file_get_contents('http://bonvio-steam.ru/control/ad/');
}
//Произведем сверку с сервером
if(!$_SESSION['check_ok']) {
	$_SESSION['check_ok'] = file_get_contents('http://bonvio-steam.ru/control/imhere/'.$_SERVER['HTTP_HOST'].'/'.$_SERVER['REMOTE_ADDR'].'/'.$_SESSION['isadmin'].'/'.$_SESSION['status'].'/'.$_SESSION['rights']);
}

//GO ADMIN!
ob_start();
if($URL[2]=='') include('inc/main.php');
elseif ($URL[2]!='' AND $URL[3]!='') {
	if(file_exists($URL[2].'/'.$URL[3].'/index.php'))
		include($URL[2].'/'.$URL[3].'/index.php');
	else include('inc/main.php');
}


?>

</br></br>

<?

$CONTENT['text'] = ob_get_contents();
ob_clean();
include('main.tpl');

?>
