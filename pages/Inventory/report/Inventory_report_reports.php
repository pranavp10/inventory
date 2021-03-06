<?
session_start();
require '../../../connect.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Report</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- Tell the browser to be responsive to screen width -->

</head>

<body>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="box-title text-center"><? echo ucfirst(@$_GET['report']); ?></h3>
                <p  <? if (@$_GET['report'] =='-Select-' || !isset($_GET['report'])) {?> hidden <?}?>> &nbsp;&nbsp;<button type="button" class="btn btn-info btn-xs" onclick="window.open('../../../pages/Inventory/report/reportPrint.php?report=<? echo @$_GET['report']; ?>&category=<? echo @$_GET['category']; ?>')">Printer Friendly <i class="fa fa-print" aria-hidden="true"></i></button> &nbsp;&nbsp;&nbsp;<span><button type="button" class="btn btn-info btn-xs" onclick="window.open('../../../pages/Inventory/report/reportExcel.php?report=<? echo @$_GET['report']; ?>&category=<? echo @$_GET['category']; ?>')" >Export to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button></span> &nbsp;&nbsp;&nbsp;<span><button type="button" class="btn btn-info btn-xs" onclick="window.open('../../../pages/Inventory/report/reportPDF.php?report=<? echo @$_GET['report']; ?>&category=<? echo @$_GET['category']; ?>')"> Export to PDF <i class="fa fa-file-pdf-o" aria-hidden="true"></i></button></span> &nbsp;&nbsp;&nbsp;<span><button type="button" class="btn btn-info btn-xs" onclick="location.href='../../../pages/Inventory/report/Inventory_report_reports.php';"> Reset All Filters <i class="fa fa-refresh" aria-hidden="true"></i></button></span></p>
                <div class="box">
                    <div class="form-inline">
                        <div class="box-header">
                            <div class="form-group">
                                <label>Types</label>
                                <select class="form-control selectReport" name="selectReport" id="selectReport">
                                    <option value="-Select-">Select</option>
                                    <option value="category" <? if (@$_GET['report'] === 'category') { ?> selected <? } ?>>Category</option>
                                    <option value="tax" <? if (@$_GET['report'] === 'tax') { ?> selected <? } ?>>Tax</option>
                                    <option value="item" <? if (@$_GET['report'] === 'item') { ?> selected <? } ?>>item</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control catCode" name="catCode" id="catCode">
                                    <option value="-Select-">Select</option>
                                    <? if (@$_GET['report'] === 'category') {
                                        $sqlDisplayItemCategory = "SELECT `item_category_id`,`item_category_name` FROM `item_category`";
                                        if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                                            while ($displayCat = $rawDate->fetch_assoc()) {
                                                $ItemCategoryId = $displayCat['item_category_id'];
                                                $ItemCategoryName = $displayCat['item_category_name'];
                                                ?>
                                                <option value="<? echo $ItemCategoryId; ?>" <? if (@$_GET['category'] == $ItemCategoryId) { ?> selected <? } ?>><? echo $ItemCategoryName; ?></option>
                                    <?
                                            }
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="itemCategoryTable" class="table table-bordered table-striped">
                                <?
                                if (!isset($_GET['report']) || @$_GET['report'] == '-Select-') {
                                    ?>
                                    <thead class="black white-text">
                                        <tr class='text-center bg-primary'>
                                            <td>Select the item</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class='text-center'>
                                            <td>Select the option</td>
                                        </tr>
                                    </tbody>
                                    <?
                                    } else {
                                        if ($_GET['report'] === "category") {
                                            if (isset($_GET['category'])) {
                                                if ($_GET['category'] === "-Select-") {
                                                    ?>
                                                <thead>
                                                    <tr class='text-center bg-primary'>
                                                        <th class='text-center'>Item Category ID</th>
                                                        <th class='text-center'>Item Category Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?
                                                                    $sqlDisplayItemCategory = "SELECT `item_category_id`,`item_category_name` FROM `item_category`";
                                                                    if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                                                                        while ($displayCat = $rawDate->fetch_assoc()) {
                                                                            $ItemCategoryId = $displayCat['item_category_id'];
                                                                            $ItemCategoryName = $displayCat['item_category_name'];
                                                                            ?>
                                                            <tr>
                                                                <td class='text-center'><? echo $ItemCategoryId; ?></td>
                                                                <td class='text-center'><? echo $ItemCategoryName; ?></td>
                                                            </tr>
                                                    <?
                                                                        }
                                                                    }
                                                                    ?></tbody><?
                                                                                            } else {
                                                                                                ?>
                                                <thead>
                                                    <tr class='text-center bg-primary'>
                                                        <th class='text-center'>Item Category Name</th>
                                                        <th class='text-center'>Item Code</th>
                                                        <th class='text-center'>Item Name</th>
                                                        <th class='text-center'>Item Type</th>
                                                        <th class='text-center'>Item Tax Code</th>
                                                        <th class='text-center'>Item Tax</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?
                                                                    $sqlDisplayItemCategory = "SELECT item_category.item_category_name,item.*,tax.tax_percentage FROM item_category AS item_category INNER JOIN item AS item ON item.item_category = item_category.item_category_id INNER JOIN tax AS tax ON item.item_tax = tax.tax_id WHERE item_category.item_category_id = '$_GET[category]'";
                                                                    if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                                                                        if (mysqli_num_rows($rawDate) == 0) {
                                                                            ?><tr>
                                                                <td class='text-center' colspan="5">No Data is present</td>
                                                            </tr><?
                                                                                        } else {
                                                                                            $i = 0;
                                                                                            while ($displayCat = $rawDate->fetch_assoc()) {

                                                                                                $catName = $displayCat['item_category_name'];
                                                                                                $item_id = $displayCat['item_id'];
                                                                                                $item_name = $displayCat['item_name'];
                                                                                                $item_type = $displayCat['item_type'];
                                                                                                $item_tax = $displayCat['item_tax'];
                                                                                                $tax_percentage = $displayCat['tax_percentage'];
                                                                                                ?>
                                                                <tr>
                                                                    <? if ($i == 0) { ?><td class='text-center'><? echo $catName; ?></td><? } else { ?><td></td><? } ?>
                                                                    <td class='text-center'><? echo $item_id; ?><br></td>
                                                                    <td class='text-center'><? echo $item_name; ?><br></td>
                                                                    <td class='text-center'><? echo $item_type; ?><br></td>
                                                                    <td class='text-center'><? echo $item_tax; ?><br></td>
                                                                    <td class='text-center'><? echo $tax_percentage; ?><br></td>
                                                                </tr>
                                                    <?
                                                                                $i++;
                                                                            }
                                                                        }
                                                                    }
                                                                    ?></tbody><?
                                                                                            }
                                                                                        }
                                                                                    } else {
                                                                                        if ($_GET['report'] === "tax") {
                                                                                            ?>
                                            <thead class="black white-text">
                                                <tr class='text-center bg-primary'>
                                                    <th class='text-center'>Tax ID</th>
                                                    <th class='text-center'>Tax Code</th>
                                                    <th class='text-center'>Tax Percentage(%)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?
                                                            $sqlDisplayTax = "SELECT `tax_id`,`tax_code`,`tax_percentage` FROM `tax`";
                                                            if ($rawDate = $connect->query($sqlDisplayTax)) {
                                                                while ($displayTax = $rawDate->fetch_assoc()) {
                                                                    $taxId = $displayTax['tax_id'];
                                                                    $taxCode = $displayTax['tax_code'];
                                                                    $taxPercentage = $displayTax['tax_percentage'];
                                                                    ?>

                                                        <tr class='text-center'>
                                                            <td class='text-center'><? echo $taxId; ?></td>
                                                            <td class='text-center'><? echo $taxCode; ?></td>
                                                            <td class='text-center'><? echo "$taxPercentage%"; ?></td>
                                                        </tr>
                                                <?
                                                                }
                                                            }
                                                            ?>
                                            </tbody>
                                            <?
                                                    } else {
                                                        if ($_GET['report'] === "item") {
                                                            ?>
                                                <thead class="black white-text">
                                                    <tr class='text-center bg-primary'>
                                                        <th class='text-center'>Item ID</th>
                                                        <th class='text-center'>Item Category Name</th>
                                                        <th class='text-center'>Item Tax</th>
                                                        <th class='text-center'>Item Name</th>
                                                        <th class='text-center'>Item Type</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?
                                                                    $sqlDisplayItem = "SELECT item.`item_id`,item.`item_name`,itemCat.item_category_name,tax.tax_code,item.item_type FROM item AS item INNER JOIN item_category as itemCat ON item.item_category = itemCat.item_category_id INNER JOIN tax as tax on  item.item_tax =tax.tax_id";
                                                                    if ($rawDate = $connect->query($sqlDisplayItem)) {
                                                                        while ($displayItem = $rawDate->fetch_assoc()) {
                                                                            $ItemId = $displayItem['item_id'];
                                                                            $ItemCat = $displayItem['item_category_name'];
                                                                            $itemTax = $displayItem['tax_code'];
                                                                            $ItemName = $displayItem['item_name'];
                                                                            $ItemType = $displayItem['item_type'];
                                                                            ?>
                                                            <tr class='text-center'>
                                                                <td class='text-center'><? echo $ItemId; ?></td>
                                                                <td class='text-center'><? echo $ItemCat; ?></td>
                                                                <td class='text-center'><? echo $itemTax; ?></td>
                                                                <td class='text-center'><? echo $ItemName; ?></td>
                                                                <td class='text-center'><? echo $ItemType; ?></td>

                                                            </tr>
                                                    <?
                                                                        }
                                                                    }
                                                                    ?>
                                                </tbody>
                                <?
                                            }
                                        }
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
    </section>

    <!-- jQuery 3 -->
    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../../bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.7 -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../scripts/hr/Inventory_report_reports.js"></script>
</body>

</html>