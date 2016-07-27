 <?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
//---------helper functions--------------------
 //access _POST array
function get_input($input) {
    $output = ($_POST["$input"]);
    $output = strip_tags($output);
    $output = stripslashes($output);
   // $output = mysqli_real_escape_string($output);
    return $output;
  }

//load data from forms into variables
$user_name  = get_input("user_name");
$password   = md5(get_input("password"));

//import database configuration and open the db
include ("./app/conn_db.php");
db_open();

//the sql statement and querrying the database
$sql_login = "SELECT * FROM user_details WHERE user_name = '$user_name'";
$a_user = $conn->query($sql_login);
$this_user = $a_user->fetch_assoc();

//check if password is a match
if ($password == $this_user["password"]) {
    $_SESSION["user_name"] = $this_user["user_name"];
    $_SESSION["user_id"] = $this_user["user_id"];
    $_SESSION["admin"] = $this_user["admin"];
            
    header("Location: http://localhost/exam/");
  }
else {
    echo '

<div class="section">
    <div class="container"><div class="row">
          <div class="col-md-12">
            <div class="alert alert-danger alert-info">
              <strong>Error!</strong>wrong username or password.</div>
          </div>
        </div>
        </div>
        </div>';
}

db_close();
}
?>
<!DOCTYPE html>

<div class="section">
    <div class="container">
       <div class="col-md-offset-4  col-md-4"><br>
          <div class="panel panel-default panel-faded">
            <div class="panel-body">
            <h1>Login</h1>
              <form method="post">
                <div class="form-group">
                  <label>Username</label>
                    <input type="text" class="form-control" name="user_name" placeholder="username">
                </div>
                <div class="form-group">
                  <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                      <label>
                        <input type="checkbox" name="remember" value="yes"> Remember me
                      </label>
                  </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Login</button>
                  </div>
                </div>
              </form>
           </div>
        </div>
      </div>
    </div>
  </div>