<?php
//days
function cal_days() {
    echo ("<option value=\"\">day</option><br>");
    for($day = 1; $day <= 31; $day++) {
        echo ("<option value=\"$day\">$day</option<br>");
    }
}
//months
function cal_months() {
    $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");

    echo ("<option value=\"\">month</option><br>");
    for($month = 0; $month <= 11; $month++) {
         $month_value = $month + 1;
        echo ("<option value=\"$month_value\">$months[$month]</option<br>");
    }
}
//years
function cal_years() {
    echo ("<option value=\"\">year</option><br>");
    for($year = date(Y); $year >= 1900 ; $year--) {
        echo ("<option value=\"$year\">$year</option<br>");
    }
}
?>



<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    
    //---------helper functions-------------------- 
    //access _POST array
    function get_input($input) {
        $output = ($_POST["$input"]);
    $output = strip_tags($output);
    $output = stripslashes($output);
    return $output;
    }
    //patient id generator
    $id = uniqid();
    //load data from forms into variables
    $gender      =  get_input("gender");
    $status      =  get_input("status");
    $phone_num   =  get_input("phone_num");
    $nat_id      =  get_input("alt_num");
    
    //combining patients name
    $f_name = get_input("f_name");
    $m_name = get_input("m_name");
    $l_name = get_input("l_name");
    $patient_name = $l_name . ", " . $f_name . " " . $m_name;
    
    //make birthday format(month-day_year)
    $birthday       = get_input("birthday");
    $birthday = date("y-m-d", strtotime($birthday));
    //get the database cofiguration and open the databse
    include ("./app/conn_db.php");
    db_open();
    
    //sql statement to insert data into table and query the database
    $sql_insert_new_patient = 
            "INSERT INTO patient_details (patient_id, patient_name, gender, birthday, phonenumber, national_id, status) VALUES ('$id','$patient_name', '$gender', '$birthday','$phone_num', '$nat_id', '$status')";
    db_query($sql_insert_new_patient);
    
    //close database
    db_close();
    header('Location: /ExamManager/patientinfo?id='. $id);

}   
?> 
<div class="section">
      <div class="container">

  <div class="panel panel-default panel-faded">
                <div class="panel-body">
           <div class="row">
          <div class="col-md-12">
            <h1>New Patient</h1>
          </div>
        </div>
            <form role="form" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">First Name</label>
                          <input class="form-control" type="text" name="f_name">
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
                          <label class="control-label">Last Name</label>
                          <input class="form-control" type="text" name="l_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                       <div class="form-group">
                          <label class="control-label">Gender</label>
                          <select class="form-control" name="gender">
                              <option value=""></option>
                              <option value="M">Male</option>
                              <option value="F">Female</option>
                          </select>
                       </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Date of Birth</label>
                          <input class="form-control" type="text" id="datepicker" name="birthday">
                        </div>
                    </div>
                     <div class="col-md-4">
                       <div class="form-group">

                          <label class="control-label">status</label>
                          <select class="form-control" name="status">
                              <option value=""></option>
                              <option value="1">in Patient</option>
                              <option value="0">out Patient</option>
                          </select>
                       </div>
                    </div>           
                </div>
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label class="control-label">Phone No.</label>
                          <input class="form-control" type="text" name="phone_num">
                       </div>
                    </div>
                       <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">National ID / Passport No.</label>
                              <input class="form-control" type="text" name="alt_num">
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