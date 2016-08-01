<?php 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $select = "SELECT * FROM exam_info INNER JOIN patient_details ON exam_info.patient_id=patient_details.patient_id INNER JOIN reports ON exam_info.exam_id=reports.exam_id where exam_info.exam_id='$id'";
    
    $showreport=false;

$exam = db_query($select);

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
        <dt>Patient Name :</dt>
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
        <dd><?php echo $results['created_at'];?></dd>
        </div>
        <div class="col-md-3">
        <dt>description :</dt>
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
               <?php if($results['exam_done']==0): ?>
              <a href="editreport?exam_id=<?php echo $results['exam_id'];?>" class="btn btn-default">Take Exam</a>
              <?php else: ?>
              <?php if($results['report_done']==1): ?>
              <a href="editreport?exam_id=<?php echo $results['exam_id'];?>" class="btn btn-default"> Edit Report</a>
              <a href="print_report?exam_id=<?php echo $results['exam_id'];?>" class="btn btn-default">Print Report</a>
            <?php else: ?>
              <a href="editreport?exam_id=<?php echo $results['exam_id'];?>" class="btn btn-default">Make Report</a>
            <?php endif; ?>
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