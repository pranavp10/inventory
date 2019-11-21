<?
require '../../../connect.php';


if ($_POST['id'] != NULL) {
    $id= $_POST['id'];
    $sqlSelect = "SELECT sales.*, sales_list.* FROM sales as sales INNER JOIN sales_list AS sales_list ON sales_list.sales_id = sales.sales_id WHERE sales.sales_id = '$id'";
    if ($rawData = $connect->query($sqlSelect)) {
        while ($data = $rawData->fetch_assoc()) {
            $editSales[] = array('item_category'=>$data['item_category'],'item_code'=>$data['item_code'],'quantity'=>$data['quantity'],'price_per_unit'=>$data['price_per_unit'],'total_amount'=>$data['total_amount'],'total_amount_with_tax'=>$data['total_amount_with_tax'],'lr_number'=>$data['lr_number']); 
        }
        echo json_encode($editSales);
    }else{
        echo json_encode("nothing");
    }
}
?>