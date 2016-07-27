<?php
    include ("./app/conn_db.php");

if(isset($_GET['id'])){
  //get user id from url
$identification = $_GET['id'];

//retreive database config settings and open the database

db_open();
//write the sql statement and run the query
$sql_schedule = "SELECT * FROM `patient_details` WHERE `patient_id` = '$identification'";

$a_patient = $conn->query($sql_schedule);


db_close();

$this_patient = $a_patient->fetch_assoc();
$name =$this_patient['patient_name'];
 $names=explode(" ", $this_patient['patient_name']);
 $names[0]=rtrim($names[0], ",");

}
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    
    //---------helper functions-------------------- 
    //access _POST array
    function get_input($input) {
        $output = ($_POST["$input"]);
    $output = strip_tags($output);
    $output = stripslashes($output);
    return $output;
    }
    
    //load data from forms into variables
    $gender      =  get_input("gender");
    $status      =  get_input("status");
    $phone_num   =  get_input("phone_num");
    $nat_num     =  get_input("alt_num");
    
    //combining patients name
    $f_name = get_input("f_name");
    $m_name = get_input("m_name");
    $l_name = get_input("l_name");
    $patient_name = $l_name . ", " . $f_name . " " . $m_name;
    
    //make birthday format(month-day_year)
    $birthday       = get_input("birthday");
    $birthday = date("y-m-d", strtotime($birthday));

    //get the database cofiguration and open the databse
    db_open();
    
    //sql statement to insert data into table and query the database
    $sql_insert_new_patient = 
            "UPDATE patient_details SET patient_name='$patient_name', gender='$gender', birthday='$birthday', phonenumber='$phone_num', national_id='$nat_num', status='$status' WHERE patient_id='$identification'";
    db_query($sql_insert_new_patient);
    
    //close database
    db_close();
    header('Location: patientinfo?id='.$identification);
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
                          <label class="control-label">Frist Name</label>
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
                <div class="row">
                    <div class="col-md-4">
                       <div class="form-group">
                          <label class="control-label">Gender</label>
                          <select class="form-control" name="gender">
                              <option  value="<?php echo $this_patient["gender"];?>"><?php echo $this_patient["gender"];?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                          </select>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <div class="form-group">
                        <label class="control-label">Date of birth</label>
                        <input class="form-control" type="text" name="birthday" id="datepicker" value="<?php echo $this_patient["birthday"];?>">
                       </div>
                    </div>

                     <div class="col-md-4">
                       <div class="form-group">
                          <label class="control-label">status</label>
                          <select class="form-control" name="status">
                              <option  value="<?php echo $this_patient["status"];?>"><?php echo $this_patient["status"];?></option>
                              <option value="inpatient">in Patient</option>
                              <option value="outpatient">out Patient</option>
                          </select>
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label class="control-label">Phone No.</label>
                          <input class="form-control" type="text" name="phone_num" value="<?php echo $this_patient["phonenumber"];?>">
                       </div>
                    </div>
                       <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Alternate No.</label>
                              <input class="form-control" type="text" name="alt_num" value="<?php echo $this_patient["national_id"];?>">
                            </div>
                        </div>
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