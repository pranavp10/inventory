<?
require '../../../connect.php';


if ($_POST['supplier'] != NULL) {
    $supplier= $_POST['supplier'];
    if($supplier != '-Select-'){
    $sqlGetPurchaseList = "SELECT supplier_or_company.supplier_name, purchase.purchase_id ,purchase.total_amount_tax,SUM(purchase_payment_list.amount_paid) AS amount_paid
    FROM supplier_or_company AS supplier_or_company INNER JOIN purchase AS purchase ON supplier_or_company.supplier_id = purchase.supplier_id INNER JOIN purchase_payment_list AS purchase_payment_list ON purchase.purchase_id=purchase_payment_list.purchase_id INNER JOIN purchase_payment AS purchase_payment ON purchase_payment.purchase_payment_id = purchase_payment_list.purchase_payment_id WHERE purchase.supplier_id = '$supplier' GROUP BY purchase.purchase_id";
    if ($rawData = $connect->query($sqlGetPurchaseList)) {
        if(mysqli_num_rows($rawData)){ 
        while ($data = $rawData->fetch_assoc()) {
            $purchaseList[] =array("supplier_name"=>$data['supplier_name'],"purchase_id"=>$data['purchase_id'],"total_amount_tax"=>$data['total_amount_tax'],"amount_paid"=>$data['amount_paid']); 
        }
        echo json_encode($purchaseList);
    }else{
        echo json_encode("nothing");
    }
}else{
    echo json_encode("nothing");
}
}
}else{
    echo json_encode("nothing");
}
?>