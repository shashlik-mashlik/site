
<?
			
$query = mysql_query("SELECT * FROM `mandarinko_catalog` GROUP BY id");

$menu = array();
$menu_index = array();

while($row = mysql_fetch_assoc($query)){
	
  if($row['pid'] == 0) {
    $menu[] = $row;
    $menu[sizeof($menu)-1]['child'] = array();
    $menu_index[$row['id']] = &$menu[sizeof($menu)-1];
  } else {
	
		$menu_index[$row['pid']]['child'][] = $row;
		$menu_index[$row['id']] = &$menu_index[$row['pid']]['child'][sizeof($menu_index[$row['pid']]['child'])-1];
  }
		
}

//print_r($menu);

function view_cat ($dataset) {

	foreach ($dataset as $menu) {
	
		echo '<li><span><a href="/market/'.$menu["c_url"].'">'.$menu["name"].'</a></span>';
	 
		if($menu['child']) {
			echo '<ul>';
				view_cat($menu['child']);
			echo '</ul>';
		}
		echo '</li>';
	 
	}

}

?>

<ul id="sidebar-menu" class="sample-menu">
<!--    
			  <li><a href="#">What's new?</a>
			    <ul class="active">
			      <li><a href="#">Weekly specials</a></li>
			      <li><a href="#">Last night's pics!</a></li>
			      <li><a href="#">Users' comments</a>
					<ul>
					  <li><a href="#">Premium Celebrities</a></li>
					  <li><a href="#">24-hour Surveillance</a></li>
					</ul>				  				  
				  </li>
			    </ul>
			  </li>
			  <li><a href="#">Member extras</a>
			    <ul>
			      <li><a href="#">Premium Celebrities</a></li>
			      <li><a href="#">24-hour Surveillance</a></li>
			    </ul>
			  </li>
-->
	
	<?php view_cat($menu);?>
	
</ul><!-- Конец списка -->


