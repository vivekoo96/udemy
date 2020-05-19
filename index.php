  <?php
  session_start();
if(array_key_exists('logout',$_GET)){
    unset($_SESSION);
    setcookie("id","",time() - 60*60);
    $_COOKIE['id'] = "";
}else if((array_key_exists("id",$_SESSION) AND $_SESSION['id'])OR (array_key_exists("id",$_COOKIE)AND $_COOKIE['id'])){    header("Location:loginpage.php");
}

   
  $error =      "";
    
   if(array_key_exists('submit',$_POST)){
       
        include("connection.php");
   
       if(!$_POST['email']){
           $error .=  "Email is required <br>";
       }
       if(!$_POST['password']){
           $error  .= "Password is required<br>"; 
       }
       if($error != ""){
           $error =  "<p>Something is worng in your from</p>".$error;
       }else{
           if($_POST['signUp']){
           $query = "SELECT `id` FROM `secret` where email = '".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link,$query);
           
           if(mysqli_num_rows($result)>0){
               $error = " Email  are taken";
           }else{
               $query = "INSERT INTO `secret`(`email`,`password`)VALUES('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
               if(!mysqli_query($link,$query)){
                   $error = "<p> could not sigup please try again leater";
               }else{
                   $query = "UPDATE `secret` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' where id = ".mysqli_insert_id($link)." LIMIT 1" ;
                   mysqli_query($link,$query);
                   $_SESSION['id'] = mysqli_insert_id($link);
                   if($_POST['staylogin'] == '1'){
                       setcookie("id",mysqli_insert_id($link),time() + 60*60*24*365);
                   }header("Location:loginpage.php");
                   
               }
           }
           }else{
              $query = "SELECT * FROM `secret` where `email`= '".mysqli_real_escape_string($link,$_POST['email'])."'";
               $result = mysqli_query($link,$query);
               $row  = mysqli_fetch_array($result);
               if(isset($row)){
                   $hashedpassword = md5(md5($row['id']).$_POST['password']);
                   if($hashedpassword == $row['password']){
                       $_SESSION['id'] = $row['id'];
                        if($_POST['staylogin'] == '1'){
                       setcookie("id",$row['id'],time() + 60*60*24*365);
                   }header("Location:loginpage.php");
                       
                   }else{
                       $error = "<p> That email/password combination not found</p>";
                   }
               }else{
                   $error = "<p> That email/password combination not found</p>";
               }
           }
       }
   }



 
   ?>
   <?php include("header.php");?>
    
      
   <div class="contaner">
    <h1>Secret Diary</h1>
    <strong>Store your thoughts secure</strong>
    </div>
    <div class="contaner">
        <div id="error"> <?php echo $error; ?> </div>
   <form action="" method="post" id="signUpForm">
   <p>sign-up your account</p>
   <fieldset class="form-group">
    <input class="form-control" type="email" name="email" placeholder="Email Address">
       </fieldset>
       <fieldset class="form-group">
    <input class="form-control" type="password" name="password" placeholder="Password">
       </fieldset>
       <div class="checkbox">
       <label>
    <input type="checkbox" name="staylogin" value="1">
       Stay logged In
        </label>
       </div>
       <fieldset class="form-group">
    <input class="form-control" type="hidden" name="signUp" value="1">
       </fieldset>
       <fieldset class="form-group">
    <input class="btn btn-success" type="submit"  name="submit" value="Sign-Up">
       </fieldset>
       <p><a href="#" class="toggleForms" >Sign-Up</a></p>
</form>
 <form action="" method="post" id="logInform">
  <p>logIn Your account</p>
   <fieldset class="form-group">
    <input  class="form-control" type="email" name="email" placeholder="Email Address">
     </fieldset>
     <fieldset class="form-group">
    <input class="form-control" type="password" name="password" placeholder="Password">
     </fieldset>
     <div class="checkbox">
     <label>
          <input type="checkbox" name="staylogin" value="1">
    
       Stay logged In
         </label>
     </div>
     <fieldset class="form-group">
    <input  class="form-control" type="hidden" name="signUp" value="0">
     </fieldset>
     <fieldset class="form-group">
    <input class="btn btn-success" type="submit"  name="submit" value="Log-In">
     </fieldset>
     <p><a href="#" class="toggleForms">logIn</a></p>
</form>
 
    </div>
   <?php include("fotter.php");?>
   

  