<?php
unset($_SESSION["start_time"]);
session_destroy();
    header("Location: /ExamManager/login");
?>