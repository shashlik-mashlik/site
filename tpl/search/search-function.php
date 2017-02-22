<?
// search-function.php

	function check_char($value) {		
		if (((ord($value) >= 65)) && ((ord($value)) <= 90)) 	{$value = 1;}else	// A..Z
		if (((ord($value) >= 97)) && ((ord($value)) <= 122)) 	{$value = 2;}else	// a..z
		if (((ord($value) >= 48)) && ((ord($value)) <= 57)) 	{$value = 3;}else	// 0..9
		if (ord($value) == 32) 	{$value = 4;}else 									// backspase
		if (ord($value) == 35) 	{$value = 5;}else									// #
		if (ord($value) == 42) 	{$value = 6;}else									// *
		if (ord($value) == 43) 	{$value = 7;}else									// +
		if (ord($value) == 44) 	{$value = 8;}else									// ,
		if (ord($value) == 45) 	{$value = 9;}else									// -
		if (ord($value) == 46) 	{$value = 10;}else									// .
		if (ord($value) == 47) 	{$value = 11;}else									// /
		if (ord($value) == 13) 	{$value = 12;}else 									// enter		
								{$value=0;}											// good
		return $value;
	}

	//echo check_char('0');
	
	function normalize_or_not_normalize($value) {
		$normalize = "normalize";
		$value_len = strlen($value);
			switch (check_char($value[$value_len-1])) { //если в конце части предложения A..Z или a..z или 0..9, то эту часть не режим
				case 1: $normalize = "not_normalize";
				case 2: $normalize = "not_normalize";
				case 3: $normalize = "not_normalize";
			}	
		return $normalize;
	}
	
	//echo normalize_or_not_normalize('fdsfds');
	//echo normalize_or_not_normalize('432');
	//echo normalize_or_not_normalize('авыавы');

	function normalize_ending($value) {
		if (strlen($value) > 3) {
			$value_len = strlen($value);
			$normalize = strlen($value) / 100 * 20;
			$value = substr($value, 0, $value_len - $normalize);
		}
		$value = rtrim($value);
		return $value;
	}

	//echo normalize_ending('1234567890');
	//echo normalize_ending('рпавол');

	function creat_array_form_separate_backspase($value) { //функция создания массива из строки по пробелам
		$value = explode(' ', $value);
		return $value;
	}

	//$array = creat_array_form_separate_backspase("dsa павророл 543fds павлд543");
	//print_array($array);
	
	function creat_array_from_separate_transition($value) { //функция создания массива из строки по переходам и по пробелам
		$value_len = strlen($value);
		$count = 0;
		$step_1 = 0;
		$step_2 = 0;
		for ($i = 0; $i < $value_len; $i++) {
			if ((check_char($value[$i]) != check_char($value[$i+1])) && 
			((check_char($value[$i]) != 1) || (check_char($value[$i+1]) != 2))) { //исключен момент 'fF'				
				$step_2 = $i+1;
				if (check_char($value[$i]) != 4) { //если элемент не является проблелом
				//	$new_array[] = rtrim(substr($value, $step_1, $step_2 - $step_1));
					$new_array[] = (substr($value, $step_1, $step_2 - $step_1));
				}				
				$step_1 = $step_2;
				$count++;
			}
		}
	//	echo print_array($new_array);
		return $new_array;			
	}
	
	//$array = creat_array_form_separate_transition("dsa павророл 543fds павлд543");
	//print_array($array);
	
	function print_array($value) { //функция выыода массива на экран
		$value_len = count($value);
		for ($i = 0; $i < $value_len; $i++) {
			echo "</br> el: " . $i . " + value: " . $value[$i] . " + len: " . mb_strlen($value[$i]) . "</br>";
		}	
	}	
	
	//out array
	//print_array($array);	

	
	function sort_array_and_rus_normalize_encing($value) { //функция перебора массива и режет все русское
		$value_len = count($value);
		for ($i = 0; $i < $value_len; $i++) {
			if (normalize_or_not_normalize($value[$i]) == 'normalize') {
				$value[$i] = rtrim(normalize_ending($value[$i]));
			}
		}
		return $value;
	}	
	
	//$array = sort_array_and_rus_normalize_encing($array);
	//print_array($array);

	
	//============================================== сравнивание мегамассива с данными из базы

	
	//echo stripos("g123456789 п", "п")." </br>"; //считает байты
	//echo strcasecmp("ппп", "пппп");
	//echo mb_stripos("g123456789 п", "п")." </br>";

	
	
	function points($value_1, $value_2) {
		
		
		
		$coin = 0;

		$array_1 = creat_array_from_separate_transition($value_1); // $ -> array_1;
	 	$array_2 = creat_array_from_separate_transition($value_2); // $ -> array_2;
		$array_1_len = count($array_1);
		$array_2_len = count($array_2);

		$array_1_rus_normalize_encing = sort_array_and_rus_normalize_encing($array_1); //нормализуем и режем русские слова
		$array_2_rus_normalize_encing = sort_array_and_rus_normalize_encing($array_2); //нормализуем и режем русские слова
		
		

		
	//	echo "</br>quest</br>";
	//	print_array($array_1_rus_normalize_encing)." </br>";
	//	echo "</br>DB_answer</br>";
	//	print_array($array_2_rus_normalize_encing)." </br>";
	
	//	if ($array_1_len != $array_2_len) {
			if ($array_1_len > $array_2_len) {	//если кейворд массив больше искомого массива, где $value_1 строка
				$coin = sort_array_from_word($value_1, $value_2);
				
			} else {							//если наоблорот, искомый массив больше кейворда, где $value_2 строка
				$coin = sort_array_from_word($value_2, $value_1);
			}

		
			
	//	}else {
			
	//	}
		
		return $coin;	
	}
	

	function sort_array_from_word($value_1, $value_2){ // if $array_1_len > $array_2_len, где $value_1 строка
		$coin = 0;

		$array_1 = creat_array_from_separate_transition($value_1); // $ -> array_1;
	 	$array_2 = creat_array_from_separate_transition($value_2); // $ -> array_2;
		$array_1_len = count($array_1);
		$array_2_len = count($array_2);
		$array_1_rus_normalize_encing = sort_array_and_rus_normalize_encing($array_1); //нормализуем и режем русские слова
		$array_2_rus_normalize_encing = sort_array_and_rus_normalize_encing($array_2); //нормализуем и режем русские слова
		
//		echo "</br>string_value</br>";
//		echo $value_1." </br>";
//		echo "</br>array_value</br>";
//		print_array($array_2_rus_normalize_encing)." </br>";

		$end = $array_2_len;
		for ($i = 0; $i < $end; $i++) {
			if (mb_stripos($value_1, $array_2[$i]) !== false){
				$coin ++;
				if (mb_stripos($value_1, $array_2[$i+1]) !== false){
					$coin ++;
				} else {$coin --;}				
				//утюг Polti 850
				//Паровой утюг Polti Forever 1500
				//Очистительная система HYLA					
				$inner = mb_stripos($value_1, $array_2_rus_normalize_encing[$i]); //Номер символа вхождения
				//$offset[] = $inner; //Номер символа вхождения записивается в массив номеров				
				$sub_array_1 = creat_array_from_separate_transition(mb_substr($value_1, $inner)); //Делаем массив от номера вхождения 
				$sub_array_1_rus_normalize_encing = sort_array_and_rus_normalize_encing($sub_array_1); //Нормализуем его
				$sub_value_1 = $sub_array_1[0]; //сравниваемый элемент массива
				$sub_value_1_rus_normalize_encing = $sub_array_1_rus_normalize_encing[0]; //сравниваемый нормализованный элемент массива
				if(mb_stripos($array_2[$i], $sub_value_1) !== false) {
					$coin ++; 
					//echo mb_stripos($array_2[$i], $sub_value_1);
				} else {$coin --;}				
			} else 
			if (mb_stripos($value_1, $array_2_rus_normalize_encing[$i]) !== false){ //сто пудова русское слово и оно нашлось, нужно понять подходит ли оно
				$coin ++;
				if (mb_stripos($value_1, $array_2_rus_normalize_encing[$i+1]) !== false){
					$coin ++;
				} else {$coin --;}			
				//утюг Polti 850
				//Паровой утюг Polti Forever 1500
				//Очистительная система HYLA	
				$inner = mb_stripos($value_1, $array_2_rus_normalize_encing[$i]); //Номер символа вхождения
				//$offset[] = $inner; //Номер символа вхождения записивается в массив номеров
				$sub_array_1 = creat_array_from_separate_transition(mb_substr($value_1, $inner)); //Делаем массив от номера вхождения 
				$sub_array_1_rus_normalize_encing = sort_array_and_rus_normalize_encing($sub_array_1); //Нормализуем его
				$sub_value_1 = $sub_array_1[0]; //сравниваемый элемент массива
				$sub_value_1_rus_normalize_encing = $sub_array_1_rus_normalize_encing[0]; //сравниваемый нормализованный элемент массива
				if(mb_stripos($array_2[$i], $sub_value_1) !== false) {
					$coin ++; 
					//echo mb_stripos($array_2[$i], $sub_value_1);
				} else {$coin --;}	
			} else {$coin --;}		
		}//for	
			
		

		//$coin = $coin / $array_1_len * 100 / 2;
		//$coin = $coin / $array_1_len * 100;
		//$coin = count($offset) / $array_1_len * 100;
		//echo $coin . " % найдено</br>";
		return $coin;
	}




	function print_item($id, $articul, $name, $desc, $price, $url, $c_url, $coin_chack){
	

										$exp = explode("/", $url);												
										$url = $exp[count($exp)-1];

	
		$q="SELECT * FROM `mandarinko_catalog_item` WHERE id='".$id."'";
		$product=mysql_fetch_assoc(mysql_query($q));
			?>								
										<tr class="active">   									
											<td class="active" style="width: 150px;">
												<a target="blank_" href="/market/<?=$url?>/<?=$c_url?>"><img style="float: left; margin: 10px;" src="/upload/catalog/<?=$id?>.jpg?" alt="<?=$name?>" title="<?=$name?>" class="img-thumbnail" width="150"/></a>
												<div style="margin: 20px;">
													<dl class="dl-vertical">
														</br>
														<dt>Артикул:</dt>	<dd style="display: block;"><?=$articul?> - <?=$id?></dd></br>
														<dt>Цена:</dt>		<dd style="display: block;"><?=$price?> руб.</dd></br>
														<!--<dt>Совпадение:</dt>		<dd style="display: block;"><?=round($coin_chack, 2)?></dd></br>-->
														
														
														<a href="/basket/?add_basket_item=<?php echo $id?>" type="submit" title="Добавить один лот"></br><span class="btn btn-success">Купить</span></a>
													</dl>
												</div>
											</td>											
											<td class="active" style="width: 600px;">
												<blockquote>
													<a target="blank_" href="/market/<?=$url?>/<?=$c_url?>"><p><?=$name?></p></a>
													<footer>Описание: <cite title="Source Title"><?=$desc?></cite></footer>
												</blockquote>
											</td>											
										</tr>
			<?

	}

?>

									 
