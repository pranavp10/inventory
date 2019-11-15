<?
require '../../../connect.php';

$sqlIdSelect = "";
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
