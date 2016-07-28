<?php 
echo $page = isset($_GET['pg']) ? $_GET['pg']:1;
$start = ($page > 1) ?($page *12)-12 :0;
//write the sql statement and run the query
$sql_schedule = "SELECT patient_id, patient_name, phonenumber, birthday FROM patient_details LIMIT {$start} , 12";

$patient = db_query($sql_schedule);

if ($_SERVER["REQUEST_METHOD"] == "POST"  || isset($_GET['search'])) {
    $search = ($_POST["search"]);

    if(isset($_GET["search"])){
      $search=$_GET['search'];
    }
    $sql_patient_search = "SELECT patient_id, patient_name, phonenumber, birthday FROM patient_details WHERE patient_name LIKE '%$search%' OR national_id LIKE '%$search%' OR phonenumber LIKE '%$search%'  LIMIT {$start} , 12";
    $patient = db_query($sql_patient_search);
    }

?>
<div class="section">
      <div class="container">
        <div class="row">
        
          <div class="panel panel-default panel-faded">
          <div class="panel-body">
         <div class="col-md-12">
        
            <h1>Patients</h1>
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
              <ul class="media-list">
                 <?php 
                 while ($row = $patient->fetch_assoc()) {
                     ?>
                 <li class="col-md-6">
                  <div class="panel panel-default panel-faded">
                    <div class=" file-list">
                        <a class="pull-left img--space" href="patientinfo?id=<?php echo $row["patient_id"]?>"><img class="media-object" src="assets/img/avatar.jpg" height="79" width="79"></a>
                        <div class="media-body">
                          <a href="patientinfo?id=<?php echo $row["patient_id"]?>"><h4 class="name"><?php echo $row["patient_name"];?></h4></a>
                          <div> mobile .No :<?php echo $row["phonenumber"];?></div>
                          <div> Date Of Birth:<?php echo $row["birthday"];?></div>
                        </div>
                    </div>
                  </div>
                 </li>
                 <?php }
                 ?>                 
               </ul>  
          </div>
        </div>
        <?php 
            $result=db_query("SELECT COUNT(*) FROM patient_details;");
             $tot = $result->fetch_assoc();
             $total = ceil($tot["COUNT(*)"]/12);
        ?>
        <div class="row">
        <div class="col-md-12">
        <ul class="pagination">
        <?php for($x = 1;$x <= $total ; $x++): ?>
          <li><a href="patients?pg=<?php echo $x; ?>"><?php echo $x; ?></a></li>
        <?php endfor; ?>
        </ul>
        </div>
        </div>
      </div>
    </div>
