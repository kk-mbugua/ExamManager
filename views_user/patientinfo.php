<?php
//get user id from url
 $identification = $_GET['id'];

//write the sql statement and run the query
$sql_patient = "SELECT * FROM patient_details WHERE patient_id = '$identification'";
$a_patient = db_query($sql_patient);
$this_patient = $a_patient->fetch_assoc();
//write the sql statement and run the query
$sql_schedule = "SELECT exam_info.exam_id, patient_details.patient_name, exam_info.req_physician, exam_info.exam_name, exam_info.modality, exam_info.created_at  FROM exam_info INNER JOIN patient_details ON exam_info.patient_id=patient_details.patient_id where exam_info.patient_id='$identification'";
$schedule = db_query($sql_schedule);

?>
<div class="section">
  <div class="container">
           <div class="panel panel-default panel-faded">
                <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <h1>Patient Information</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <img src="assets/img/viewexam.png"
        class="center-block img-rounded img-responsive">
      </div>
      <div class="col-md-9">
         <div class="col-md-3">
        <dt>Patient's Names :</dt>
        </div>
        <div class="col-md-9">
        <dd><?php echo $this_patient["patient_name"];?></dd>
        </div>
        <div class="col-md-3">
              <dt>Date of Birth</dt>
        </div>
        <div class="col-md-9">
              <dd><?php echo $this_patient["birthday"];?></dd>
        </div>
        <div class="col-md-3">
              <dt>gender</dt>
        </div>
        <div class="col-md-9">
              <dd><?php echo $this_patient["gender"];?></dd>
        </div>
        <div class="col-md-3">
              <dt>mobile No.</dt>
        </div>
        <div class="col-md-9">
              <dd><?php echo $this_patient["phonenumber"];?></dd>
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
              <a href="newexam?patient_id=<?php echo $identification ?>" class="btn btn-default">Schedule Exam</a>
              <a href="edit-patient?id=<?php echo $identification;?>" class="btn btn-default">Edit Info</a>
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
            <?php
             while ($row = $schedule->fetch_assoc()) {
                ?>
            <tr> 
            <td><?php echo $row["patient_name"]?></td>
            <td><?php echo $row["exam_name"]?></td>
            <td><?php echo $row["modality"]?></td>
            <td><?php echo $row["req_physician"]?></td>
            <td><?php echo $row["created_at"]?></td>
            <td><a class="btn btn-default" href="examinfo?id=<?php echo $row['exam_id'];?>">view</a></td>
            </tr>
            <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>