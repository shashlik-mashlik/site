<?
function get_base($returnsql=true) {
	//настройка структуры таблицы
	//name - имя поля в бд, type - SQL-тип в бд, input - соответсвующее html-поле
	//checkbox, radio, textarea, wysiwyg, text, password, divide
	//id, cid уже описаны
	//necessarily - обязательно или нет. Если стоит, то любое значение отличное от 0 - обязательно
	$item_base = array(
		array('name' => 'email','type' => 'text', 'input' => 'text', 'field' => 'E-mail', 'necessarily'=>'y'),
		array('name' => 'pwd',  'type' => 'text', 'input' => 'password', 'field' => 'Пароль', 'necessarily'=>'y'),
		array('name' => 'born', 'type' => 'text', 'input' => 'text', 'field' => 'Дата рождения'),
		array('name' => 'fio',  'type' => 'text', 'input' => 'text', 'field' => 'ФИО'),
		array('name' => 'addr_index','type' => 'text', 'input' => 'text', 'field' => 'Почтовый индекс'),
		array('name' => 'addr_city', 'type' => 'text', 'input' => 'text', 'field' => 'Город'),
		array('name' => 'addr_st',   'type' => 'text', 'input' => 'text', 'field' => 'Улица и дом'),
		array('name' => 'addr_flat', 'type' => 'text', 'input' => 'text', 'field' => 'Квартира'),
		array('name' => 'phone', 'type' => 'text', 'input' => 'text', 'field' => 'Мобильный телефон')
	);

	if($returnsql) {
		$sql = "DROP TABLE `mandarinko_users`;
				CREATE TABLE IF NOT EXISTS `mandarinko_users` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			";
			foreach($item_base as $el) {
				$sql .= '`'.$el['name'].'` '.$el['type']." NOT NULL, ";
			}
		$sql .= "PRIMARY KEY (`id`)) ENGINE = MyISAM;";
		$sql .="; INSERT INTO `mandarinko_users` SET `id` = 1";
		return $sql;
	} else {
		return $item_base;
	}
}
?>