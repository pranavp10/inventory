<?
require '../../../connect.php';


if ($_POST['id'] != NULL) {
    $id= $_POST['id'];
    $sqlSelect = "SELECT purchase.*, purchase_list.* FROM purchase as purchase INNER JOIN purchase_list AS purchase_list ON purchase.purchase_id= purchase_list.purchase_id WHERE purchase.purchase_id = '$id'";
    if ($rawData = $connect->query($sqlSelect)) {
        while ($data = $rawData->fetch_assoc()) {
            $editPurchase[] = array('item_category'=>$data['item_category'],'item_code'=>$data['item_code'],'quantity'=>$data['quantity'],'price_per_unit'=>$data['price_per_unit'],'total_amount'=>$data['total_amount'],'total_amount_with_tax'=>$data['total_amount_with_tax'],'lr_number'=>$data['lr_number']); 
        }
        echo json_encode($editPurchase);
    }else{
        echo json_encode("nothing");
    }
}
?>