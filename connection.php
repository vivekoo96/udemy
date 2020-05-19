 <?php $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "dairy";
  $link = mysqli_connect($servername,$username,$password,$dbname);
  if(mysqli_connect_error()){
      die("Connection Faild");
  }
?>