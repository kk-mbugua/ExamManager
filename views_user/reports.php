<?php 

//write the sql statement and run the query
$sql_schedule = "SELECT exam_info.exam_id, patient_details.patient_name, exam_info.req_physician, exam_info.exam_name, exam_info.report, exam_info.datetime FROM exam_info INNER JOIN patient_details ON exam_info.patient_id=patient_details.patient_id ORDER BY exam_info.datetime where EXAM_INFO.report IS NOT NULL";
$schedule = db_query($sql_schedule);
;
?>
<div class="section">
      <div class="container">

           <div class="panel panel-default panel-faded">
                <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
              <ul class="media-list">
                 <?php 
             while ($row = $schedule->fetch_assoc()) {
                     ?>
                 <li class="col-md-12">
                  <div class="panel panel-default panel-faded">
                    <div class=" file-list">
                        <div class="media-body">
                          <a href="viewexams?id=<?php echo $row["exam_id"]?>"><h4 class="name"><?php echo $row["patient_name"];?></h4></a>
                          <div> mobile .No :<?php echo $row["doctor"];?></div>
                          <div> Date Of Birth:<?php echo $row["patients name"];?></div>
                        </div>
                    </div>
                  </div>
                 </li>
                 <?php }
                 ?>                 
               </ul>  
          </div>
        </div>
  </div>
</div>
</div>
</div>
       