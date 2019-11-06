<?
require '../../../connect.php';

$sqlIdSelect = "select `parameter_id` from parameters ORDER BY `parameter_id` DESC LIMIT 1";
if ($rawId = $connect->query($sqlIdSelect)) {
    $id = mysqli_fetch_assoc($rawId);

    if ($id['parameter_id'] == NULL) {
        $id = 0;
        echo json_encode($id);
    } else {
        preg_match_all('!\d+!', $id['parameter_id'], $gId);
        echo json_encode($gId[0][0]);
    }
}
?>