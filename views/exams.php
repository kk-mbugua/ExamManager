<?php 
//retreive database config settings and open the database
require "./app/conn_db.php";

db_open();
//write the sql statement and run the query
$sql_schedule = "SELECT exam_info.exam_id, patient_details.patient_name, exam_info.req_physician, exam_info.exam_name, exam_info.modality, exam_info.scheduled_date_time FROM exam_info INNER JOIN patient_details ON exam_info.patient_id=patient_details.patient_id ORDER BY exam_info.scheduled_date_time WHERE scheduled_date_time >=CURDATE()";

$schedule = $conn->query($sql_schedule);


db_close();

?>
<div class="section">
      <div class="container">

           <div class="panel panel-default panel-faded">
                <div class="panel-body">
                
        
        <div class="row">
          <div class="col-md-12">
            <h1>Schedule Exam</h1>
          </div>
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>Exam ID</th>
              <th>Patient Names</th>
              <th>Procedure</th>
              <th>modality</th>
              <th>Requesting Doctor</th>
              <th>Date and Time</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($row = $schedule->fetch_assoc()) {
                ?>
            <tr> 
            <td><?php echo $row["exam_id"]?></td>
            <td><?php echo $row["patient_name"]?></td>
            <td><?php echo $row["exam_name"]?></td>
            <td><?php echo $row["modality"]?></td>
            <td><?php echo $row["req_physician"]?></td>
            <td><?php echo $row["scheduled_date_time"]?></td>
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