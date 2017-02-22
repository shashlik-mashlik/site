<?php
include ('_config.php');

$CONTENT['title'] = "Опросы";	
define('RECSPERPAGE', 5); // количество записей на одной странице

if($_POST['choose']) {
	setcookie ("Visited".$_GET['poll'], 1,time()+3600*24*30);	
	//Сначала почистим базу от "старых" IP
	$sql = "DELETE FROM `mandarinko_poll_ip` WHERE `time` < ".(time() - 3600*24*3);
	mysql_query($sql) or die($sql);
	//а теперь проверим
	$sql = "SELECT COUNT(*) FROM `mandarinko_poll_ip` WHERE `hc_id` = '".$_GET['poll']."' AND `ip` = '".$_SERVER['REMOTE_ADDR']."'";
	$r = mysql_fetch_array(mysql_query($sql));
	if ($r[0] >= 1) {
		header('Location: /'.$URL[1].'?poll='.$_GET['poll'].'&result=1&timeout=1');
		exit;
	}

	$sql = "UPDATE `mandarinko_poll_answer` SET `counter` = (`counter` + 1)
			WHERE `id`= '".mysql_real_escape_string($_POST['group'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE ANSWER_POLL');
	$sql = "UPDATE `mandarinko_poll_ask` SET `ttl_numb` = (`ttl_numb` + 1)
			WHERE `id`= '".mysql_real_escape_string($_GET['poll'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE ASK_POLL');
	$sql =  "INSERT INTO `mandarinko_poll_ip` SET
			`ip` = '".$_SERVER['REMOTE_ADDR']."',
			`time` = '".time()."',
			`hc_id` = '".$_GET['poll']."'";
	mysql_query($sql);
	header('Location: /'.$URL[1].'?poll='.$_GET['poll'].'&result=1');
	exit;
}

