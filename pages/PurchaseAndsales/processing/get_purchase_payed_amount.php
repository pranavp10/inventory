<?
require '../../../connect.php';


if ($_POST['supplierId'] != NULL && $_POST['paymentDate'] !=NULL) {
    $paymentDate = date('Y-m-d',strtotime($_POST['paymentDate']));
    $id= $_POST['supplierId'];
    $sqlSelect = "SELECT SUM(ppList.`amount_paid`) AS `amount_paid` FROM `purchase_payment_list` AS ppList INNER JOIN purchase_payment AS pp ON pp.purchase_payment_id = ppList.`purchase_payment_id`
    WHERE pp.supplier_id= '$id'";
    if ($rawData = $connect->query($sqlSelect)) {
        if(mysqli_num_rows($rawData)){
        while ($data = $rawData->fetch_assoc()) {
            if($data['amount_paid'] !=NULL){
            $totalAmountRemaining[] =array("amountPayedTillNow"=>$data['amount_paid']); 
            echo json_encode($totalAmountRemaining);
        }else{
            echo json_encode("nothing");

        }
    }
    }else{
        echo json_encode("nothing");
    }
}else{
    echo json_encode("nothing"); 
}
}
?>