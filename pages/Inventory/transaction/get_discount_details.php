<?
require '../../../connect.php';


if ($_POST['discountId'] != NULL) {
    $discountId = $_POST['discountId'];
    $sqlGetItem = "SELECT daf.*,ic.item_category_name,GROUP_CONCAT(i.item_name SEPARATOR ',') AS item_name,GROUP_CONCAT(dafd.discount_type SEPARATOR ',') AS discount_type,GROUP_CONCAT(dafd.discount_value SEPARATOR ',') AS discount_value,GROUP_CONCAT(dafd.minimun_amount SEPARATOR ',') AS minimun_amount FROM 
    discounts_and_flats AS daf INNER JOIN
    discounts_and_flats_details AS dafd ON daf.discount_id=dafd.discount_id INNER JOIN
    item_category AS ic ON dafd.item_category=ic.item_category_id INNER JOIN
    item as i ON dafd.item=i.item_id WHERE daf.discount_id='$discountId' GROUP BY dafd.item_category";

    if ($rawData = $connect->query($sqlGetItem)) {
        while ($data = $rawData->fetch_assoc()) {
            $fromDate =date('d-m-Y',strtotime($data['discount_from_date']));
            $toDate = date('d-m-Y',strtotime($data['discount_to_date']));
            $discountDetails[] = array("discountName"=>$data['discount_name'],"discountId"=>$data['discount_id'],"fromDate"=>$fromDate,"toDate"=>$toDate,"itemCat"=>$data['item_category_name'],"item"=>$data['item_name'],"discountType"=>$data['discount_type'],"discountValue"=>$data['discount_value'],"minimum"=>$data['minimun_amount']);
        }
        echo json_encode($discountDetails);
    }
}
