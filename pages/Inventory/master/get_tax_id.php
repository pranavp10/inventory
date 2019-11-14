<?
require '../../../connect.php';

$sqlIdSelect = "SELECT MAX(CAST(SUBSTRING(`tax_id`, 5, length(`tax_id`)-4) AS UNSIGNED))AS id FROM tax WHERE `tax_id` LIKE 'TAX-%'";
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
