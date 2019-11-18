<?
require '../../../connect.php';


if ($_POST['item'] != NULL) {
    $item = $_POST['item'];
    $sqlGetItem = "SELECT item.item_type,tax.tax_percentage  FROM item AS item INNER JOIN tax as tax ON item.item_tax=tax.tax_id WHERE item.item_id ='$item'";
    if ($rawData = $connect->query($sqlGetItem)) {
        $data = mysqli_fetch_assoc($rawData);
        if ($data['item_type'] == NULL) {
            echo json_encode("nothing");
        } else {
            $itemList[] = array("itemType" => $data['item_type'], "tax" => $data['tax_percentage']);
            echo json_encode($itemList);
        }

    } else {
        echo json_encode("nothing");
    }
}
?>