<?
require '../../../connect.php';


if (!empty($_POST['item']) &&  !empty($_POST['date'] != NULL)) {

    $item = $_POST['item'];
    $date = date('Y-m-d', strtotime($_POST['date']));

    $purchaseQuantity = array();
    $salesQuantity = array();

    $sqlPurchaseDateQuantity = "SELECT SUM(purchase_list.quantity) AS quantity FROM purchase_list AS purchase_list INNER JOIN purchase AS purchase ON purchase.purchase_id = purchase_list.purchase_id WHERE purchase_list.item_code ='$item' AND purchase.purchase_date <= '$date'";
    if ($rawData = $connect->query($sqlPurchaseDateQuantity)) {
        $purchaseDateQuantity = mysqli_fetch_assoc($rawData);
        if (!empty($purchaseDateQuantity)) {
            array_push($purchaseQuantity, $purchaseDateQuantity['quantity']);
        } else {
            echo json_encode("nothing");
        }
    } else {
        echo json_encode("nothing");
    }

    $sqlTotalPurchaseQuantity = "SELECT SUM(`quantity`) AS quantity FROM purchase_list WHERE `item_code` = '$item'";
    if ($rawData = $connect->query($sqlTotalPurchaseQuantity)) {
        $totalPurchaseQuantity = mysqli_fetch_assoc($rawData);
        if (!empty($totalPurchaseQuantity)) {
            array_push($purchaseQuantity, $totalPurchaseQuantity['quantity']);
        } else {
            echo json_encode("nothing");
        }
    } else {
        echo json_encode("nothing");
    }

    $sqlSalesDateQuantity = "SELECT SUM(sales_list.quantity) AS quantity FROM sales_list AS sales_list INNER JOIN sales AS sales ON sales.sales_id =sales_list.sales_id WHERE sales_list.item_code ='$item' AND sales.sales_date <= '$date'";
    if ($rawData = $connect->query($sqlSalesDateQuantity)) {
        $tillDateQuantity = mysqli_fetch_assoc($rawData);
        if (!empty($tillDateQuantity)) {
            array_push($salesQuantity, $tillDateQuantity['quantity']);
        } else {
            echo json_encode("nothing");
        }
    } else {
        echo json_encode("nothing");
    }

    $sqlSalesTotalQuantity = "SELECT SUM(`quantity`) AS quantity FROM sales_list WHERE `item_code` = '$item'";
    if ($rawData = $connect->query($sqlSalesTotalQuantity)) {
        $totalQuantityOfSales = mysqli_fetch_assoc($rawData);
        if (!empty($totalQuantityOfSales)) {
            array_push($salesQuantity, $totalQuantityOfSales['quantity']);
        } else {
            echo json_encode("nothing");
        }
    } else {
        echo json_encode("nothing");
    }

    $purchase = min($purchaseQuantity);
    $sales = min($salesQuantity);
    $remainingQuantity = $purchase - $sales;
    echo json_encode($remainingQuantity);
} else {
    echo json_encode("nothing");
}
?>
