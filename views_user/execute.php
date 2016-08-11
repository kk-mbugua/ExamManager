<?php 
    if(!isset($_GET['exam_id'])){
        header("Location: /ExamManager/");
    }else{
        $exam_id=$_GET['exam_id'];  
        $update = "UPDATE exam_info SET exam_done=1 WHERE exam_id='$exam_id'"; 
        db_query($update);
        header("Location: /ExamManager/examinfo?id=".$exam_id);
    }
?>