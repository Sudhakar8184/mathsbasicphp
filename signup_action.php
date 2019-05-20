<?php include 'db.php'; ?>
<?php
if(isset($_POST["submit"])){
   $username1 = mysqli_real_escape_string($con,$_POST["username_"]);
   $password = mysqli_real_escape_string($con,$_POST["new_password_"]);
   $password = sha1($password);
   $query_check = "SELECT * FROM users WHERE username = '".$username1."'";
   $query = "INSERT INTO user_details(username,password) VALUES ('{$username1}','{$password}')";
   $result = mysqli_query($con,$query);
   if($result){
    ?>
<script>alert('successfully registred');</script>
<script>window.location='index.php'</script>
	<?php
   } else{
    ?>
    <script>alert('username already exists')</script>
    <script>window.location='index.php'</script>
      <?php
   }
} else{
  header("Location: index.php");
}

?>
