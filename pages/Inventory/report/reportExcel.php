<?php
$host = "localhost";
$userName = "root";
$password = "";
$database = "inventory";

// Create connection
$connect =  mysqli_connect($host, $userName, $password, $database);

// Check connection
if ($connect->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Kolkata');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();




//###################################################################
if (@$_GET['report'] === 'category' && $_GET['category'] === "-Select-") {
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Category Item List');
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:M1');
	$styleArray = array(
		'font'  => array(
			'color' => array('rgb' => '0,0,139'),
			'size'  => 20
		)
	);
	$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('A1:M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('F3', 'Sl No')
		->setCellValue('G3', 'Category ID')
		->setCellValue('H3', 'Category Name');

	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('F3')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('G3')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('H3')->getFont()->setBold(true);

	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(9);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);


	$rowcnt = 4;
	$i = 1;
	$sqlDisplayItemCategory = "SELECT `item_category_id`,`item_category_name` FROM `item_category`";
	if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
		while ($displayCat = $rawDate->fetch_assoc()) {
			$ItemCategoryId = $displayCat['item_category_id'];
			$ItemCategoryName = $displayCat['item_category_name'];

			$objPHPExcel->getActiveSheet()->setCellValue('F' . $rowcnt, $i);
			$objPHPExcel->getActiveSheet()->setCellValue('G' . $rowcnt, $ItemCategoryId);
			$objPHPExcel->getActiveSheet()->setCellValue('H' . $rowcnt, $ItemCategoryName);
			$rowcnt++;
			$i++;
		}
	}
	$rowcnt++;
	$rowcnt++;

	$objPHPExcel->getActiveSheet()->setCellValue('A' . $rowcnt, 'Developed By Pranav(Software trainee)');
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $rowcnt . ':M' . $rowcnt);
	$styleArray = array(
		'font'  => array(
			'color' => array('rgb' => '0,0,139'),
			'size'  => 8
		)
	);
	$objPHPExcel->getActiveSheet()->getStyle('A' . $rowcnt)->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('A' . $rowcnt . ':M' . $rowcnt)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$objPHPExcel->setActiveSheetIndex(0);

	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Category List.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
	header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
}





if (@$_GET['report'] === 'tax') {
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tax');
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:M1');
	$styleArray = array(
		'font'  => array(
			'color' => array('rgb' => '0,0,139'),
			'size'  => 20
		)
	);
	$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('A1:M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('E3', 'Sl No')
		->setCellValue('F3', 'Tax ID')
		->setCellValue('G3', 'Tax Code')
		->setCellValue('H3', 'Tax Percentage(%)');

	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('E3')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('F3')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('G3')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('H3')->getFont()->setBold(true);

	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);


	$rowcnt = 4;
	$i = 1;
	$sqlDisplayTax = "SELECT `tax_id`,`tax_code`,`tax_percentage` FROM `tax`";
	if ($rawDate = $connect->query($sqlDisplayTax)) {
		while ($displayTax = $rawDate->fetch_assoc()) {
			$taxId = $displayTax['tax_id'];
			$taxCode = $displayTax['tax_code'];
			$taxPercentage = $displayTax['tax_percentage'];

			$objPHPExcel->getActiveSheet()->setCellValue('E' . $rowcnt, $i);
			$objPHPExcel->getActiveSheet()->setCellValue('F' . $rowcnt, $taxId);
			$objPHPExcel->getActiveSheet()->setCellValue('G' . $rowcnt, $taxCode);
			$objPHPExcel->getActiveSheet()->setCellValue('H' . $rowcnt, $taxPercentage);
			$rowcnt++;
			$i++;
		}
	}
	$rowcnt++;
	$rowcnt++;

	$objPHPExcel->getActiveSheet()->setCellValue('A' . $rowcnt, 'Developed By Pranav(Software trainee)');
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $rowcnt . ':M' . $rowcnt);
	$styleArray = array(
		'font'  => array(
			'color' => array('rgb' => '0,0,139'),
			'size'  => 8
		)
	);
	$objPHPExcel->getActiveSheet()->getStyle('A' . $rowcnt)->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('A' . $rowcnt . ':M' . $rowcnt)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$objPHPExcel->setActiveSheetIndex(0);

	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Tax.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
	header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
}








if (@$_GET['report'] === 'item') {
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Item List');
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:M1');
	$styleArray = array(
		'font'  => array(
			'color' => array('rgb' => '0,0,139'),
			'size'  => 20
		)
	);
	$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('A1:M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);


	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('D3', 'Sl No')
		->setCellValue('E3', 'Category Name')
		->setCellValue('F3', 'Item ID')
		->setCellValue('G3', 'Item Name')
		->setCellValue('H3', 'Item Type')
		->setCellValue('I3', 'Item Tax');

	$objPHPExcel->getActiveSheet()->getStyle('D3')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('E3')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('F3')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('G3')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('H3')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('I3')->getFont()->setBold(true);

	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(9);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);


	$rowcnt = 4;
	$i = 1;
	$checkCate = '';
	$sqlDisplayItem = "SELECT item.`item_id`,item.`item_name`,itemCat.item_category_name,tax.tax_code,item.item_type FROM item AS item INNER JOIN item_category as itemCat ON item.item_category = itemCat.item_category_id INNER JOIN tax as tax on  item.item_tax =tax.tax_id ORDER BY `itemCat`.`item_category_name` ASC";
	if ($rawDate = $connect->query($sqlDisplayItem)) {
		while ($displayItem = $rawDate->fetch_assoc()) {
			$ItemId = $displayItem['item_id'];
			$ItemCat = $displayItem['item_category_name'];
			$itemTax = $displayItem['tax_code'];
			$ItemName = $displayItem['item_name'];
			$ItemType = $displayItem['item_type'];
			if($ItemCat != $checkCate){
				$rowcnt++;
				$objPHPExcel->getActiveSheet()->setCellValue('E' . $rowcnt, $ItemCat);
			}
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $rowcnt, $i);
			$objPHPExcel->getActiveSheet()->setCellValue('F' . $rowcnt, $ItemId);
			$objPHPExcel->getActiveSheet()->setCellValue('G' . $rowcnt, $ItemName);
			$objPHPExcel->getActiveSheet()->setCellValue('H' . $rowcnt, $ItemType);
			$objPHPExcel->getActiveSheet()->setCellValue('I' . $rowcnt, $itemTax);
			$rowcnt++;
			$i++;
			$checkCate = $ItemCat;
		}
	}
	$rowcnt++;
	$rowcnt++;

	$objPHPExcel->getActiveSheet()->setCellValue('A' . $rowcnt, 'Developed By Pranav(Software trainee)');
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $rowcnt . ':M' . $rowcnt);
	$styleArray = array(
		'font'  => array(
			'color' => array('rgb' => '0,0,139'),
			'size'  => 8
		)
	);
	$objPHPExcel->getActiveSheet()->getStyle('A' . $rowcnt)->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('A' . $rowcnt . ':M' . $rowcnt)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$objPHPExcel->setActiveSheetIndex(0);

	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Item List.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
	header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
}
?>