<?php

if(isset($_GET['id'])){
  //get user id from url
$identification = $_GET['id'];

//write the sql statement and run the query
$sql_procedure = "SELECT * FROM `procedures` WHERE `procedure_id` = '$identification'";
$a_procedure = db_query($sql_procedure);
$this_procedure = $a_procedure->fetch_assoc();

//pull list of modalities from datbase
$sql_modalities = "SELECT * FROM modalities";
$modalities = db_query($sql_modalities);
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  
    //define variables for input
    $procedure_name     = get_input("procedure_name");
    $modality           = get_input("modality");
    $price              = get_input("price");
    $duration           = get_input("duration");
    
    //sql statement to insert data into table and query the database
    $sql_insert_new_procedure = 
            "INSERT INTO procedures (procedure_name, modality, price, duration, created_by) VALUES ('$procedure_name', '$modality','$price', '$duration', '$created_by')";
    db_query($sql_insert_new_procedure);
    
    
    header("Location: /ExamManager/procedures");
} 
?>

<div class="section">
<div class="container">

  <div class="panel panel-default panel-faded">
    <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <h1>Edit Procedure</h1>
          </div>
        </div>
            <form role="form" method="post">
                <div class="form-group">
                    <label class="control-label">Procedure Name<sup>*</sup></label>
                    <input class="form-control" type="text" name="procedure_name" value="<?php  e($this_procedure["procedure_name"]);?>">
                </div>
                <div class="form-group">
                   <label class="control-label">Modality<sup>*</sup></label>
                   <select class="form-control" name="modality">
                       <option value="<?php  $this_procedure["modality"];?>"><?php  e($this_procedure["modality"]);?></option>
                   <?php 
                   while ($row = $modalities->fetch_assoc()) {
                       ?>
                       <option value="<?php  e($row["modality_abbr"]);?>"><?php  e($row["modality_abbr"]);?></option>
                   <?php }
                   ?>
                   </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Price</label>
                  <input class="form-control" type="text" name="price" value="<?php  e($this_procedure["price"]);?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Duration (in minutes)</label>
                  <input class="form-control" type="text" name="duration" value="<?php e($this_procedure["duration"]);?>">
                </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </div> 
  </div>
          <p>*  Required field to fill</p>
</div>
</div>
      