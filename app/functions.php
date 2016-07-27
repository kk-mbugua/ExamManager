<?php
// accesses post array and makes inputed data more secure
function get_input($input) {
$output = ($_POST["$input"]);
$output = strip_tags($output);
$output = stripslashes($output);
return $output;
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
?>