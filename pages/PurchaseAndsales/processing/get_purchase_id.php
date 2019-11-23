<?
require '../../../connect.php';


if ($_POST['supplierId'] != NULL && $_POST['paymentDate'] !=NULL) {
    $paymentDate = date('Y-m-d',strtotime($_POST['paymentDate']));
    $id= $_POST['supplierId'];
    $sqlSelect = "SELECT purchase.purchase_id , (purchase.total_amount_tax- MAX(ppList.amount_paid)) AS amount_paid FROM `purchase` AS purchase INNER JOIN purchase_payment_list AS ppList ON purchase.purchase_id= ppList.purchase_id
    WHERE purchase.`supplier_id`='$id' AND purchase.`purchase_date` <= '$paymentDate' GROUP BY purchase.purchase_id";
    if ($rawData = $connect->query($sqlSelect)) {
        if(mysqli_num_rows($rawData)){
        while ($data = $rawData->fetch_assoc()) {
            $purchaseId[] =array("purchaseId"=>$data['purchase_id'],"payedPurchaseId"=>$data['amount_paid']); 
        }
        echo json_encode($purchaseId);
    }else{
        echo json_encode("nothing");
    }
}else{
    echo json_encode("nothing"); 
}
}
?>