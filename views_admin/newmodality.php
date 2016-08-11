<?php
$month_array = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  
    //define variables for input
    $modality_name     = get_input("modality_name");
    $modality_abbr     = get_input("modality_abbr");
    
    $install_year   = get_input("install_year");
    $install_month  = get_input("install_month");
    $install_day    = get_input("install_day");
    $install_date = date("Y-m-d", strtotime("$install_month $install_day $install_year"));
    
    $service_year   = get_input("service_year");
    $service_month  = get_input("service_month");
    $service_day    = get_input("service_day");
    $next_service = date("Y-m-d", strtotime("$service_month $service_day $service_year"));;
    
    
    //sql statement to insert data into table and query the database
    $sql_insert_new_modality = 
            "INSERT INTO modalities (`modality_abbr`, `modality_name`, `install_date`, `next_service`) VALUES ('$modality_abbr', '$modality_name', '$install_date', '$next_service')";
    db_query($sql_insert_new_modality);
    
    header('Location: /ExamManager/modalities');

} 

?> 

<div class="section">
<div class="container">

  <div class="panel panel-default panel-faded">
    <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <h1>New Modality</h1>
          </div>
        </div>
            <form role="form" method="post">
                <div class="form-group">
                    <label class="control-label">Modality Name<sup>*</sup></label>
                  <input class="form-control" type="text" name="modality_name" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Modality Abbreviation<sup>*</sup></label>
                  <input class="form-control" type="text" name="modality_abbr" required>
                </div>
                
                
                <label class="control-label">Installation Date<sup>*</sup></label>
                <div class="row">
                    <div class="col-md-2">
                        <select class="form-control" name="install_year" required>
                            <option>year</option>
                        <?php 
                        for ($year = date(Y); $year >= 2014; $year--) {
                            ?>
                            <option value="<?php e($year);?>"><?php e($year);?></option>
                        <?php }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="install_month" required>
                            <option>month</option>
                        <?php 
                        for ($month = 1; $month <= 12; $month++) {
                            ?>
                            <option value="<?php e($month_array[$month-1]);?>"><?php e($month_array[$month-1]);?></option>
                        <?php }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="install_day" required>
                            <option>day</option>
                        <?php 
                        for ($day = 1; $day <= 31; $day++) {
                            ?>
                            <option value="<?php e($day);?>"><?php e($day);?></option>
                        <?php }
                        ?>
                        </select>
                    </div>
                </div> <br>
                
                
                <label class="control-label">Next Service Date<sup>*</sup></label>
                <div class="row">
                    <div class="col-md-2">
                        <select class="form-control" name="service_year" required>
                            <option>year</option>
                        <?php 
                        for ($year = date(Y); $year <= (date(Y) + 5); $year++) {
                            ?>
                            <option value="<?php e($year);?>"><?php e($year);?></option>
                        <?php }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="service_month" required>
                            <option>month</option>
                        <?php 
                        for ($month = 1; $month <= 12; $month++) {
                            ?>
                            <option value="<?php e($month_array[$month-1]);?>"><?php e($month_array[$month-1]);?></option>
                        <?php }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="service_day" required>
                            <option>day</option>
                        <?php 
                        for ($day = 1; $day <= 31; $day++) {
                            ?>
                            <option value="<?php e($day);?>"><?php e($day);?></option>
                        <?php }
                        ?>
                        </select>
                    </div>
                </div> <br>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </div> 
  </div>
          <p>*  Required field to fill</p>
</div>
</div>