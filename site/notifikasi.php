<?php
if(!empty($_SESSION["notif"])){
    $n=explode("#",$_SESSION["notif"]);
    echo "<div class='alert alert-$n[0] alert-dismissible fade show' role='alert' style='margin-bottom:10px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close' ><span aria-hidden='true'><i class='fal fa-times-square'></i></span></button>$n[1]</div>";
    unset($_SESSION["notif"]);
}
?>