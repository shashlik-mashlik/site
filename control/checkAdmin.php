<?
if($_GET['pwd'] && $_GET['token']) {
	include($_SERVER['DOCUMENT_ROOT'].'/_config.php');
	include($_SERVER['DOCUMENT_ROOT'].'/admin/inc/hotp.class.php');
	
	$admin_seeds = explode("\r", file_get_contents($_SERVER['DOCUMENT_ROOT'].'/control/tokens'));
	foreach($admin_seeds as $k=>$el) { $admin_seeds[$k] = trim($el); }	

	$sql = "SELECT `value` FROM `mandarinko_base` WHERE `param`='admin_cnt1' OR `param`='admin_cnt2'";
	$r = mysql_query($sql);	
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);	
	
	$hotp = new cHotp();		
	
	foreach($admin_seeds as $k=>$el) {
		$cur = $k + 1;//какой админ
		$cur_cnt = $hotp->authOTP($el, $_GET['pwd'], $data[$k]['value'], $_GET['token']);
		
		if($cur_cnt) {
			//зашли под админом
			$loggedin['asadmin'] = $cur; 
			$cnt = $cur_cnt;
			break;
		}
	}	
	if($loggedin['asadmin']) {		
		//обновили ему счетчик в базе
		$sql = "UPDATE `mandarinko_base` SET `value`='".$cnt."' WHERE `param`='admin_cnt".$loggedin['asadmin']."'";
		mysql_query($sql);
	}
	echo $loggedin['asadmin'];
}
?>
