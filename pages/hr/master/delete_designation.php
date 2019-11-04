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
    if ($connect->query($sqlDeleteDesignation)) {
        $_SESSION['deleteDesignation'] = 'yes';
        header("Location: ../../../pages/hr/master/hr_master_designation.php");
    }else {
        $_SESSION['deleteDesignation'] = 'no';
        header("Location: ../../../pages/hr/master/hr_master_designation.php");
    }

}
?>
