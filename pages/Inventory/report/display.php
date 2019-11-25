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
                        <div class="box">
                            
                            <div class="box-header">
                            <select class="form-control selectReport" name="selectReport" id="selectReport">
                                    <option value="-Select-">Select</option>
                                    <option value="category" <?if(@$_GET['report']==='category'){ ?> selected <?}?> >Category</option>
                                    <option value="tax" <?if(@$_GET['report']==='tax'){ ?> selected <?}?>>Tax</option>
                                    <option value="item" <?if(@$_GET['report']==='item'){ ?> selected <?}?> >item</option>
                                </select>
                      
                                <div class="box-body">
                                    <table id="itemCategoryTable" class="table table-bordered table-striped">
                                        <?
                                        if (!isset($_GET['report']) || @$_GET['report'] == '-Select-') {
                                            ?>
                                            <thead>
                                                <tr class='text-center'>
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
                                                    ?>
                                                <thead>
                                                    <tr>
                                                        <th  class='text-center'>Item Category ID</th>
                                                        <th  class='text-center'>Item Category Name</th>
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
                                                                <td  class='text-center'><? echo $ItemCategoryId; ?></td>
                                                                <td  class='text-center'><? echo $ItemCategoryName; ?></td>
                                                            </tr>
                                                    <?
                                                                }
                                                            }
                                                            ?></tbody><?
                                                                            } else {
                                                                                if ($_GET['report'] === "tax") {
                                                                                    ?>
                                                    <thead>
                                                        <tr>
                                                            <th  class='text-center'>Tax ID</th>
                                                            <th  class='text-center'>Tax Code</th>
                                                            <th  class='text-center'>Tax Percentage(%)</th>
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
                                                                    <td  class='text-center'><? echo $taxId; ?></td>
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
                                                        <thead>
                                                            <tr>
                                                                <th  class='text-center'>Item ID</th>
                                                                <th  class='text-center'>Item Category Name</th>
                                                                <th  class='text-center'>Item Tax</th>
                                                                <th  class='text-center'>Item Name</th>
                                                                <th  class='text-center'>Item Type</th>

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
                                                                        <td  class='text-center'><? echo $ItemId; ?></td>
                                                                        <td  class='text-center'><? echo $ItemCat; ?></td>
                                                                        <td  class='text-center'><? echo $itemTax; ?></td>
                                                                        <td  class='text-center'><? echo $ItemName; ?></td>
                                                                        <td  class='text-center'><? echo $ItemType; ?></td>

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
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->

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
