<?php include 'db.php'; ?>
<?php session_start() ?>
<?php
			 $u_id =$_SESSION['u_id'];
			         $score = $_GET['count'];
               $noofques = $_GET['noofattemp'];
               $timervalue = $_GET['timervalue'];
               $typename = $_GET['typename'];
			         $today =  $_GET['today'];
               $query = "INSERT INTO results(u_id,typename, testdate, no_of_ques, score, timevalue) VALUES ('$_SESSION[u_id]','$typename','$today','$noofques','$score','$timervalue')";
               $result = mysqli_query($con,$query);
?>