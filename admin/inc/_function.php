<?php

/*
Функция ресайза изображений
входные параметры:
$img-полный путь к изображению
$W требуемая ширина. Если ограничения нету, то требуется ставить 0
$H требуемая высота. Если ограничения нету, то требуется ставить 0
$Key в случае задания и ширины и высоты требуется дать указание как выполнить выравнивание(обрезку) :
	0 выровнить по верхнему левому углу(стоит по умолчанию)
	1 выровнить по центру
	2 выровнить по нижнему правому углу
*/
function SetImgSize($img,$W=0,$H=0,$Key=1){
	//echo("$img , $W ,$H , $Key"); 
	$rasshr = substr(strrchr($img,'.'),1);
	//организация работы с форматами GIF JPEG PNG
	switch($rasshr){
		default: case "gif": $srcImage = @ImageCreateFromGIF( $img ); break;
		case "jpg": $srcImage = @ImageCreateFromJPEG( $img ); break;
		case "png": $srcImage = @ImageCreateFromPNG( $img ); break;
	}
	//определяем изначальную длинну и высоту
	$srcWidth = @ImageSX( $srcImage );
	$srcHeight = @ImageSY( $srcImage );



	//ресайз по заданной ширине
	if (($W != 0)&&($H == 0)&&($W < $srcWidth)) {$res=ResNoDel($srcWidth, $srcHeight,$W,0);}

	//ресайз по заданной высоте
	if (($W == 0)&&($H != 0)&&($H < $srcHeight)) {$res=ResNoDel($srcWidth, $srcHeight,0,$H);}

	//ресайз с обрезкой
	if (($W != 0)&&($H != 0)&&(($H < $srcHeight)||($W < $srcWidth))) {$res=ResDel($srcWidth, $srcHeight, min($W, $srcWidth), min($H, $srcHeight),$Key);}

	//создаем картинку
	if ($res) {
		$endImage = @ImageCreateTrueColor($res[2], $res[3]);
		ImageCopyResampled($endImage, $srcImage, 0, 0, $res[0], $res[1], $res[2], $res[3], $res[4], $res[5]);
		unlink($img);
		switch($rasshr){
			case "gif": ImageGif( $endImage, $img ); break;
			default: case "jpg": imagejpeg( $endImage, $img ); break;
			case "png": imagepng( $endImage, $img ); break;
			}
		ImageDestroy($endImage);
    }
}








//ресайз без обрезки
function ResNoDel($srcWidth, $srcHeight,$W,$H){
	//ресайз по заданной ширине
	if (($W != 0)&&($H == 0)) {
		$endHeight = ($W*$srcHeight)/$srcWidth;
		$endWidth = $W;
		}

	//ресайз по заданной высоте
	if (($W == 0)&&($H != 0)) {
		$endHeight = $H;
		$endWidth = ($H*$srcWidth)/$srcHeight;
		}
//возвращае последние 6 значений
	return array (0, 0, $endWidth, $endHeight, $srcWidth, $srcHeight);
	}


function ResDel($srcWidth, $srcHeight, $W,$H,$Key){
	//ресайз с обрезкой
	if (($W != 0)&&($H != 0)) {
		//обрезка вертикали
		if (($W/$H)>=($srcWidth/$srcHeight)){
			//обрезка низа
			if ($Key==0) {
				$srcX=0;
				$srcY=0;
				$srcHeight=($H/$W)*$srcWidth;
				}
			//обрезка низа и верха
			if ($Key==1) {
				$srcX=0;
				$srcY=($srcHeight-$H/$W*$srcWidth)/2;
				$srcHeight=($H/$W)*$srcWidth;
				}
			//обрезка верха
			if ($Key==2) {
				$srcX=0;
				$srcY=$srcHeight-$H/$W*$srcWidth;;
				$srcHeight=($H/$W)*$srcWidth;
				}
			}
		//обрезка горизонтали
		if (($W/$H)<($srcWidth/$srcHeight)){
			//обрезка справа
			if ($Key==0) {
				$srcX=0;
				$srcY=0;
				$srcWidth=($W/$H)*$srcHeight;
				}
			//обрезка справа и слева
			if ($Key==1) {
				$srcX=($srcWidth-$W/$H*$srcHeight)/2;
				$srcY=0;
				$srcWidth=($W/$H)*$srcHeight;
				}
			//обрезка слева
			if ($Key==2) {
				$srcX=$srcWidth-$W/$H*$srcHeight;
				$srcY=0;
				$srcWidth=($W/$H)*$srcHeight;
				}
			}

		}
	return array($srcX, $srcY, $W, $H, $srcWidth, $srcHeight);
}

?>