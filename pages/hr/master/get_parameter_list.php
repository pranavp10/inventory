<?
session_start();
require '../../../connect.php';

if ($_POST['dateSend'] != NULL) {
    $getDate =  $_POST['dateSend'];
    $sqlDisplayParameters = "SELECT designation.description, parameters.* FROM parameters INNER JOIN designation ON designation.designation_id = parameters.designation_id WHERE `parameter_date`='$getDate';";

    if ($rawDate = $connect->query($sqlDisplayParameters)) {
        if ($rawDate != NULL) {
            while ($displayParameter = $rawDate->fetch_assoc()) {

                $parametersJSON[] = array(
                    "parameterId" => $displayParameter['parameter_id'],
                    "parameterId" => $displayParameter['parameter_id'],
                    "parameterDesignation" => $displayParameter['description'],
                    "parameterDate" => $displayParameter['parameter_date'],
                    "parameterName" => $displayParameter['parameter_name'],
                    "parameterType" => $displayParameter['parameters_type'],
                    "parameterValueType" => $displayParameter['parameter_value_type'],
                    "parameterValue" => $displayParameter['parameter_value']
                );
            }
            echo json_encode($parametersJSON);
        } else {
            echo "Nothing";
        }
    }
} else {
    echo "Nothing";    
}
?>