<?
require '../../../connect.php';


if ($_POST['supplierId'] != NULL) {

    $id= $_POST['supplierId'];
    $sqlSelect = "SELECT `purchase_id` FROM `purchase` WHERE `supplier_id`='$id'";
    if ($rawData = $connect->query($sqlSelect)) {
        if(mysqli_num_rows($rawData)){
        while ($data = $rawData->fetch_assoc()) {
            $purchaseId[] =array($data['purchase_id']); 
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