<?php
if(isset($this_user["user_id"])){
    $_SESSION["user_name"] = $this_user["user_name"];
    $_SESSION["user_id"] = $this_user["user_id"];
    $_SESSION["admin"] = $this_user["admin"];
     
}
?>