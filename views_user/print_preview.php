<?php
$id = $_GET['exam_id'];

$sql_confirmname = "SELECT patient_details.patient_name, patient_details.phonenumber, "
        . "user_details.full_name, "
        . "exam_info.exam_name, exam_info.modality, exam_info.created_at, "
        . "reports.created_at, reports.report "
        . "FROM reports "
        . "INNER JOIN patient_details ON reports.patient_id=patient_details.patient_id "
        . "INNER JOIN user_details ON reports.reviewer_id=user_details.user_id "
        . "INNER JOIN exam_info ON reports.exam_id = exam_info.exam_id "
        . "WHERE reports.exam_id = '$id'";

$a_result = db_query($sql_confirmname);
$to_print = $a_result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/datepicker.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
</head>

<body>
<div class="section">
    
    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="row">
        <div class="col-md-6">           
                <div class="panel-body">
                    <pre>Patient's Name:           <b><?php echo $to_print["patient_name"];?></b></pre>
                    <pre>Patient's Contact Number: <b><?php echo $to_print["phonenumber"];?></b></pre>
                </div>              
        </div>
        <div class="col-md-6">   
            
                <div class="panel-body">
                    <pre>Report by:               <b><?php echo $_GET["writer"];?></b></pre>
                    <pre>Doctor's Contact Number: <b><?php echo $_GET["phone_number"];?></b></pre>
                </div>
        </div>                
        </div>
        </div>     
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="row">
        <div class="col-md-6">           
                <div class="panel-body">
                    <pre>Procedure: <b><?php echo $to_print["exam_name"];?></b></pre>
                    <pre>Modality: <b><?php echo $to_print["modality"];?></b></pre>
                </div>              
        </div>
        <div class="col-md-6">              
                <div class="panel-body">
                    <pre>Date of Examination: <b><?php echo $to_print["created_at"];?></b></pre>
                    <pre>Date of Report:     <b><?php echo $to_print["created_at"];?></b></pre>
                </div>
        </div>                
        </div>
        </div>     
    </div>
    
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4><b>Report:</b></h4>
                <p>
                    <?php echo $to_print["report"];?>
                </p>
            </div>
        </div>
    </div>
    
        <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <p>Name _____________________________________________________ Date and Time ____________________________________ Signature ______________________</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script>


