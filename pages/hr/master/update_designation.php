<?
session_start();
require '../../../connect.php';

if (isset($_POST['updateDesignationButton'])) {

    if ($_POST['editDesignationId'] != NULL) {
        $update_designation_id = $_POST['editDesignationId'];
    } else {
        echo "Designation ID Not Entered";
        exit;
    }

    if ($_POST['editDesignationName'] != NULL) {
        $update_designation = ucfirst(strtolower($_POST['editDesignationName']));
    }
    else
    {
        echo "Designation Name Not Entered";
        exit;
    }


    $sqlUpdateDesignation = "UPDATE `designation` SET `description` = '$update_designation' WHERE `designation`.`designation_id` = '$update_designation_id';";
    echo ($sqlUpdateDesignation);  
    if ($connect->query($sqlUpdateDesignation)) {
        $_SESSION["success"] = 'Updated Designation Successfully';
        header("Location: ../../../pages/hr/master/hr_master_designation.php");
    }else {
        $_SESSION["Error"] = 'Designation Not added';
    }
}
?>
