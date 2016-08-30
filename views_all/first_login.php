<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

if(get_input("newpass") != get_input("confirmpass")){
    $passerror = "passwords have to match";
}
else {    
    //set variables for the sql
    $newpassword = md5(get_input("newpass"));
    $user_id = $_SESSION["user_id"];

    $sql_first_login = "UPDATE `user_details` SET `first_login` = '1', `password` = '$newpassword' WHERE `user_details`.`user_id` = '$user_id'";
    db_query($sql_first_login);
    
    $_SESSION["first_login"] = 1;
    
    header("Location: /ExamManager/");
}
}
?>

<div class="section">
    <div class="container">
       <div class="col-md-offset-4  col-md-4"><br>
          <div class="panel panel-default panel-faded">
            <div class="panel-body">
            <h2><?php e($_SESSION["full_name"])?></h2>
            <h3>Karibu</h3>
            <p>Please change your password</p>
            <p><?php if(isset($passerror)){e($passerror);}?></p>
            <form method="post">
                <div class="form-group">
                  <label>New password</label>
                  <input type="password" styclass="form-control" name="newpass" placeholder="New password" required>
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" styclass="form-control" name="confirmpass" placeholder="Confirm new password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Set new password</button>
                </div>
            </form>
            <a href="logout">Leave without changing password</a>
             </div>
           </div>
        </div>
    </div>
</div>