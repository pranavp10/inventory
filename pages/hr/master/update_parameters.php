<?
session_start();
require '../../../connect.php';

if (isset($_POST['updateEmployeeButton'])) {
    if ($_POST['editParametersId'] != NULL) {
        $editParametersId = $_POST['editParametersId'];
    } else {
        echo "Parameters Id Not entered";
    }

    if ($_POST['editParametersDate'] != NULL) {

        $rawDate = $_POST['editParametersDate'];
        $editParametersDate = date('Y-m-d', strtotime($rawDate));
    } else {
        echo "Date Not entered";
    }

    if ($_POST['editHraValue'] != NULL) {
        $editHraValue = $_POST['editHraValue'];
    } else {
        echo " HRA value is not entered";
    }

    if ($_POST['editMedicalValue'] != NULL) {
        $editMedicalValue = $_POST['editMedicalValue'];
    } else {
        echo "medical value is not entered";
    }

    if ($_POST['editTransportationValue'] != NULL) {
        $editTransportationValue = $_POST['editTransportationValue'];
    } else {
        echo "transportation value is not entered";
    }

    if ($_POST['editPfValue'] != NULL) {
        $editPfValue = $_POST['editPfValue'];
    } else {
        echo "pf value is not entered";
    }

    if ($_POST['editProfessionalTaxValue'] != NULL) {
        $editProfessionalTaxValue = $_POST['editProfessionalTaxValue'];
    } else {
        echo "professional Tax value is not entered";
    }

    $edit_parameter_hra = $_POST['editParameters'][0];    
    $edit_parameter_value_type_hra = $_POST['editHra'];

    $edit_parameter_medical = $_POST['editParameters'][1];
    $edit_parameter_value_type_medical = $_POST['editMedical'];

    $edit_parameter_transportation = $_POST['editParameters'][2];
    $edit_parameter_value_type_transportation = $_POST['editTransportation'];

    $edit_parameter_pf = $_POST['editParameters'][3];
    $edit_parameter_value_type_pf = $_POST['editPf'];

    $edit_parameter_professionalTax = $_POST['editParameters'][4];
    $edit_parameter_value_type_professionalTax = $_POST['editProfessionalTax'];



    $sqlUpdateParameter[] = " UPDATE `parameters` SET `parameter_value` = '$editHraValue',`parameter_value_type`='$edit_parameter_value_type_hra' WHERE `parameters`.`parameter_id`='$editParametersId' AND `parameters`.`parameter_name` ='$edit_parameter_hra';";
    $sqlUpdateParameter[]= "UPDATE `parameters` SET `parameter_value` = '$editMedicalValue',`parameter_value_type`='$edit_parameter_value_type_medical' WHERE `parameters`.`parameter_id`='$editParametersId' AND `parameters`.`parameter_name` ='$edit_parameter_medical';";
    $sqlUpdateParameter[]= "UPDATE `parameters` SET `parameter_value` = '$editTransportationValue',`parameter_value_type`='$edit_parameter_value_type_transportation' WHERE `parameters`.`parameter_id`='$editParametersId' AND `parameters`.`parameter_name` ='$edit_parameter_transportation';";
    $sqlUpdateParameter[]= "UPDATE `parameters` SET `parameter_value` = '$editPfValue',`parameter_value_type`='$edit_parameter_value_type_pf' WHERE `parameters`.`parameter_id`='$editParametersId' AND `parameters`.`parameter_name` ='$edit_parameter_pf';";
    $sqlUpdateParameter[]= "UPDATE `parameters` SET `parameter_value` = '$editProfessionalTaxValue',`parameter_value_type`='$edit_parameter_value_type_professionalTax' WHERE `parameters`.`parameter_id`='$editParametersId' AND `parameters`.`parameter_name` ='$edit_parameter_professionalTax';";

    for($i=0; $i<5 ;$i++){

        if ($connect->query($sqlUpdateParameter[$i])) {
            $_SESSION["updateParameters"] = 'yes';
        }else
        {
            $_SESSION["updateParameters"] = 'no';
        }
    }
    header("Location: ../../../pages/hr/master/hr_master_parameters.php");
} else {
    echo 'You did not click the button';
}
?>
