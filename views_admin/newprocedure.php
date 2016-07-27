<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  
    //define variables for input
    $procedure_name     = get_input("procedure_name");
    $modality           = get_input("modality");
    $price              = get_input("price");
    $duration           = get_input("duration");
    
    $created_by = $_SESSION["full_name"];
    
    //sql statement to insert data into table and query the database
    $sql_insert_new_procedure = 
            "INSERT INTO procedures (procedure_name, modality, price, duration, created_by) VALUES ('$procedure_name', '$modality','$price', '$duration', '$created_by')";
    db_query($sql_insert_new_procedure);
    
    header('Location: /ExamManager/procedures');

} 


//pull list of modalities from datbase
$sql_modalities = "SELECT * FROM modalities";
$modalities = db_query($sql_modalities);
?> 

<div class="section">
<div class="container">

  <div class="panel panel-default panel-faded">
    <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <h1>New Procedure</h1>
          </div>
        </div>
            <form role="form" method="post">
                <div class="form-group">
                    <label class="control-label">Procedure Name<sup>*</sup></label>
                  <input class="form-control" type="text" name="procedure_name" required>
                </div>
                <div class="form-group">
                   <label class="control-label">Modality<sup>*</sup></label>
                   <select class="form-control" name="modality" required>
                       <option>Select modality</option>
                   <?php 
                   while ($row = $modalities->fetch_assoc()) {
                       ?>
                       <option value="<?php echo $row["modality_abbr"];?>"><?php echo $row["modality_abbr"];?></option>
                   <?php }
                   ?>
                   </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Price</label>
                  <input class="form-control" type="text" name="price">
                </div>
                <div class="form-group">
                    <label class="control-label">Duration (in minutes)</label>
                  <input class="form-control" type="text" name="duration">
                </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </div> 
  </div>
          <p>*  Required field to fill</p>
</div>
</div>