<?
require '../../../connect.php';

$sqlIdSelect = "SELECT MAX(CAST(SUBSTRING(`item_id`, 5, length(`item_id`)-4) AS UNSIGNED))AS id FROM item WHERE `item_id` LIKE 'ITM-%'";
if ($rawId=$connect->query($sqlIdSelect)) {
    while($id = $rawId->fetch_assoc())
    {

        if ($id['id'] == NULL) {
            $id = 0;
            echo json_encode($id);
        } else {
            echo json_encode($id['id']);
        }
    }
}
?>