if($_GET['poll'] == ''){
?>
	<h1>Опросы:</h1>
<?
	$sql = "SELECT * FROM `mandarinko_poll_ask`";
	$r = mysql_query($sql);
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
	for ($i = 0; $i < sizeof($data); $i++) {		
?>
		<p><a href="/<?=$URL[1];?>?poll=<?=$data[$i]['id']?>"><?=$data[$i]['title'];?></a> ( <a href="/<?=$URL[1];?>?poll=<?=$data[$i]['id']?>&result=1">Результаты</a>: <?=$data[$i]['ttl_numb'];?> ответов )</p>
<?	}
}
else{
	$sql = "SELECT * FROM `mandarinko_poll_ask` WHERE `id`= '".mysql_real_escape_string($_GET['poll'])."'";
	$main = mysql_query($sql);
	$main = mysql_fetch_assoc($r);
	if($_GET['result'] == ''){
		if($_COOKIE['Visited'.$_GET['poll']])
			header('Location: /'.$URL[1].'?poll='.$_GET['poll'].'&result=1');
		?>
		<h1><?=$main['title'];?></h1>
		<form action="" method="post">
		<?
		$sql = "SELECT * FROM `mandarinko_poll_answer` WHERE `hc_id` = '".mysql_real_escape_string($_GET['poll'])."'";
		$r = mysql_query($sql);
		for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
		?><p><input type="radio" name="group" value="<?=$data[0]['id']?>" checked><?=$data[0]['name'];?></p><?
		for ($i = 1; $i < sizeof($data); $i++) {?>
			<p><input type="radio" name="group" value="<?=$data[$i]['id']?>"><?=$data[$i]['name'];?></p>
		<?}?>
			<input type="submit" name="choose" value="Выбрать">
		</form>
		<p><a href="/<?=$URL[1];?>">Другие опросы</a></p>
		<p><a href="/<?=$URL[1];?>?poll=<?=$_GET['poll']?>&result=1">Результаты</a></p>
		<?
	}
	else{
		if($_GET['timeout']) {
			?><p class="error">Вы уже голосовали. Повторное голосование возможно через 3 дня.</p><?
		}
		?>
		<p><a href="/<?=$URL[1];?>">Другие опросы</a></p>
		<h1>Результаты опроса: <?=$main['title'];?></h1>
		<?
		$sql = "SELECT * FROM `mandarinko_poll_answer` WHERE `hc_id` = '".mysql_real_escape_string($_GET['poll'])."'";
		$r = mysql_query($sql);
		for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
		for ($i = 0; $i < sizeof($data); $i++) {?>
			<p><?=$data[$i]['name'];?>: <?=$data[$i]['counter'];?></p>
		<?}?>
	<?

		/**
		 * Multibyte capable wordwrap
		 *
		 * @param string $str
		 * @param int $width
		 * @param string $break
		 * @return string
		 */
		function mb_wordwrap($str, $width=74, $break="\r\n")
		{
			// Return short or empty strings untouched
			if(empty($str) || mb_strlen($str, 'UTF-8') <= $width)
				return $str;

			$br_width  = mb_strlen($break, 'UTF-8');
			$str_width = mb_strlen($str, 'UTF-8');
			$return = '';
			$last_space = false;

			for($i=0, $count=0; $i < $str_width; $i++, $count++)
			{
				// If we're at a break
				if (mb_substr($str, $i, $br_width, 'UTF-8') == $break)
				{
					$count = 0;
					$return .= mb_substr($str, $i, $br_width, 'UTF-8');
					$i += $br_width - 1;
					continue;
				}

				// Keep a track of the most recent possible break point
				if(mb_substr($str, $i, 1, 'UTF-8') == " ")
				{
					$last_space = $i;
				}

				// It's time to wrap
				if ($count > $width)
				{
					// There are no spaces to break on!  Going to truncate :(
					if(!$last_space)
					{
						$return .= $break;
						$count = 0;
					}
					else
					{
						// Work out how far back the last space was
						$drop = $i - $last_space;

						// Cutting zero chars results in an empty string, so don't do that
						if($drop > 0)
						{
							$return = mb_substr($return, 0, -$drop);
						}

						// Add a break
						$return .= $break;

						// Update pointers
						$i = $last_space + ($br_width - 1);
						$last_space = false;
						$count = 0;
					}
				}

				// Add character from the input string to the output
				$return .= mb_substr($str, $i, 1, 'UTF-8');
			}
			return $return;
		}
		/**
		* Чистка строки
		*/
		function strings_clear($string)
		{
			$string = trim($string);
			return htmlspecialchars($string, ENT_QUOTES);
		}

		/**
		* Обрезание строки
		*/
		function strings_stripstring($text, $wrap, $length)
		{
			$text = preg_replace('%(\S{'.$wrap.'})%', '\\1', $text);
			return substr($text, 0, $length);
		}

		// вывод списка страниц
		function gb_showpages($current)
		{
			$rows = mysql_query("SELECT COUNT(`id`) FROM mandarinko_poll_comments WHERE `moder` = 1 and `hc_id` = '".$_GET['poll']."'" ) OR die('DB ERROR: CAN\'T Select info');
			$rows = mysql_fetch_array($rows);	
			if($rows[0])
			{
				$pages = ceil($rows[0] / RECSPERPAGE);
				// печатаем ссылки на страницы (номер текущей страницы не является ссылкой)
				echo '<div class=pg_nmb>';
				for($i = 1; $i <= $pages; $i++)
				{
					if($i != $current)
						echo ' | <a href=/polls?poll='.$_GET['poll'].'&result=1&page='.$i.'>'.$i.'</a>';
					else
						echo ' | '.$i;
				}
				echo ' |';
				// если это не полследняя страница печатаем ссылку "Дальше"
				if($current < $pages)
					echo ' <a href= /polls?poll='.$_GET['poll'].'&result=1&page='.($current + 1).'>Дальше &gt;&gt;</a>';
				echo '</div>';
			}
		}

		// получаем данные формы, если форма была отправлена
		if (!empty($_POST['sb']))
		{
			$nick = $_POST['nick'];
			$email = $_POST['email'];
			$msg = str_replace("\r\n","<br/>",$_POST['msg']);
		}
		else
		{
			$nick = $email = $msg = '';
		}
		// если в GET-запросе не указан номер страницы, выводим первую
		if(!$_GET['page']) $_GET['page'] = 1;
		// если нужно добавить запись, добавляем
		if($_GET['add'])
		{
			$error = '';
			
			//обработка ошибок
			if(empty($nick)){ ?>
				<SCRIPT type="text/javascript">alert('Имя это обязательное поле!');</SCRIPT>
			<?
				$error = '1';
			}
			if(empty($msg)){ ?>
				<SCRIPT type="text/javascript">alert('Сообщение это обязательное поле!');</SCRIPT>
			<?
				$error = '2';
			}
			if(!empty($email) && !preg_match('%[-\.\w]+@[-\w]+(?:\.[-\w]+)+%', $email)){ ?>
				<SCRIPT type="text/javascript">alert('Это не email!');</SCRIPT>
			<?
				$error = '3';
			}
			// проверяем правильность заполнения полей
			if(!$error)
			{
				// чистим данные
				$nick = strings_clear($nick);
				$msg = strings_clear($msg);
				$nick = strings_stripstring($nick, 100, 100);
				$nick = mysql_real_escape_string($nick);
				$email = strings_stripstring($email, 100, 100);
				$email = mysql_real_escape_string($email);
				$msg = strings_stripstring($msg, 1000, 2000);
				$msg = mysql_real_escape_string($msg);
				// запрос на добавление записи в базу данных
				$time = time();
				$sql = "INSERT INTO `mandarinko_poll_comments` SET 
					   `hc_id`= '".mysql_real_escape_string($_GET['poll'])."', 
					   `nick` = '".$nick."', 
					   `email`= '".$email."',
					   `time` = '".$time."',
					   `msg`  = '".$msg."'";
				mysql_query($sql) OR die('DB ERROR: CAN\'T Insert info');
				$nick = $email = $msg = '';
				?><h1>Ваше сообщение отослано на сервер и будет добавлено после модерации</h1><?
			}
		}
		echo '<div id="messages">';
		gb_showpages($_GET['page']);
		// положение первой записи страницы
		$begin = ($_GET['page'] - 1) * RECSPERPAGE;
		$result = mysql_query('SELECT * FROM mandarinko_poll_comments WHERE `moder` = 1 and `hc_id` = '.$_GET['poll'].' ORDER BY time DESC LIMIT '.$begin.', '.RECSPERPAGE);
		// цикл по всем выбранным записям
		while($row = mysql_fetch_array($result))
		{
				$out = '<div class=element><div class=title><b>'.stripslashes($row['nick']).'</b> ';
				if($row['email'])
				{
					$out .= '( ';
					$out .= ' <a href=mailto:'.stripslashes($row['email']).'>email</a>';
					$out .= ' )';
				}
				$row['time'] = date('d.m.Y H:i',$row['time']);
				$out .= ' пишет '.$row['time'].':</div><div class=msg>'.htmlspecialchars(mb_wordwrap(html_entity_decode(stripslashes($row['msg']), ENT_QUOTES), 120, "\n")).'</div></div>';
			echo $out;
		}
		// уничтожаем результат
		mysql_free_result($result);

		gb_showpages($_GET['page']);
		echo '</div>';
		
		//форма добавления сообщения
		?>
		<div id="add_msg">
			<h2>Добавить новое сообщение</h2>
			<table cellspacing="2" cellpadding="2" border="0">
				<form action="?poll=<?=$_GET['poll']?>&result=1&add=1" method=post>
					<tr>
						<td>Имя<font color=#880000>*</font>:</td>
						<td><input type=text name="nick" size=30 maxlength=100 value="<?=$nick?>"></td>
					</tr>	
					<tr>
						<td>Email:</td>
						<td><input type=text name="email" size=30 maxlength=100 value="<?=$email?>">
					</tr>
					<tr>
						<td>Сообщение<font color=#880000>*</font>:</td>
						<td><textarea cols=40 rows=5 name="msg"><?=$msg?></textarea></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><small><font color=#880000>*</font>&nbsp;&#151; Обязательные поля</small></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input name="sb" type=submit value="Добавить сообщение"></td>
					</tr>
				</form>
			</table>
		</div>
	<?}
}?>