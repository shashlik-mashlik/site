<?


function get_item_base($returnsql=true) {	
	//настройка структуры таблицы
	//name - имя поля в бд, type - SQL-тип в бд, input - соответсвующее html-поле
	//checkbox, radio, textarea, wysiwyg, text, password, divide
	//id, cid уже описаны
	$item_base = array(
		array('name' => 'name', 'type' => 'text', 'input' => 'text', 'field' => 'Название'),
		array('name' => 'desc', 'type' => 'text', 'input' => 'textarea', 'field' => 'Описание'),
		array('name' => 'price', 'type' => 'int', 'input' => 'text', 'field' => 'Стоимость'),
		array('name' => 'height', 'type' => 'int', 'input' => 'text', 'field' => 'Высота'),
		array('name' => 'weight', 'type' => 'int', 'input' => 'text', 'field' => 'Вес'),
		array('name' => 'material', 'type' => 'text', 'input' => 'text', 'field' => 'Материал опоры'),
		array('name' => 'color', 'type' => 'text', 'input' => 'text', 'field' => 'Цвет'),
		array('name' => 'lighter', 'type' => 'text', 'input' => 'text', 'field' => 'Светильник', 'hide' => 'hide'),
		array('name' => 'head', 'type' => 'text', 'input' => 'text', 'field' => 'Оголовок', 'hide' => 'hide'),
		array('name' => 'switch', 'type' => 'text', 'input' => 'text', 'field' => 'Переходник', 'hide' => 'hide'),
		array('name' => 'capitel', 'type' => 'text', 'input' => 'text', 'field' => 'Капитель', 'hide' => 'hide'),
		array('name' => 'tube', 'type' => 'text', 'input' => 'text', 'field' => 'Ствол', 'hide' => 'hide'),
		array('name' => 'base', 'type' => 'text', 'input' => 'text', 'field' => 'База', 'hide' => 'hide'),
		array('name' => 'tumb', 'type' => 'text', 'input' => 'text', 'field' => 'Тумба', 'hide' => 'hide')		
	);
	
	if($returnsql) {
		$sql = "CREATE TABLE IF NOT EXISTS `mandarinko_catalog_item` (
			`id` INT(11) NOT NULL AUTO_INCREMENT, 
			`cid` INT(11) NOT NULL, ";	
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