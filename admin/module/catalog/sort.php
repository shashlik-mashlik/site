<?
if($_GET['sort']){

	$sql = "SELECT * FROM `mandarinko_catalog` WHERE `id`='".mysql_real_escape_string($_GET['sort'])."'";
	$ic = mysql_fetch_assoc(mysql_query($sql));
	
	$sql = "SELECT * FROM `mandarinko_catalog` WHERE `pid`='".$ic['pid']."' ORDER BY `sort` ASC";
	$r = mysql_query($sql);
	for($cat=array();$row=mysql_fetch_assoc($r);$cat[]=$row);
		
	foreach($cat as $el) {		
		if($_GET['order'] == 'up'){			
			//prev
			if ($el['id']==$ic['id']) {
				$to = $t;
				break;
			}
		} elseif($_GET['order'] == 'down'){
			//next
			if ($fn) {
				$to = $el; 
				break;
			}
			if($el['id']==$ic['id']) {			
				$fn = true;
				continue;
			}
		}
		$t = $el;
	}
		
	if($to){
		$sql = "UPDATE `mandarinko_catalog` SET `sort`='".$ic['sort']."' WHERE `id`='".$to['id']."'";
		mysql_query($sql);
		
		$sql = "UPDATE `mandarinko_catalog` SET `sort`='".$to['sort']."' WHERE `id`='".$ic['id']."'";
		mysql_query($sql);
	}
	
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}
?>
