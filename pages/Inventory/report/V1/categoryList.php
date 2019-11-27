<?php

include_once('class.ezpdf.php');
error_reporting(~E_ALL);
//ezpdf: from http://www.ros.co.nz/pdf/?

//docs: http://www.ros.co.nz/pdf/readme.pdf

//note: xy origin is at the bottom left


//data

$colw = array(80,    40,   220,    80,     40); //column widths

$rows = array(

    array('company', 'size', 'desc', 'cost', 'instock'),

    array("WD", "80GB", "WD800AAJS SATA2 7200rpm 8mb", "$36.90", "Y"),

    array("WD", "160GB", "WD1600AAJS SATA300 8mb 7200rpm", "$39.87", "Y"),

    array("WD", "80GB", "800jd SATA2 7200rpm 8mb", "$41.90", "Y"),

    array("WD", "250GB", "WD2500AAKS SATA300 16mb 7200rpm", "$49.88", "Y"),

    array("WD", "320GB", "WD3200AAKS SATA300 16mb 7200rpm", "$49.90", "Y"),

    array("WD", "160GB", "1600YS SATA raid 16mb 7200rpm", "$59.90", "Y"),

    array("WD", "500GB", "500gb WD5000AAKS SATA2 16mb 7200rpm", "$64.90", "Y"),

    array("WD", "250GB", "2500ys SATA raid 7200rpm 16mb", "$69.90", "Y"),

);





//x is 0-600, y is 0-780 (origin is at bottom left corner)

$pdf = &new Cezpdf('LETTER');





///topmost horizontal line

$pdf->setLineStyle(0.5);

$pdf->line(0, 770, 612, 770);

$pdf->setStrokeColor(0, 0, 0);

$pdf->setLineStyle(0.7);

$pdf->line(0, 750, 612, 750);

$pdf->setStrokeColor(0, 0, 0);

$pdf->setLineStyle(0.5);

$pdf->line(50, 770, 50, 0);

$pdf->setStrokeColor(0, 0, 0);

$pdf->setLineStyle(0.5);

$pdf->line(323, 770, 323, 0);

$pdf->setStrokeColor(0, 0, 0);

$pdf->addText(295, 775, 10, "Category List");
$pdf->addText(12, 757, 10, "Sl No");
$pdf->addText(150, 757, 10, "Category Code");
$pdf->addText(430, 757, 10, "Category Name");



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

$i = 725;
$j = 720;
$slNo = 1;
$sqlDisplayItemCategory = "SELECT `item_category_id`,`item_category_name` FROM `item_category`";
if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
    while ($displayCat = $rawDate->fetch_assoc()) {
        $ItemCategoryId = $displayCat['item_category_id'];
        $ItemCategoryName = $displayCat['item_category_name'];
        $pdf->addText(20, $i, 10, $slNo);
        $pdf->addText(168, $i, 10, $ItemCategoryId);
        $pdf->addText(443, $i, 10, $ItemCategoryName);
        $i = $i - 20;
        $slNo++;
        
        $pdf->setLineStyle(0.5);
        $pdf->line(0, $j, 612, $j);
        $pdf->setStrokeColor(0, 0, 0);
        $j = $j-20;
    }
}
$pdf->ezStream();
?>