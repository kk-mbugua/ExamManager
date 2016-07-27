<?php 

//write the sql statement and run the query
$sql_procedures = "SELECT * FROM procedures";
$procedure = db_query($sql_procedures);

?>

<div class="section">
      <div class="container">
      <div class="panel panel-default panel-faded">
                <div class="panel-body">
        <div class="row">
                     
                    <div class="col-md-12">
                        <img src="assets/img/procedures.svg" class="img-responsive" width="125" height="125">
                    </div> 
                    <div class="col-md-12">
                        <h1>Procedures</h1>
                    </div> 
                </div> <br>
            <div class="row">
                <a class="btn btn-default" href="newprocedure">Add New Procedure</a>
                <div class="col-md-5">
                  <form role="form" method="post">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Enter Procedure Name">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">search</button>
                        </span>
                      </div>
                    </div>
                  </form>
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
                          <th>Procedure Name</th>
                          <th>Modality</th>
                          <th>Price</th>
                          <th>Duration (minutes)</th>
                      </tr>  
                    </thead>
                    <tbody>
                   <?php 
                   while ($row = $procedure->fetch_assoc()) {
                       ?>
                    <tr>
                        <td><?php echo $row["procedure_name"];?></td>
                        <td><?php echo $row["modality"];?></td>
                        <td><?php echo $row["price"];?></td>
                        <td><?php echo $row["duration"];?></td>
                        <td><a class="btn btn-default" title="edit" href="edit_procedure?id=<?php echo $row['procedure_id'];?>"> <img src="assets/img/edit.png"></a></td>
                        <td><a class="btn btn-default" title="delete" href="edit_user?id=<?php echo $row['user_id'];?>"> <img src="assets/img/delete.png"></a></td>
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

