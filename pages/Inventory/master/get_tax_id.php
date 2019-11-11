<?
require '../../../connect.php';

$sqlIdSelect = "SELECT MAX(`tax_id`)AS id FROM tax";
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
