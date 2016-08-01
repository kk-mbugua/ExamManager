<?php
$id = $_GET['exam_id'];

$sql_confirmname ="SELECT user_details.full_name "
        . "FROM user_details "
        . "INNER JOIN reports ON reports.reviewer_id=user_details.user_id "
        . "WHERE reports.exam_id = '$id'";

$a_result = db_query($sql_confirmname);
$this_result = $a_result->fetch_assoc();

?>
<div class="section">
<div class="col-md-5">
<form method="get" action="print_preview">
    <h4>Confirm report's author</h4>
        <div class="form-group">
           <label class="control-label">Name:<sup>*</sup></label>
           <input class="form-control" type="text" name="writer" value="<?php echo $_SESSION["full_name"];?>" required>
        </div>
        <div class="form-group">
           <label class="control-label">Phone number<sup>*</sup></label>
           <input class="form-control" type="text" name="phone_number">
        </div>
        <div class="form-group">
           <input style="display: none" class="form-control" name="exam_id" value="<?php echo $id;?>">
        </div>
        <button type="submit" class="btn btn-default">Confirm</button>
</form>   
</div>
</div>
