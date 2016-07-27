

<?php

if(isset($_GET['patient_id'])){
 $identification = $_GET['patient_id'];
  $user_id =  $_SESSION["user_id"];
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

//---------helper functions--------------------
 //access _POST array
function get_input($input) {
    $output = ($_POST["$input"]);
    $output = strip_tags($output);
    $output = stripslashes($output);
    return $output;
}

$req_doctor     =   get_input("req_doctor");
//load data from forms into variables  
$id = uniqid();  
$group          =   get_input("group");
$exam_name      =   get_input("procedure");
$description    =   get_input("description");
$amount    =   get_input("amount");
$receipt    =   get_input("receipt");

//get the database cofiguration
include ("./app/conn_db.php");

//open the db
db_open();

//sql statement to insert data into table
$sql_insert_new_exam = 
        "INSERT INTO exam_info(exam_id, performer_id, patient_id, req_physician, modality, exam_name, exam_reason, receipt, amount) VALUES ('$id','$user_id','$identification','$req_doctor','$group','$exam_name','$description', '$receipt', $amount)";


//qureying the DATABASE
db_query($sql_insert_new_exam);

//close database
db_close();

   header('Location: viewexams?id='. $id);

}
?>


<div class="section">
  <div class="container">

  <div class="panel panel-default panel-faded">
                <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <h1>New Exam</h1>
      </div>
    </div>
    <form role="form" method="post" class="col-md-12">
      <div class="row">
           <div class="col-md-12">
             <div class="form-group">
                <label class="control-label">Requesting Doctor</label>
                 <input class="form-control" type="text" name="req_doctor">
             </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Modality</label>
              <select class="form-control" name="group">
                <option value=""></option>
                <option value="MX">MX</option>
                <option value="US">US</option>
              </select>
            </div>
          </div>
          <div class="col-md-8">
           <div class="form-group">
            <label class="control-label">Procedure</label>
            <input class="form-control" type="text" name="procedure" >
           </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
             <div class="form-group">
                <label class="control-label">Description.</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
             </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
             <div class="form-group">
                <label class="control-label">Amount.</label>
                <input class="form-control" type="text" name="amount">
             </div>
           </div>

          <div class="col-md-6">
             <div class="form-group">
                <label class="control-label">Receipt No.</label>
                <input class="form-control" type="text" name="receipt">
             </div>
           </div>
        </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
</div>
</div>
</div>
<script type="text/javascript">
  $('#datepicker').datepicker({
        format: 'mm-dd-yyyy'
      });
</script>