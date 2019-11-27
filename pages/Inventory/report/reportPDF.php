<?php
error_reporting(~E_ALL);
set_time_limit(0);
require_once('phpclasses/tcpdf/tcpdf.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetLeftMargin(5);
$pdf->SetTopMargin(5);
$pdf->SetRightMargin(5);
$pdf->SetFooterMargin(0);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->SetPrintHeader(false);

if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}
// set font
$pdf->SetFont('times', '', 10);
$pdf->AddPage('P', 'A4');

// connection
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
$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDF</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <style>
    <style>
    th {
  border: 1px solid black;
}
</style>
    </style>
</head>
<body>
                <h3 style="text-align: center; vertical-align: middle;"> ' . ucfirst(@$_GET["report"]) . '</h3>
                            <table>';
if (!isset($_GET['report']) || @$_GET['report'] == '-Select-') {
    $html .= '                                    
    <thead style="text-align: center; vertical-align: middle;">
    <tr style="text-align: center; vertical-align: middle;">
        <td>Select the item</td>
    </tr>
    </thead>
    <tbody>
    <tr style="text-align: center; vertical-align: middle;">
        <td>Select the option</td>
    </tr>
    </tbody>';
} else {
    if ($_GET['report'] === "category") {
        if (isset($_GET['category'])) {
            if ($_GET['category'] === "-Select-") {
                $html .= '<thead>
                <tr style="text-align: center; vertical-align: middle;">
                    <th style="text-align: center; vertical-align: middle;">Item Category ID</th>
                    <th style="text-align: center; vertical-align: middle;">Item Category Name</th>
                </tr>
            </thead>
            <tbody>';
                $sqlDisplayItemCategory = "SELECT `item_category_id`,`item_category_name` FROM `item_category`";
                if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                    while ($displayCat = $rawDate->fetch_assoc()) {
                        $ItemCategoryId = $displayCat['item_category_id'];
                        $ItemCategoryName = $displayCat['item_category_name'];

                        $html .= ' <tr>
                    <td style="text-align: center; vertical-align: middle;"> ' . $ItemCategoryId . '</td>
                    <td style="text-align: center; vertical-align: middle;"> ' . $ItemCategoryName . '</td>
                </tr>';
                    }
                }
            }
            $html .= '</tbody>';
        } else {
            $html .= '<thead>
            <tr style="text-align: center; vertical-align: middle;">
                <th style="text-align: center; vertical-align: middle;">Item Category Name</th>
                <th style="text-align: center; vertical-align: middle;">Item Code</th>
                <th style="text-align: center; vertical-align: middle;">Item Name</th>
                <th style="text-align: center; vertical-align: middle;">Item Type</th>
                <th style="text-align: center; vertical-align: middle;">Item Tax Code</th>
                <th style="text-align: center; vertical-align: middle;">Item Tax</th>
            </tr>
        </thead>
        <tbody>';
            $sqlDisplayItemCategory = "SELECT item_category.item_category_name,item.*,tax.tax_percentage FROM item_category AS item_category INNER JOIN item AS item ON item.item_category = item_category.item_category_id INNER JOIN tax AS tax ON item.item_tax = tax.tax_id WHERE item_category.item_category_id = '$_GET[category]'";
            if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                if (mysqli_num_rows($rawDate) == 0) {
                    $html .= '<tr>
                <td style="text-align: center; vertical-align: middle;" colspan="5">No Data is present</td>
            </tr>';
                } else {
                    $i = 0;
                    while ($displayCat = $rawDate->fetch_assoc()) {

                        $catName = $displayCat['item_category_name'];
                        $item_id = $displayCat['item_id'];
                        $item_name = $displayCat['item_name'];
                        $item_type = $displayCat['item_type'];
                        $item_tax = $displayCat['item_tax'];
                        $tax_percentage = $displayCat['tax_percentage'];
                        $html .= '                                                                
                <tr>';
                        if ($i == 0) {
                            $html .= '<td style="text-align: center; vertical-align: middle;">' . $catName . '</td>';
                        } else {
                            $html .= '<td></td>';
                        }
                        $html .= '
                                        <td style="text-align: center; vertical-align: middle;">' . $item_id . '<br></td>
                <td style="text-align: center; vertical-align: middle;">' . $item_name . '<br></td>
                <td style="text-align: center; vertical-align: middle;">' . $item_type . '<br></td>
                <td style="text-align: center; vertical-align: middle;">' . $item_tax . '<br></td>
                <td style="text-align: center; vertical-align: middle;">' . $tax_percentage . '<br></td>
                </tr>';
                        $i++;
                    }
                }
            }
            $html .= '</tbody>';
        }
    } else {
        if ($_GET['report'] === "tax") {
            $html .= '<thead style="text-align: center; vertical-align: middle;">
<tr style="text-align: center; vertical-align: middle;">
    <th style="text-align: center; vertical-align: middle;">Tax ID</th>
    <th style="text-align: center; vertical-align: middle;">Tax Code</th>
    <th style="text-align: center; vertical-align: middle;">Tax Percentage(%)</th>
</tr>
</thead>
<tbody>';
            $sqlDisplayTax = "SELECT `tax_id`,`tax_code`,`tax_percentage` FROM `tax`";
            if ($rawDate = $connect->query($sqlDisplayTax)) {
                while ($displayTax = $rawDate->fetch_assoc()) {
                    $taxId = $displayTax['tax_id'];
                    $taxCode = $displayTax['tax_code'];
                    $taxPercentage = $displayTax['tax_percentage'];
                    $html .= '<tr style="text-align: center; vertical-align: middle;">
 <td style="text-align: center; vertical-align: middle;">' . $taxId . '</td>
 <td style="text-align: center; vertical-align: middle;">' . $taxCode . '</td>
 <td style="text-align: center; vertical-align: middle;">' . "$taxPercentage%" . '</td>
</tr>';
                }
            }
            $html .= '</tbody>';
        } else {
            if ($_GET['report'] === "item") {
                $html .= '                                                <thead style="text-align: center; vertical-align: middle;">
<tr style="text-align: center; vertical-align: middle;">
    <th style="text-align: center; vertical-align: middle;">Item ID</th>
    <th style="text-align: center; vertical-align: middle;">Item Category Name</th>
    <th style="text-align: center; vertical-align: middle;">Item Tax</th>
    <th style="text-align: center; vertical-align: middle;">Item Name</th>
    <th style="text-align: center; vertical-align: middle;">Item Type</th>
</tr>
</thead>
<tbody>';
                $sqlDisplayItem = "SELECT item.`item_id`,item.`item_name`,itemCat.item_category_name,tax.tax_code,item.item_type FROM item AS item INNER JOIN item_category as itemCat ON item.item_category = itemCat.item_category_id INNER JOIN tax as tax on  item.item_tax =tax.tax_id";
                if ($rawDate = $connect->query($sqlDisplayItem)) {
                    while ($displayItem = $rawDate->fetch_assoc()) {
                        $ItemId = $displayItem['item_id'];
                        $ItemCat = $displayItem['item_category_name'];
                        $itemTax = $displayItem['tax_code'];
                        $ItemName = $displayItem['item_name'];
                        $ItemType = $displayItem['item_type'];

                        $html .= '                                                            
        <tr style="text-align: center; vertical-align: middle;">
        <td style="text-align: center; vertical-align: middle;">' . $ItemId . '</td>
        <td style="text-align: center; vertical-align: middle;">' . $ItemCat . '</td>
        <td style="text-align: center; vertical-align: middle;">' . $itemTax . '</td>
        <td style="text-align: center; vertical-align: middle;">' . $ItemName . '</td>
        <td style="text-align: center; vertical-align: middle;">' . $ItemType . '</td>
    </tr>';

                        $html .= '
</table>

</body>
</html>';
                    }
                }
                $html .= '</tbody>';
            }
        }
    }
}


$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();
$pdf->Output('MRN.pdf', 'I');
?>