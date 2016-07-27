<?php 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $select = "SELECT * FROM exam_info INNER JOIN patient_details ON exam_info.patient_id=patient_details.patient_id INNER JOIN reports ON exam_info.exam_id=reports.exam_id where exam_info.exam_id='$id'";
    
    $showreport=false;

//get the database cofiguration
include ("./app/conn_db.php");

//open the db
db_open();
$exam = $conn->query($select);

db_close();

$results = $exam->fetch_assoc();

}
?>
  <div class="section">
      <div class="container">

           <div class="panel panel-default panel-faded">
                <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <h1>Exam</h1>
          </div>
        </div>
        <div class="row">
         
      <div class="col-md-12">
        <div class="col-md-3">
        <dt>Pateint Name :</dt>
        </div>
        <div class="col-md-9">
        <dd><a href="patientinfo?id=<?php echo $results['patient_id'];?>"><?php echo $results['patient_name'];?></a></dd>
        </div>
         <div class="col-md-3">
        <dt>Procedure :</dt>
        </div>
        <div class="col-md-9">
        <dd><?php echo $results['exam_name'];?></dd>
        </div>
         <div class="col-md-3">
        <dt>Doctor :</dt>
        </div>
        <div class="col-md-9">
        <dd><?php echo $results['req_physician'];?></dd>
        </div>
      <div class="col-md-3">
        <dt>date Time :</dt>
        </div>
        <div class="col-md-9">
        <dd><?php echo $results['date_time'];?></dd>
        </div>
        <div class="col-md-3">
        <dt>decsription :</dt>
        </div>
        <div class="col-md-9">
        <dd><?php echo $results['exam_reason'];?></dd>
        </div>
      </div>
      </div>
          <div class="row">
          <div class="col-md-12">
            <hr>
          </div>
          </div>
           <div class="row">
          <div class="col-md-12">
            <div class="btn-group">
              <a href="edit-exam?id=<?php echo $results['exam_id'];?>" class="btn btn-default">Edit Exam</a>
              <?php if($results['report']): ?>
              <a href="editreport?exam_id=<?php echo $results['exam_id'];?>" class="btn btn-default"> Edit Report</a>
            <?php else: ?>
              <a href="report?exam_id=<?php echo $results['exam_id'];?>" class="btn btn-default">Make Report</a>
            <?php endif; ?>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <h3>Exam Report</h3>
          <?php if($results['report']): ?>
            <p><?php echo  strip_tags(stripslashes($results['report']));?></p>
          <?php else: ?>
            <p>Report has not been made</p>
          <?php endif; ?>
          </div>
        </div>
      </div>
</div>
</div>