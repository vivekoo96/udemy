 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script type="text/javascript">
      $(".toggleForms").click(function(){
          $("#signUpForm").toggle();
          $("#logInform").toggle();
          
      });
         
        /* $("#dairy").bind("input propertychange", function() {
             $.ajax({
             type: "POST",
             url: "updateDatabase.php",
             data: {contant: $("#dairy").val()},
                 .done(function(msg){
                 alert("Data saved" +msg);
             });
             
});*/
            
     
      });
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
                          
);
      </script>
  </body>
</html>