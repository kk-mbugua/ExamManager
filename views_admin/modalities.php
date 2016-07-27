<?php 

//write the sql statement and run the query
$sql_modalities = "SELECT * FROM modalities";
$modality = db_query($sql_modalities);

//to delete a modality
if(isset($_GET['delete'])){
    $sql_deletemodality = "DELETE FROM `modalities` WHERE `modality_abbr` ='" . $_GET['delete'] . "'";
    db_query($sql_deletemodality);
    header('Location: /ExamManager/modalities');
}
?>

<div class="section">
      <div class="container">
      <div class="panel panel-default panel-faded">
                <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
                        <img src="assets/img/modality.svg" class=" img-responsive" width="125" height="125">
                    </div> 
                    <div class="col-md-12">
                        <h1>Modalities</h1>
                    </div>       
                </div> <br>
            <div class="row">
              <div class="col-md-12">
                <a class="btn btn-default" href="newmodality">Add New Modality</a>
                </div>
            </div>
        <div class="row">
          <div class="col-md-12">
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
                <table class ="table table-hover">
                    <thead>
                      <tr>
                          <th>Modality</th>
                          <th>Modality Full Name</th>
                          <th>Installation Date</th>
                          <th>Estimated Date of Next Service</th>
                      </tr>  
                    </thead>
                    <tbody>
                   <?php 
                   while ($row = $modality->fetch_assoc()) {
                       ?>
                    <tr>
                        <td><?php echo $row["modality_abbr"];?></td>
                        <td><?php echo $row["modality_name"];?></td>
                        <td><?php echo $row["install_date"];?></td>
                        <td><?php echo $row["next_service"];?></td>
                        <td><a class="btn btn-default" title="delete" href="modalities?delete=<?php echo $row['modality_abbr'];?>"> <img src="assets/img/delete.png"></a></td>
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

