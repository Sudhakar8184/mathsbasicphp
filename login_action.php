<?php include 'db.php'; ?>
<?php session_start() ?>
<?php
if(isset($_POST["submit"])){
   $username1 = mysqli_real_escape_string($con,$_POST["username_"]);
   $password = mysqli_real_escape_string($con,$_POST["password_"]);
   $password1 = sha1($password);
   $sql="SELECT * FROM user_details WHERE username='$username1' AND password='$password1'";
   $run = mysqli_query($con,$sql);
   if(($row=mysqli_fetch_assoc($run)))
   {
    $u_id=$row['u_id']; 
    $_SESSION["u_id"] = $u_id;
   ?>
   <script>window.location='index.php'</script>
  <?php
}
else{
  echo "fghgvhjb";
  ?>
  <script>window.location='index.php'</script>
  <?php
}
}
   
?>
