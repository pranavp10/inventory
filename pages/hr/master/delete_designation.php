<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteDesignationButton'])) {

    if ($_POST['deleteId'] != NULL) {
        $delete_designation_id = $_POST['deleteId'];
    } else {
        echo "ID Not selected";
        exit;
    }
    $sqlDeleteDesignation = "DELETE FROM `designation` WHERE `designation`.`designation_id` = '$delete_designation_id'";
    echo $sqlDeleteDesignation;
    if ($connect->query($sqlDeleteDesignation)) {
        $_SESSION["success"] = 'Designation Deleted Successfully';
        header("Location: ../../../pages/hr/master/hr_master_designation.php");
    }else {
        $_SESSION["Error"] = 'Designation Not Deleted';
        echo "not deleted". mysqli_error($connect);
    }
}
?>
