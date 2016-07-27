<?php
if(isset($_GET['id'])){
  //get user id from url
$identification = $_GET['id'];

//write the sql statement and run the query
$sql_user = "SELECT * FROM `user_details` WHERE `user_id` = '$identification'";
$a_user = db_query($sql_user);
$this_user = $a_user->fetch_assoc();

$name = $this_user['full_name'];
$names= explode(" ", $this_user['user_name']);
$names[0] = rtrim($names[0], ",");

$admin = $this_user['admin'];
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    
    //combining user name
    $f_name = get_input("f_name");
    $m_name = get_input("m_name");
    $l_name = get_input("l_name");
    $full_name = $l_name . ", " . $f_name . " " . $m_name;
    
    $user_name = strtolower(substr($f_name, 0,1). $l_name);
    
    //autogenerate first password
    $password = md5($user_name); 
    
    //is admin
    if (get_input("admin") > 0) {
        $admin = get_input("admin");
    }
    else {
        $admin = 0;
    }
        
    //sql statement to insert data into table and query the database
    $sql_insert_new_user = 
            "INSERT INTO user_details (full_name, user_name, admin, password) VALUES ('$full_name', '$user_name','$admin', '$password')";
    db_query($sql_insert_new_user);
    
    header('Location: /ExamManager/users'. $id);

} 
 ?>
    <div class="section">
      <div class="container">
         <div class="panel panel-default panel-faded">
            <div class="panel-body">
           <div class="row">
          <div class="col-md-12">
            <h1>Edit Patient</h1>
          </div>
        </div>
            <form role="form" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">First Name</label>
                          <input class="form-control" type="text" name="f_name" value="<?php echo $names[1];?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Middle Names</label>
                          <input class="form-control" type="text" name="m_name" value="<?php echo $names[2];?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Last Names</label>
                          <input class="form-control" type="text" name="l_name" value="<?php echo $names[0];?>">
                        </div>
                    </div>
                </div>
                <div class="row i">
                    Give user administrative privileges<input type="checkbox" name="admin" value="1" <?php if($admin > 0) {echo "checked";}?>>
                </div>
                
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div> 
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $('#datepicker').datepicker({format: 'mm-dd-yyyy'});
    </script>