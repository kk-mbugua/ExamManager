<?php

if(isset($_GET['exam_id'])){
 $id = $_GET['exam_id'];
 $select = "SELECT * FROM exam_info INNER JOIN patient_details ON exam_info.patient_id=patient_details.patient_id INNER JOIN reports ON exam_info.exam_id=reports.exam_id where exam_info.exam_id='$id'";
$aexam = db_query($select);

$_exam = $aexam->fetch_assoc();
  if($_exam['exam_done']==0){
      header('Location: examinfo?id='. $id);
  }
}

if ($_POST) {

//load data from forms into variables    
$report    =   get_input("report");

//sql statement to insert data into table
$sql_edit_exam = "UPDATE reports SET report='$report' WHERE exam_id ='$id'";
db_query($sql_edit_exam);
$report_taken = "UPDATE exam_info SET report_done = 1  WHERE exam_id ='$id'";
db_query($report_taken);

header('Location: examinfo?id='. $id);
}
?>
    <div class="section">
      <div class="container">

           <div class="panel panel-default panel-faded">
                <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <h1>EXAM ID : <?php echo $_exam["exam_id"];?></h1>
          </div>
          <div class="col-md-12">
            <p>patient : <?php echo $_exam["patient_name"];?></p>
            <p>procedure : <?php echo $_exam["exam_name"];?></p>
            <p>doctor : <?php echo $_exam["req_physician"];?></p>
          </div>

          <div class="col-md-12">
            <hr>
            <div class="btn-group">
              <a href="#" class="btn btn-default">view Image</a>      
            </div>
             <hr>
          </div>
          <div class="col-md-12">
            <form method="post">
              <div class="form-group">
                <label class="control-label">Report</label>
                <textarea class="form-control" name="report" rows="10"><?php echo $_exam["report"];?></textarea>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>