<?



$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('D1', 'Category');
$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);

$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A5', 'Item Category ID')
    ->setCellValue('B5', 'Item Category Name');
    
$objPHPExcel->getActiveSheet()->getStyle('A5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);


$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);

$rowcnt = 6;

$sqlDisplayItemCategory = "SELECT `item_category_id`,`item_category_name` FROM `item_category`";
if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
    while ($displayCat = $rawDate->fetch_assoc()) {
        $ItemCategoryId = $displayCat['item_category_id'];
        $ItemCategoryName = $displayCat['item_category_name'];

	$objPHPExcel->getActiveSheet()->setCellValue('A' . $rowcnt, $ItemCategoryId);
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $rowcnt, $ItemCategoryName);
	$rowcnt++;
}
}
$rowcnt++;
$rowcnt++;




// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Category.xls"');
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
