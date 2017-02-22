









<? 
//if(is_numeric($_GET['editp'])) 
{ //================================== $_GET['editp']
?>
<?
	include('function.php');

	$file_name = $_GET['title'];

		/** Include path **/
		//set_include_path(get_include_path() . PATH_SEPARATOR . './phpexel/Classes/');
	//	set_include_path($_SERVER['DOCUMENT_ROOT'].'/phpexel/Classes/');
	//	include 'PHPExcel/IOFactory.php';
	include 'phpexel/Classes/PHPExcel/IOFactory.php';
	// Открываем файл
	//	$xls = PHPExcel_IOFactory::load($_SERVER['DOCUMENT_ROOT'].'/upload/xls/'.$file_name);
		// Устанавливаем индекс активного листа
	//	$xls->setActiveSheetIndex(0);
		// Получаем активный лист
	//	$sheet = $xls->getActiveSheet();
		
		
		echo "dhgfhgf";				

}	//================================== $_GET['editp']
?> 