<?php
// accesses post or get array and makes inputed data more secure
function get_input($input) {
    if ( isset($_POST["$input"]) ) {
        $output = ($_POST["$input"]);
    } else {
        $output = ($_GET["$input"]);
    }
    $output = strip_tags($output);
    $output = stripslashes($output);
    return $output;
}

function e($value){
    echo htmlspecialchars($value,ENT_QUOTES);
}

//date picker <html select tag options>
//days
function cal_days() {
    echo ("<option>day</option><br>");
    for($day = 1; $day <= 31; $day++) {
        echo ("<option value=\"$day\">$day</option<br>");
    }
}
//months
function cal_months() {
    $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");

    echo ("<option>month</option><br>");
    for($month = 0; $month <= 11; $month++) {
         $month_value = $month + 1;
        echo ("<option value=\"$month_value\">$months[$month]</option<br>");
    }
}
//years
function cal_years() {
    echo ("<option>year</option><br>");
    for($year = date(Y); $year >= 1900 ; $year--) {
        echo ("<option value=\"$year\">$year</option<br>");
    }
}

//reports user readable error message after an opperation
function toast($msg, $type) {
    //types include success, info, warning and danger
    
    echo '

    <div class="section">
        <div class="container"><div class="row">
          <div class="col-md-11">
                <div class="alert alert-' . $type . '">
                    <strong>'. $msg .'</div>
                </div>
            </div>
        </div>
    </div>';
}

//
function redirect_to($page = "") {
    header('Location: /ExamManager/' . $page);
}

//
function expiry ($logoff_in_secs) {
    //user will be logged out after a certain number of seconds of inactivity. 
    
    if(isset($_SESSION["start_time"])){
    if (time() >= ($_SESSION["start_time"] + $logoff_in_secs)) {
        unset($_SESSION["start_time"]);
        session_destroy();
        header('Location: /ExamManager/');
    }
    else{//reset the timer
        $_SESSION["start_time"] = time();
    }
}
}

?>