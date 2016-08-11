<?php
$problem_wrongpass = "";
$problem_mismatch = "";

$sql_settings = "SELECT * FROM user_details WHERE `user_id` = " . $_SESSION[user_id];
$Settings = db_query($sql_settings);
$settings = $Settings->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    
    if (get_input('old_pass') || get_input('new_pass') || get_input('confirm_pass')) {
        $sql_settings = "SELECT password FROM user_details WHERE `user_id` = " . $_SESSION[user_id];
        $Pass = db_query($sql_settings);
        $pass = $Pass->fetch_assoc();
        
        if (md5(get_input('old_pass')) == $pass['password']) {
            
            if (get_input('new_pass') == get_input('confirm_pass')) {
            $password = md5(get_input('new_pass'));
            $full_name = get_input('full_name');
            $user_name = get_input('user_name');
            $sql_savesettings1 = "UPDATE `user_details` SET `full_name`='$full_name',`user_name`='$user_name', `password`='$password' WHERE `user_id` = " . $_SESSION['user_id']; 
            db_query($sql_savesettings1);
            
            } else {
                $problem_mismatch = "the input passwords need to match";
            }
        } else {
            $problem_wrongpass = "this is not your original password";
        } 
    } else {
        $password   = $settings['password'];
        $full_name  = get_input('full_name');
        $user_name  = get_input('user_name');
        $sql_savesettings1 = "UPDATE `user_details` SET `full_name`='$full_name',`user_name`='$user_name', `password`='$password' WHERE `user_id` = " . $_SESSION['user_id']; 
        header("Location: /ExamManager/");
    }
}
?>

<div class="section">
      <div class="container">

  <div class="panel panel-default panel-faded">
                <div class="panel-body">
           <div class="row">
          <div class="col-md-12">
            <h1>Edit Your Details</h1>
          </div>
        </div>
            <form role="form" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Full Name</label>
                          <input class="form-control" type="text" name="full_name" value="<?php echo $settings['full_name'];?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Username</label>
                          <input class="form-control" type="text" name="user_name" value="<?php echo $settings['user_name'];?>">
                        </div>
                    </div>
                </div>
                <h2>Change Password</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Old Password </label>
                          <input class="form-control" type="password" name="old_pass"> <?php echo "$problem_wrongpass"; $problem_wrongpass = "";?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">New Password</label>
                          <input class="form-control" type="password" name="new_pass">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Repeat Password </label>
                          <input class="form-control" type="password" name="confirm_pass"> <?php echo "$problem_mismatch"; $problem_mismatch = "";?>
                        </div>
                    </div>
                </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
      </div> 
      </div>
      </div>
      </div>