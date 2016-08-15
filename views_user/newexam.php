
<?php

if(isset($_GET['patient_id'])){
 $identification = $_GET['patient_id'];
  $user_id =  $_SESSION["user_id"];
}

//pull list of modalities from datbase
$sql_modalities = "SELECT * FROM modalities";
$modalities = db_query($sql_modalities);

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

$req_doctor     =   get_input("req_doctor");
//load data from forms into variables  
$id = uniqid();  
$modality          =   get_input("modality");
$exam_name      =   get_input("procedure");
$description    =   get_input("description");
$amount    =   get_input("amount");
$receipt    =   get_input("receipt");
$repid = uniqid();

//sql statement to insert data into table
$sql_insert_new_exam = 
        "INSERT INTO exam_info(exam_id, performer_id, patient_id, req_physician, modality, exam_name, exam_reason, receipt, amount) VALUES ('$id','$user_id','$identification','$req_doctor','$modality','$exam_name','$description', '$receipt', $amount)";
$report_insert = "INSERT INTO reports(id, exam_id, patient_id) VALUES ('$repid','$id','$identification')";

//qureying the DATABASE
db_query($sql_insert_new_exam);
db_query($report_insert);

   header('Location: examinfo?id='. $id);

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
                <label class="control-label">Requesting Doctor<sup>*</sup></label>
                <input class="form-control" type="text" name="req_doctor" required>
             </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Modality<sup>*</sup></label>
                <select class="form-control" name="modality" required>
                    <option>Select modality</option>
                <?php 
                while ($row = $modalities->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["modality_abbr"];?>"><?php echo $row["modality_abbr"];?></option>
                <?php }
                ?>
                </select>
            </div>
          </div>
          <div class="col-md-8">
           <div class="form-group">
            <label class="control-label">Procedure<sup>*</sup></label>
            <input class="form-control" type="text" name="procedure" required>
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
                <label class="control-label">Amount<sup>*</sup></label>
                <input class="form-control" type="text" name="amount" required>
             </div>
           </div>

          <div class="col-md-6">
             <div class="form-group">
                <label class="control-label">Receipt No.<sup>*</sup></label>
                <input class="form-control" type="text" name="receipt" required>
             </div>
           </div>
        </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>                        
  </div>
</div>
      <p>*  Required field to fill</p>
</div>
</div>
<script type="text/javascript">
  $('#datepicker').datepicker({
        format: 'mm-dd-yyyy'
      });
</script>