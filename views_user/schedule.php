<?php 

//write the sql statement and run the query
$sql_schedule = "SELECT exam_info.exam_id, patient_details.patient_name, exam_info.req_physician, exam_info.exam_name, exam_info.modality, exam_info.date_time  FROM exam_info INNER JOIN patient_details ON exam_info.patient_id=patient_details.patient_id";

$schedule = db_query($sql_schedule);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $search = ($_POST["search"]);
    
    $sql_patient_search = "SELECT exam_info.exam_id, patient_details.patient_name, exam_info.req_physician, exam_info.exam_name, exam_info.modality, exam_info.date_time  FROM exam_info INNER JOIN patient_details ON exam_info.patient_id=patient_details.patient_id WHERE patient_name LIKE '%$search%' OR exam_name LIKE '%$search%' OR modality LIKE '%$search%'";
    $schedule = db_query($sql_patient_search);
    }
    
?>
<div class="section">
      <div class="container">

           <div class="panel panel-default panel-faded">
                <div class="panel-body">
          <div class="row">
         
          </div>
        <div class="row">
          <div class="col-md-12">
            <h1>Schedule Exam</h1>
          </div>
           <div class="col-md-5">
            <form role="form" method="post">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" name="search" placeholder="Enter Patient Name">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">search</button>
                  </span>
                </div>
              </div>
            </form>
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
              <th>action 1</th>
            </tr>
          </thead>
          <tbody>
            <?php
             while ($row = $schedule->fetch_assoc()) {
                ?>
            <tr> 
            <td><?php echo $row["exam_id"]?></td>
            <td><?php echo $row["patient_name"]?></td>
            <td><?php echo $row["exam_name"]?></td>
            <td><?php echo $row["modality"]?></td>
            <td><?php echo $row["req_physician"]?></td>
            <td><?php echo $row["date_time"]?></td>
            <td><a class="btn btn-default" href="viewexams?id=<?php echo $row['exam_id'];?>">view</a></td>
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