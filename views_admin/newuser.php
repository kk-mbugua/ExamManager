<?php
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
    
    header('Location: /ExamManager/users');

}   
?> 
<div class="section">
      <div class="container">

  <div class="panel panel-default panel-faded">
                <div class="panel-body">
           <div class="row">
          <div class="col-md-12">
            <h1>New User</h1>
          </div>
        </div>
            <form role="form" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">First Name<sup>*</sup></label>
                          <input class="form-control" type="text" name="f_name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Middle Name</label>
                          <input class="form-control" type="text" name="m_name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Last Name<sup>*</sup></label>
                          <input class="form-control" type="text" name="l_name" required>
                        </div>
                    </div>
                </div>
                <div class="row i">
                <div class="col-md-12">
                    Give user administrative privileges<input type="checkbox" name="admin" value="1">
                    </div>
                </div>

              <button type="submit" class="btn btn-default">Submit</button>
            </form>
      </div> 
      </div>
          <p>*  Required field to fill</p>
      </div>
      </div>
      