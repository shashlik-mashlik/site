<?
//Banners
$sql = "SELECT `id`,`position`,`url`,`alt` FROM `mandarinko_banner`";
$r = mysql_query($sql);
for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
foreach($data as $el)$BANNER[$el['position']] = '<a href="'.$el['url'].'"><img src="/upload/banner/'.$el['id'].'.jpg" alt="'.$el['alt'].'" /></a>';
?>