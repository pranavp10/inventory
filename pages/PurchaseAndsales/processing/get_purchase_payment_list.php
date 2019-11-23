<?
require '../../../connect.php';


if ($_POST['supplier'] != NULL) {
    $supplier= $_POST['supplier'];

    if($supplier != '-Select-'){
    $sqlGetPurchaseList = "";
    if ($rawData = $connect->query($sqlGetPurchaseList)) {
        if(mysqli_num_rows($rawData)){ 
        while ($data = $rawData->fetch_assoc()) {
            $purchaseDate = date('d-m-Y', strtotime($data['purchase_date']));
            $purchaseList[]
        }
        echo json_encode($purchaseList);
    }else{
        echo json_encode("nothing");
    }
}else{
    echo json_encode("nothing");
}
}else{
    $sqlGetPurchaseList = "SELECT purchase.purchase_date, purchase.purchase_id,purchase.total_amount_tax, supplier.supplier_name, GROUP_CONCAT( iCat.item_category_name SEPARATOR ',') AS item_category_name,GROUP_CONCAT( item.item_name SEPARATOR ',') AS item_name,GROUP_CONCAT(tax.tax_code SEPARATOR ',') AS tax_code ,GROUP_CONCAT(pList.quantity SEPARATOR ',') AS quantity,GROUP_CONCAT(pList.price_per_unit SEPARATOR ',')  AS price_per_unit,GROUP_CONCAT(pList.total_amount SEPARATOR ',') AS total_amount,GROUP_CONCAT(pList.total_amount_with_tax SEPARATOR ',') AS total_amount_with_tax FROM purchase AS purchase INNER JOIN purchase_list as pList ON pList.purchase_id = purchase.purchase_id INNER JOIN supplier_or_company AS supplier ON purchase.supplier_id=supplier.supplier_id INNER JOIN item_category as iCat ON pList.item_category = iCat.item_category_id INNER JOIN item AS item ON pList.item_code = item.item_id INNER JOIN tax AS tax ON item.item_tax= tax.tax_id WHERE purchase.purchase_date BETWEEN '$fromDate' AND '$toDate' GROUP BY purchase.purchase_id ORDER BY purchase.purchase_id ASC";
    if ($rawData = $connect->query($sqlGetPurchaseList)) {
        if(mysqli_num_rows($rawData)){ 
        while ($data = $rawData->fetch_assoc()) {
            $purchaseDate = date('d-m-Y', strtotime($data['purchase_date']));
            $purchaseList[]= array("purchaseDate"=>$purchaseDate,"purchaseId"=>$data['purchase_id'],"supplierName"=>$data['supplier_name'],"categoryName"=>$data['item_category_name'],"itemName"=>$data['item_name'],"quantity"=>$data['quantity'],"pricePerUnit"=>$data['price_per_unit'],"totalAmount"=>$data['total_amount'],"taxCode"=>$data['tax_code'],"totalAmountWithTax"=>$data['total_amount_with_tax'],"grandTotal"=>$data['total_amount_tax']);
        }
        echo json_encode($purchaseList);
    }else{
        echo json_encode("nothing");
    }
    }else{
        echo json_encode("nothing");
    }
}
}
?>