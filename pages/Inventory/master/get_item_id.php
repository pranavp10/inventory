<?
require '../../../connect.php';

$sqlIdSelect = "SELECT MAX(`item_id`)AS id FROM item";
if ($rawId=$connect->query($sqlIdSelect)) {
    while($id = $rawId->fetch_assoc())
    {

        if ($id['id'] == NULL) {
            $id = 0;
            echo json_encode($id);
        } else {
            $idNum = explode("-",$id['id']);
            echo json_encode($idNum[1]);
        }
    }
}

?>
