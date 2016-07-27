<?php

if(isset($_GET['id'])){
 $exam_id = $_GET['id'];
 
 $select = "SELECT * FROM exam_info WHERE exam_id='$exam_id'";
 $a_exam = db_query($select);
$this_patient = $a_exam->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

//load data from forms into variables    
$req_doctor     =   get_input("req_doctor");
$description    =   get_input("description");
$patient_id    =   get_input("patient_id");
$group          =   get_input("group");
$exam_name      =   get_input("procedure");
$description    =   get_input("description");
$current_date_time = date("Y-m-d G:i:s");
 
//sql statement to insert data into table
$sql_edit_exam = 
        "UPDATE exam_info SET req_physician='$req_doctor', exam_reason='$description', modality='$group', exam_name='$exam_name', patient_id='$patient_id' WHERE exam_id ='$exam_id'";
db_query($sql_edit_exam);

header('Location: viewexams?id='.$exam_id);
}
?>


<div class="section">
  <div class="container">

  <div class="panel panel-default panel-faded">
                <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <h1>New Exam</h1>
      </div>
    </div>
    <form role="form" method="post" class="col-md-12">
      <div class="row">
           <div class="col-md-12">
             <div class="form-group">
                <label class="control-label">Requesting Doctor</label>
                 <input class="form-control" type="text" name="req_doctor" value="<?php echo $this_patient['req_physician'];?>">
             </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Modality</label>
              <select class="form-control" name="group">
                <option  value="<?php echo $this_patient['modality'];?>"><?php echo $this_patient['modality'];?></option>
                <option value="MX">MX</option>
                <option value="US">US</option>
              </select>
            </div>
          </div>
          <div class="col-md-8">
           <div class="form-group">
            <label class="control-label">Procedure</label>
            <input class="form-control" type="text" name="procedure" value="<?php echo $this_patient['exam_name'];?>">
           </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
             <div class="form-group">
                <label class="control-label">Description.</label>
                <textarea class="form-control" rows="3" name="description"><?php echo $this_patient['exam_reason'];?></textarea>
             </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
             <div class="form-group">
                <label class="control-label">Amount.</label>
                <input class="form-control" type="text" name="date" value="<?php echo $this_patient['amount'];?>">
             </div>
          </div>
         <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Receipt No.</label>
              <input class="form-control" type="text" name="time" value="<?php echo $this_patient['receipt'];?>">
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
  $('#dp1').datepicker({
        format: 'mm-dd-yyyy'
      });
</script>