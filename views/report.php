<?php 

include ("./app/conn_db.php");

if(isset($_GET['exam_id'])){
 $exam_id = $_GET['exam_id'];
 $select = "SELECT  patient_details.patient_name, patient_details.patient_id,exam_info.req_physician, exam_info.exam_name, exam_info.exam_id,exam_info.report  FROM exam_info INNER JOIN patient_details ON exam_info.patient_id=patient_details.patient_id WHERE exam_id='$exam_id'";
db_open();
$aexam = $conn->query($select);

$_exam = $aexam->fetch_assoc();

db_close();
}

if ($_POST) {

//---------helper functions--------------------
 //access _POST array
function get_input($input) {
    $output = ($_POST["$input"]);
    $output = strip_tags($output);
    $output = stripslashes($output);
    return $output;
}

//load data from forms into variables 
$id = uniqid(); 
$user_id = $_SESSION["user_id"];
$report    =   get_input("report");
$patient_id = $_exam['patient_id'];
//open the db
db_open();

//sql statement to insert data into table
$sql_insert_report = "INSERT INTO reports(id, reviewer_id, exam_id, patient_id, report) VALUES ('$id','$user_id','$exam_id ','$patient_id','$report')";

//qureying the DATABASE
db_query($sql_insert_report);

//close database
db_close();
header('Location: viewexams?id='.$exam_id);
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
            <form method="post">
              <div class="form-group">
                <label class="control-label">Report</label>
                <textarea class="form-control" name="report" rows="10"><?php echo $_exam['report']; ?></textarea>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>