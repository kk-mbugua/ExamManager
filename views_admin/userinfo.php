<?php
//get user id from url
$identification = $_GET['id'];

//write the sql statement and run the query
$sql_user = "SELECT * FROM `patient_details` WHERE `patient_id` = '$identification'";
$a_user = db_query($sql_patient);
$this_user = $a_user->fetch_assoc();

?>
<div class="section">
  <div class="container">
           <div class="panel panel-default panel-faded">
                <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <h1>User Information</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <img src="assets/img/viewexam.png"
        class="center-block img-rounded img-responsive">
      </div>
      <div class="col-md-9">
         <div class="col-md-3">
        <dt>User's Names :</dt>
        </div>
        <div class="col-md-9">
        <dd><?php e($this_user["user_name"]);?></dd>
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
              <a href="newexam?patient_id=<?php  e($identification) ?>" class="btn btn-default">Schedule Exam</a>
              <a href="edit-patient?id=<?php e($identification);?>" class="btn btn-default">Edit Info</a>
            </div>
          </div>
        </div>
    <div class="row">
      <div class="col-md-12">
        <hr>
      </div>
    </div>
      </div>
    </div>
  </div>
</div>
<div class="section">
      <div class="container">

           <div class="panel panel-default panel-faded">
                <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <h3>Patients Exam</h3>
          </div>
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>Patient Names</th>
              <th>Procedure</th>
              <th>modality</th>
              <th>Requesting Doctor</th>
              <th>Date and Time</th>
              <th>action 1</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $schedule->fetch_assoc()) { ?>
            <tr> 
            <td><?php e($row["patient_name"])?></td>
            <td><?php e($row["exam_name"])?></td>
            <td><?php e($row["modality"])?></td>
            <td><?php e($row["req_physician"])?></td>
            <td><?php e($row["date_time"])?></td>
            <td><a class="btn btn-default" href="viewexams?id=<?php e($row['exam_id']);?>">view</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
