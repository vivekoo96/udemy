<?php
session_start();
if(array_key_exists("id",$_COOKIE)){
    $_SESSION['id'] = $_COOKIE['id'];
}
if(array_key_exists("id",$_SESSION)){
    echo "<p>Logged In! <a href='index.php?logout=1'>Log Out</a></p>";
}else{
    header("Location:index.php");
}

include("header.php");
?>
<div class="container-fluid">
    <textarea name="" id="dairy" class="form-control">
        
    </textarea>
</div>

<?php
include("fotter.php");

?>