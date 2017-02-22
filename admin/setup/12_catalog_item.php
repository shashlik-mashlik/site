<?


function get_item_base($returnsql=true) {	
	//настройка структуры таблицы
	//name - имя поля в бд, type - SQL-тип в бд, input - соответсвующее html-поле
	//checkbox, radio, textarea, wysiwyg, text, password, divide, outside
	//id, cid уже описаны
	$item_base = array(
		array('name' => 'c_url', 'type' => 'text', 'input' => 'text', 'field' => 'url', 'hide' => 'hide'),	
		array('name' => 'name', 'type' => 'text', 'input' => 'text', 'field' => 'Название'),
		array('name' => 'articul', 'type' => 'text', 'input' => 'text', 'field' => 'Артикул'),
		array('name' => 'price', 'type' => 'float', 'input' => 'text', 'field' => 'Цена'),
		array('name' => 'old_price', 'type' => 'text', 'input' => 'text', 'field' => 'Прошлая цена', 'hide' => 'hide'),
	/*	array('name' => 'brand', 'type' => 'text', 'input' => 'text', 'field' => 'Производитель', 'hide' => 'hide'),	*/	
	/*	array('name' => 'reserve', 'type' => 'text', 'input' => 'checkbox', 'field' => 'В наличии'),*/
	/*	array('name' => 'size', 'type' => 'text', 'input' => 'divide', 'field' => 'Размер (через запятую)', 'hide' => 'hide'),*/
	/*	array('name' => 'weight', 'type' => 'int', 'input' => 'text', 'field' => 'Вес (граммы)'),*/
		array('name' => 'color', 'type' => 'text', 'input' => 'outside', 'field' => 'Цвет', 'hide' => 'hide'),
		/*array('name' => 'links', 'type' => 'text', 'input' => 'outside', 'field' => 'Связанные позиции', 'hide' => 'hide'),
		array('name' => 'tablesizes', 'type' => 'text', 'input' => 'wysiwyg', 'field' => 'Таблица размеров', 'hide' => 'hide'),*/
		array('name' => 'desc', 'type' => 'text', 'input' => 'textarea', 'field' => 'Описание', 'hide' => 'hide'),
		array('name' => 'top', 'type' => 'text', 'input' => 'checkbox', 'field' => 'Топ-товар'),
		array('name' => 'new', 'type' => 'text', 'input' => 'checkbox', 'field' => 'Новый товар'),
	/*	array('name' => 'admin_comments', 'type' => 'text', 'input' => 'textarea', 'field' => 'Примечание (недоступно на сайте)')	*/	
	);
	
	if($returnsql) {
		$sql = "CREATE TABLE IF NOT EXISTS `mandarinko_catalog_item` (
			`id` INT(11) NOT NULL AUTO_INCREMENT, 
			`cid` INT(11) NOT NULL,
			`url` TEXT NOT NULL, ";	
		foreach($item_base as $el) {
			$sql .= '`'.$el['name'].'` '.$el['type']." NOT NULL, ";
		}
		$sql .= "PRIMARY KEY (`id`)) ENGINE = MyISAM;";
		return $sql;
	} else {
		return $item_base;
	}
}
?>