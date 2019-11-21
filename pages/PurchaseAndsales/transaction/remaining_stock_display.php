<?
require '../../../connect.php';


if (!empty($_POST['date'] != NULL)) {

    $date = date('Y-m-d', strtotime($_POST['date']));

    $sqlPurchaseDateQuantity = "SELECT GROUP_CONCAT(quantity SEPARATOR ',')AS quantity,GROUP_CONCAT(item_code SEPARATOR ',')AS item_code,item_category FROM (SELECT SUM(purchase_list.quantity) AS quantity, purchase_list.item_code,purchase_list.item_category FROM purchase_list AS purchase_list INNER JOIN purchase AS purchase ON purchase.purchase_id = purchase_list.purchase_id WHERE purchase.purchase_date <= '$date' GROUP BY `item_code`  
    ORDER BY purchase_list.`item_category` ASC)s GROUP BY item_category";
    if ($rawData = $connect->query($sqlPurchaseDateQuantity)) {
        if (mysqli_num_rows($rawData)) {
            while ($purchaseDateQuantity=$rawData->fetch_assoc()) {
                $purchaseItem[] = array("item_category" => $purchaseDateQuantity['item_category'], "item" => $purchaseDateQuantity['item_code'], "quantity" => $purchaseDateQuantity['quantity']);
            }
        } else {
            echo json_encode("nothing");
        }
    } else {
        echo json_encode("nothing");
    }

    $sqlSalesDateQuantity = "SELECT GROUP_CONCAT(quantity SEPARATOR ',')AS quantity,GROUP_CONCAT(item_code SEPARATOR ',')AS item_code,item_category FROM (SELECT SUM(sales_list.quantity) AS quantity, sales_list.item_code,sales_list.item_category FROM sales_list AS sales_list INNER JOIN sales AS sales ON sales_list.sales_id= sales.sales_id WHERE sales.sales_date <= '$date' GROUP BY `item_code`  
    ORDER BY sales_list.item_code ASC)s GROUP BY item_category";
    if ($rawData = $connect->query($sqlSalesDateQuantity)) {
        if (mysqli_num_rows($rawData)) {
            while ($salesDateQuantity=$rawData->fetch_assoc()) {
                $salesItem[] = array("item_category" => $salesDateQuantity['item_category'], "item" => $salesDateQuantity['item_code'], "quantity" => $salesDateQuantity['quantity']);
            }
        } else {
            echo json_encode("nothing");
        }
    } else {
        echo json_encode("nothing");
    }
    $stock =array();
     array_push($stock,$purchaseItem);
     array_push($stock,$salesItem);
    echo json_encode($stock);
} else {
    echo json_encode("nothing");
}
?>