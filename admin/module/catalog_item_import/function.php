<?

	function print_item_bd_id($print_item_bd_equal_value_bd_id) {
		$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `id` = '".mysql_real_escape_string($print_item_bd_equal_value_bd_id)."' ORDER BY `id`";
		$r = mysql_query($sql) or die('DB ERROR: CAN\'T EXTRACT');
		for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
		foreach($data as $el) {
			echo "<tr><td>ITEM_DB</td></tr>";
			echo "<tr>";
			echo "<td style='border: solid 1px red'>".$el['id']."</td>";
			echo "<td style='border: solid 1px red'>".$el['articul']."</td>";			
			echo "<td style='border: solid 1px red'>".$el['name']."</td>";
			echo "<td style='border: solid 1px red'>".$el['desc']."</td>";
			echo "<td style='border: solid 1px red'>".$el['price']."руб.</td>";
			echo "</tr>";
//			echo "<tr>";
//			echo "<td style='border: solid 1px green'>Нижний регистр и убраны все спецсимволы</td>";
//			echo "<td style='border: solid 1px green'>".del_spac_char($el['articul'])."</td>";
//			echo "</tr>";
		}						
	}

	
	function update_item_bd_id($update_item_bd_equal_value_bd_id, $new_price) {
		$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `id` = '".mysql_real_escape_string($update_item_bd_equal_value_bd_id)."' ORDER BY `id`";
		$r = mysql_query($sql) or die('DB ERROR: CAN\'T EXTRACT');
		for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
		foreach($data as $el) {		
			echo "<tr><td>ITEM_DB</td></tr>";
			echo "<tr>";
			echo "<td style='border: solid 1px red'>".$el['id']."</td>";
			echo "<td style='border: solid 1px red'>".$el['articul']."</td>";			
			echo "<td style='border: solid 1px red'>".$el['name']."</td>";
			echo "<td style='border: solid 1px red'>".$el['desc']."</td>";
			echo "<td style='border: solid 1px red'>".$el['price']."руб.</td>";
			echo "</tr>";
		}		
	//	`old_price`    = '".mysql_real_escape_string($el['price'])."',	
		$sql = "UPDATE `mandarinko_catalog_item` SET
			`price`    = '".mysql_real_escape_string($new_price)."'
			WHERE `id`= ".mysql_real_escape_string($update_item_bd_equal_value_bd_id);
			mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE main_menu');		
	}
	
	
	function equal($equal_value_exel_articul, $equal_value_bd_articul) {
		if (($equal_value_exel_articul == $equal_value_bd_articul) || 
		(del_spac_char($equal_value_exel_articul) == del_spac_char($equal_value_bd_articul))) 		{$equal_check = 1;} else //ecли 100% вошло

	//	if (equal_stat($equal_value_exel_articul, $equal_value_bd_articul) != 0) 					{$equal_check = 1;} else 
		{$equal_check = 0;}
		return $equal_check;
	}

	
	function equal_stat($equal_stat_value_exel_articul, $equal_stat_value_bd_articul) { //над этой функцией надо полумать еще....
		$equal_stat_arr_exel_articul 	= 	separate_articul('gfd123');
	//	$equal_stat_arr_bd_articul 		= 	separate_articul($equal_value_bd_articul);
		
/*		$separate_articel_arr_exel_articul_count = count($separate_articul_arr_exel_articul);
		$separate_articel_arr_bd_articul_count = count($separate_articul_arr_bd_articul);
		
		if (count($separate_articul_arr_exel_articul) > count($separate_articul_arr_bd_articul)) {
			$separate_articul_arr = $separate_articul_arr_bd_articul;
		} else {
			$separate_articul_arr = $separate_articul_arr_exel_articul;
		}
		$separate_articel_arr_counter = 0;
		$separate_articel_arr_stat = 0;
		for ($i=0; $i < count($separate_articul_arr); $i++) {
			for ($j=0; $j < count($separate_articul_arr[$i]); $j++) {
				$separate_articul_arr_counter++;
				if ($separate_articul_arr_exel_articul[$i][$j] == $separate_articul_arr_bd_articul[$i][$j]) {
					$separate_articul_arr_stat++;
				}			
			}		
		}*/
		//return $separate_articel_arr_stat / $separate_articel_arr_counter * 100;
		//return $equal_stat_arr_exel_articul[0][0];
		return 0;
	}
	

	function separate_articul($separate_articul_value) {
		$separate_count=0;
		for ($i=0; $i < strlen($separate_articul_value)-1; $i++) {
			if ((check_char($separate_articul_value[$i]) != check_char($separate_articul_value[$i+1])) && 
			((check_char($separate_articul_value[$i]) != 2) || 
			(check_char($separate_articul_value[$i+1]) != 1))) { //исключен момент 'fF'				
				if ((check_char($separate_articul_value[$i+1]) != 1) &&
					(check_char($separate_articul_value[$i+1]) != 2) &&
					(check_char($separate_articul_value[$i+1]) != 3)) {
					$separate_articul_value_arr[$separate_count] = explode_articul($separate_articul_value, $separate_articul_value[$i+1]);
				} else {
					$separate_articul_value_arr[$separate_count] = explode_articul($separate_articul_value, $separate_articul_value[$i].$separate_articul_value[$i+1]);
				}
				$separate_count++;
			}		
		}
		return $separate_articul_value_arr; //получаем массив массивов, рахделенных разделителем 
	}

	
	function explode_articul($explode_articul_value, $explode_articul_char) {
		$explode_articul_value_arr = explode($explode_articul_char, $explode_articul_value);
	//	$explode_articul_value_arr_count = count($explode_articul_value_arr);		
		switch (strlen($explode_articul_char)) {
			case 1: {
				for ($i=0; $i < count($explode_articul_value_arr)-1; $i++) {
					$explode_articul_value_arr[$i] .= '|';					
				}
				break;
			}
			case 2: {
				for ($i=0; $i < count($explode_articul_value_arr)-1; $i++) {
					$explode_articul_value_arr[$i] .= $explode_articul_char[0].'|';
					$explode_articul_value_arr[$i+1] = $explode_articul_char[1].$explode_articul_value_arr[$i+1];					
				}
				break;
			}
		}
		return $explode_articul_value_arr; //получаем массив, рахделенный разделителем 
	}
	
	
	function check_char($check_char_value) {		
		if (((ord($check_char_value) >= 65)) && ((ord($check_char_value)) <= 90)) 	{$check_char_value = 1;}else	// A..Z
		if (((ord($check_char_value) >= 97)) && ((ord($check_char_value)) <= 122)) 	{$check_char_value = 2;}else	// a..z
		if (((ord($check_char_value) >= 48)) && ((ord($check_char_value)) <= 57)) 	{$check_char_value = 3;}else	// 0..9
		if (ord($check_char_value) == 32) 	{$check_char_value = 4;}else 												// backspase
		if (ord($check_char_value) == 35) 	{$check_char_value = 5;}else												// #
		if (ord($check_char_value) == 42) 	{$check_char_value = 6;}else												// *
		if (ord($check_char_value) == 43) 	{$check_char_value = 7;}else												// +
		if (ord($check_char_value) == 44) 	{$check_char_value = 8;}else												// ,
		if (ord($check_char_value) == 45) 	{$check_char_value = 9;}else												// -
		if (ord($check_char_value) == 46) 	{$check_char_value = 10;}else												// .
		if (ord($check_char_value) == 47) 	{$check_char_value = 11;}else												// /	
											{$check_char_value=0;}
		return $check_char_value;
	}
	
	
	function del_spac_char($del_spac_char_value) {
		$del_spac_char_value = strtolower($del_spac_char_value);
		$del_spac_char_value = str_replace(" ","",$del_spac_char_value);
		$del_spac_char_value = str_replace("+","",$del_spac_char_value);
		$del_spac_char_value = str_replace("-","",$del_spac_char_value);
		$del_spac_char_value = str_replace("*","",$del_spac_char_value);
		$del_spac_char_value = str_replace("/","",$del_spac_char_value);
		$del_spac_char_value = str_replace("=","",$del_spac_char_value);
		$del_spac_char_value = str_replace("#","",$del_spac_char_value);
		$del_spac_char_value = str_replace("$","",$del_spac_char_value);
		$del_spac_char_value = str_replace(".","",$del_spac_char_value);
		$del_spac_char_value = str_replace(",","",$del_spac_char_value);
		return $del_spac_char_value;
	}
						
							
?>

