<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'ASM')
            ->setCellValue('B1', 'Sales Man	')
            ->setCellValue('C1', 'Distributor Name')
            ->setCellValue('D1', 'Retailer Name	')
			   ->setCellValue('E1', 'Phone Number')
			    ->setCellValue('F1', 'Beatname');
include "config.php";
$asm=$_GET['asm'];
$filename = "Distributer Secondary sales List";  
$salesman=$_GET['salesman'];
$distributor=$_GET['distributor'];
session_start();
$d=$_SESSION['d'];
$c=$_SESSION['c'];
$e=$_SESSION['e'];
//print_r($e);
 $n=sizeof($d);
// Miscellaneous glyphs, UTF-8
// $objPHPExcel->setActiveSheetIndex(0)
            // ->setCellValue('A4', $d[0])
            // ->setCellValue('A5', $c[1]);

// Rename worksheet
	
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);



	 $sno = 0;$rowcnt = 2;



 // for($i=0;$i<$n;$i++){
 // $sql1="select name from contactdetails where dist_id='$b[$i]'";
// $rs1 = mysql_query($sql1) or die(mysql_error());
// $r11=mysql_fetch_assoc($rs1);
// $c[$i]=$r11['name'];
 // }
 	 // $sno = 0; $rowcnt = 2;
 // for($i=0;$i<$n;$i++){


// $sno++; 
		// $objPHPExcel->getActiveSheet()->setCellValue('A' . $rowcnt, $asm);
		// $objPHPExcel->getActiveSheet()->setCellValue('B' . $rowcnt, $salesman);
		// $objPHPExcel->getActiveSheet()->setCellValue('C' . $rowcnt, $distributor);
		// $objPHPExcel->getActiveSheet()->setCellValue('D' . $rowcnt, $d[$i]);
		// $objPHPExcel->getActiveSheet()->setCellValue('E' . $rowcnt, $c[$i]);
		// $objPHPExcel->getActiveSheet()->setCellValue('F' . $rowcnt, $e[$i]);
		
			
	

// $rowcnt++;
 // }


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
