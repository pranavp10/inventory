<?
require '../../../connect.php';

$sqlIdSelect = "SELECT MAX(CAST(SUBSTRING(`credit_limit_id`, 5, length(`credit_limit_id`)-4) AS UNSIGNED))AS id FROM credit_limit WHERE `credit_limit_id` LIKE 'CCL-%'";
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
