<?php include 'db.php'; ?>
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
	<title>Math Improve</title>

	<style type="text/css">
	body{
		width:100%;
		height:800px;
		background-image: url('./images/img1.jpg');
		background-repeat: no-repeat;
        background-size: 100% 100%;
	}
		button {
			text-align: center;
			font-size: 20px;
			border: 2px solid lightblue;
			background-color: lightblue;
		}

		.dem {
			width: 80px;
			height: 80px;
			text-align: center;
			background-color: cyan;
			margin: 20px;
			font-size: 180%;
		}

		.button {
			width: 80px;
			height: 80px;
			text-align: center;
			background-color: cyan;
			margin: 20px;
			font-size: 18px;
		}

		.optiondata{
		text-align: center;
		margin-left: 24%;
		}

		.optiondata #typevalue{
		text-align: center;
		float: left;
		}
		#results {
			overflow: scroll;
    text-align: center;
    margin-left: 35%;
    width: 300px;
    height: 300px;
    border: 2px solid lightslategray;
		}
		.row .col-md-1 {
    width: 15%;
    float: left;
    margin: 0px;
     }

	 #databaseresults{
		text-align: center;
		overflow:scroll;
		height:200px;
		margin-left: 20px;
		font-size:19px;
	 }

	#dataresults{
       text-align: center;
	}


		@media screen and (max-width:600px) {
			body{
		width:100%;
		height:100%;
		font-size:50px
	}
			.button {
			width: 40px;
			height: 40px;
			text-align: center;
			background-color: cyan;
			margin: 2px;
			font-size: 17px;
		}
		#results {
    overflow: scroll;
    width: 159%;
    height: 300px;
    margin-left: 0%;
    border: 2px solid lightslategray;
    }
   .row .col-md-1 {
    width: 15%;
    float: left;
    margin: 0px;
     }
    }

		#timer {
			width: 70px;
			height: 40px;
		}

		#timervalue {
			width: 70px;
			height: 40px;
		}

		.button1 {
			margin: 20px;
			height: 40px;
			width: 120px;
		}

		.btn1 {
			margin: 20px;
			height: 40px;
			width: 100px;
		}

		#typevalue {
			font-size: 150%;
		}

		
		.main{
    width: 100%;
		float: left;
		}
		.col1{
			width: 70%;
			float: left;
		}
		.col2{
			width: 25%;
			float: left;
		}
		#maindata{
       widows: 100%;
	   height: 100%;
		}
	</style>
	<script>

	</script>
</head>

<body >
	<!-- <button onclick="start()">strat</button> -->
	<center>
		<h1>improve your speed in maths</h1>
	</center>

	<?php
	if(isset($_SESSION['u_id'])){

	$sql="SELECT * FROM user_details  where u_id = '$_SESSION[u_id]'";
	$run=mysqli_query($con,$sql);
	while($row=mysqli_fetch_assoc($run))
	{   
		  $u_id=$row['username'];
		  echo "<h1 style='float:right; margin-right:50px'>$u_id</h1>";
	}
    }
	?>
	<br><br>
	<div class="main">
		<div class="col1">
		<div id= "loginsingup" style="display: block">
						<center>
						<button class="btn btn-info" target="_self" data-backdrop="static" data-target="#login_modal" data-toggle="modal" name="login" alt="only for admin"  >Login</button>
							<button class="btn btn-info" target="_self" data-backdrop="static" data-target="#signup_modal" data-toggle="modal" name="login" alt="only for admin"  >Sign Up</button>
					
				<div class="modal fade" id="login_modal">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<center><h3 style="color:black;">LOGIN</h3></center>
				</div>
				<div class="modal-body">
				 <form role="form" name="login" action="login_action.php" method="post" onsubmit="return validateFormLogin();" >
						<div class="form-group">
							<label for="username">Enter Username</label>
							<input type="text" class="form-control" id="username" name="username_">
						</div>
						<div class="form-group">
							<label for="password">Enter Password</label>
							<input type="password" class="form-control" id="password" name="password_" autocomplete="new-password">
						</div>
						<button type="submit" class="btn btn-primary btn-login" name="submit">Log In</button>
					</form>
				</div>
				<div class="modal-header">
				<div class="text-right">
				<button class="btn btn-danger" data-dismiss="modal">close</button>
				</div>
				</div>
				</div>
				</div>
				</div>
				
				<div class="modal fade" id="signup_modal">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<center><h3 style="color:black;">Sign Up</h3></center>
				</div>
				<div class="modal-body">
				 <form role="form" name="signup" action="signup_action.php" method="post" onsubmit="return validateFormSignup();" >
						<div class="form-group">
							<label for="username">Enter Username</label>
							<input type="text" class="form-control" id="username" aria-describedby="usernameHelp" name="username_">
							<small id="usernameHelp" class="form-text text-muted">Enter an unique username.</small>
						</div>
						<div class="form-group">
							<label for="password">Enter Password</label>
							<input type="password" class="form-control" id="new_password" name="new_password_" autocomplete="new-password">
						</div>
						<div class="form-group">
							<label for="password">Confirm Password</label>
							<input type="password" class="form-control" id="confirm_password" name="confirm_password_" autocomplete="new-password">
						</div>
				
						<button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
					</form>
				</div>
				<div class="modal-header">
				<div class="text-right">
				<button class="btn btn-danger" data-dismiss="modal">close</button>
				</div>
				</div>
				</div>
				</div>
				</div>
				</center>
				</div>
			<div id="buttontype" style="display: block;">
				<div id="gametypeid" style="display: block;margin-left:10px">
					select one of this: 
					<br>
					<input type="radio" name="gametype" id="TimetoComeback" value="TimetoComeback">Time To
					Back When Wrong
					<br>
					<input type="radio" name="gametype" id="TimetoComplete" value="TimetoComplete">Time To complete
				</div>
				<center>
					<button class="button1 btn-success" id="multiplication">Tables</button>
					<button class="button1 btn-primary" id="addition">addition</button>
					<button class="button1 btn-info" id="subtraction">subtraction</button>
				</center>
			</div>
			<div id="home" style="display: none;">
				<center>
					<button class="btn btn-success" onclick="home()">home</button>
				</center>
			</div>
		</div>
		<div class="col2">
			<div id="newtimer">
				<button class="btn1 btn-success" onclick="timertoset()">set Timer</button>
				<div id="settimer" style="display: none">
					<input type="number" id="timervalue" name="" placeholder="in seconds ">
					<button class="btn-success" onclick="settimer()" style="height: 40px; width: 50px;">set</button>
					<h5>By defalut is 120 seconds</h5>
				</div>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="col1">
		<div id ="databaseresults" style="display: block">
				   <?php
				   if(isset($_SESSION['u_id'])){
				?>
				<table border="2"style="width: 700px;" >
				<thead>
				<tr>
				<th>S.no</th>
				<th>Date</th>
				<th>type name</th>
				<th>No of Questions</th>
				<th>Score</th>
				<th>time</th>
				</tr>
				</thead>
				<tbody>
				
				<?php
                $sql="SELECT * FROM results  where u_id = '$_SESSION[u_id]'";
				$run=mysqli_query($con,$sql);
				$c=0;
                while($row=mysqli_fetch_assoc($run))
               {   
			   echo "<tr>
			   <td>$c</td>
			   <td>$row[testdate]</td>
			   <td>$row[typename]</td>
			   <td>$row[no_of_ques]</td>
			   <td>$row[score]</td>
			   <td>$row[timevalue]</td>
			   </tr>";
			   $c++;
               }
               }
               ?>
			   </tbody>
				</table>
				   </div>
			<div id="dataresults" style="margin-left: 30px;display:none">
				<h2>No Of questions Attempted: <span style="font-size: 180%" id="noofattemp"></span></h2>
				<h2>your score: <span style="font-size: 180%" id="count"></span></h2>
				<div id="results" >
				</div>
			</div>

			<div id="maindata" style="display: none;">
				<center>
					<input class="dem button" type="text" id="dem1" value="0">
					<span id="typevalue">?</span>
					<input class="dem button" type="text" id="dem2" value="0">
				</center>
				<br>
				<br>
				<br>
				<div class="optiondata">
					<span id="typevalue">1)<input type="submit" class="button" id="first" value="0"></span>
					<span id="typevalue">2)<input type="submit" class="button" id="second" value="0"></span>
					<span id="typevalue">3)<input type="submit" class="button" id="third" value="0"></span>
					<span id="typevalue">4)<input type="submit" class="button" id="fourth" value="0"></span>
				</div>
				<br>
			</div>
		</div>
		<div class="col2">
			<div id="maindata1" style="display: none">
				<input type="timer" id="timer" name="">
				<input type="submit" class="btn-danger" style="height: 40px; width: 50px;" onclick="reset()" name="" value="Reset">
			</div>
		</div>
	</div>



	</center>
</body>
<script type="text/javascript">
	var count = 0;
	counter = 0;
	timeleft = 3;
	var typename;
	var ref;
	var dem1;
	var dem2;
	var typesymbol;
	var noofattemp = 0;
	var gametype;
	
	var timervalue = timeleft;
	// const first = document.getElementById('results');
	// first.innerHTML = '';
	function timertoset() {
		document.getElementById("settimer").style.display = 'block';
	}
	function settimer() {
		timeleft = document.getElementById("timervalue").value;
		timervalue = timeleft
	}
	function setup() {
		function convertsSeconds(s) {
			var min = Math.floor(s / 60);
			var sec = s % 60;
			return min + ':' + sec;
		}

		setInterval(time, 1000);
		function time() {
			counter++;
			total = document.getElementById("timer").value = convertsSeconds(timeleft - counter);
			if (total == "0:0") {
				out();
			}
			document.getElementById("timer").value = total;
		}
		function out() {
			
			document.getElementById("buttontype").style.display = 'none';
			document.getElementById("maindata").style.display = 'none';
			document.getElementById("maindata1").style.display = 'none';
			document.getElementById("home").style.display = 'block';
			document.getElementById("dataresults").style.display = 'block';
			document.getElementById("count").innerHTML = count;
			document.getElementById("noofattemp").innerHTML = noofattemp - 1;
			updatedatabase()
		}
	}
	function start() {
		noofattemp++;
		var d1 = Math.floor(Math.random() * 10) + 1;
		var d2 = Math.floor(Math.random() * 10) + 1;

		switch (typename) {
			case 'multiplication':
				typesymbol = '*'
				document.getElementById("typevalue").innerHTML = '*';
				document.getElementById("addition").style.display = 'none';
				document.getElementById("subtraction").style.display = 'none';
				var z = d1 * d2;
				break;
			case 'addition':
				typesymbol = '+'
				document.getElementById("typevalue").innerHTML = '+';
				document.getElementById("multiplication").style.display = 'none';
				document.getElementById("subtraction").style.display = 'none';
				d1 = d1 * 2;
				d2 = d2 * 2
				var z = d1 + d2;
				break;
			case 'subtraction':
				typesymbol = '-'
				document.getElementById("typevalue").innerHTML = '-';
				document.getElementById("multiplication").style.display = 'none';
				document.getElementById("addition").style.display = 'none';
				d1 = d1 * 4;
				d2 = d2 * 5;
				if (d1 < d2) {
					var z = d2 - d1;
					var a = d1;
					d1 = d2
					d2 = a;
				} else {
					var z = d1 - d2;
				}

				break;
		}
		dem1 = document.getElementById("dem1").value = d1;
		dem2 = document.getElementById("dem2").value = d2;
		ref = z;
		var ch = Math.floor(Math.random() * 4) + 1;
		if (ch != 1) {
			var d3 = Math.floor(Math.random() * 100) + 1;
			var dem7 = document.getElementById("first").value = d3;
		}
		else {
			var dem7 = document.getElementById("first").value = z;
		}
		if (ch != 2) {
			var d4 = Math.floor(Math.random() * 100) + 1;
			var dem7 = document.getElementById("second").value = d4;
		}
		else {
			var dem7 = document.getElementById("second").value = z;
		}
		if (ch != 3) {
			var d5 = Math.floor(Math.random() * 100) + 1;
			var dem7 = document.getElementById("third").value = d5;
		} else {
			var dem7 = document.getElementById("third").value = z;
		}
		if (ch != 4) {
			var d6 = Math.floor(Math.random() * 100) + 1;
			var dem7 = document.getElementById("fourth").value = d6;
		} else {
			var dem7 = document.getElementById("fourth").value = z;
		}
	}
	function reset() {
		alert("again click on start  button");
		location.reload();
	}
	function home(){
		location.reload();
	}
	function updatedatabase(){
			var today = new Date();
               var dd = today.getDate();
               var mm =today.getMonth()+1; 
              var yyyy =today.getFullYear();
			//   var hh = (today.getHours()<10?'0':'') + today.getHours()
            //    var min =(today.getMinutes()<10?'0':'') + today.getMinutes()
            //   var sec = (today.getSecondss()<10?'0':'') + today.getSecondss()
			//   var typetime =am;
			var hours = today.getHours();
        var minutes = today.getMinutes();
		var seconds = today.getSeconds();
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0'+minutes : minutes;
		seconds = seconds < 10 ? '0'+seconds : seconds;
        var strTime = hours + ':' + minutes + ':' +seconds +' '+ ampm;
				if(dd<10){
					dd='0'+dd;
				}
				if(mm<10){
					mm='0'+mm;
				}
             today = mm+'/'+dd+'/'+yyyy+' '+ strTime;
			// //  today = today.match(/.*GMT/gm)
			// //   today=today.map(ele=>ele.replace(/GMT/gm,''))
			//   console.log(today);
			$.ajax({
    url: './results.php',
    data: { count: count, noofattemp: noofattemp-1,timervalue: timervalue,today: today,typename: typename },
    success: function(data){
		if (gametype == "TimetoComeback") {
			home()
		}
		 document.getElementById("databaseresults").style.display='none';
    }
  });
		 }
	const buttons1 = document.getElementsByClassName('button1');
	const buttonsCount1 = buttons1.length;
	for (let i = 0; i < buttonsCount1; i += 1) {
		buttons1[i].addEventListener('click', function () {

			if (document.getElementById("TimetoComeback").checked) {
				gametype = document.getElementById("TimetoComeback").value
				console.log("gametype1", gametype);
			}
			if (document.getElementById("TimetoComplete").checked) {
				gametype = document.getElementById("TimetoComplete").value
				console.log("gametype", gametype);
			}
			console.log("gametype", gametype);
			if (!gametype) {
				alert('please select one this game type');
				return;
			}
			typename = this.id;
			start();
			setup();
			document.getElementById("loginsingup").style.display='none';
	    document.getElementById("databaseresults").style.display='none';
			document.getElementById("gametypeid").style.display = 'none';
			document.getElementById("newtimer").style.display = 'none';
			document.getElementById("maindata").style.display = 'block';
			document.getElementById("maindata1").style.display = 'block';

		})
	}
	const buttons = document.getElementsByClassName('button');
	const buttonsCount = buttons.length;
	for (let i = 0; i < buttonsCount; i += 1) {
		buttons[i].addEventListener('click', function () {
			id1 = this.id;
			var dem3 = document.getElementById(`${id1}`).value;
			if (ref == dem3) {
				count = count + 1;
				let markup = `
      <div class="row" >
			<div class="col-md-1" ><span>${dem1}</span></div>
			<div class="col-md-1"><span>${typesymbol}</span></div>
			<div class="col-md-1"><span>${dem2}</span></div>
			<div class="col-md-1">=</div>
			<div class="col-md-1"><span>${ref}</span></div>
			<div class="col-md-1"><span style="color: green;margin-left:8px">&#x2714;</span></div>
      </div>`;
				let block = document.createElement('div');
				block.innerHTML = markup;
				let head = document.getElementById('results');
				head.appendChild(block);
				start();
			} else {
				if (gametype == "TimetoComplete") {
					let markup = `
			<div class="row">
			<div class="col-md-1"><span>${dem1}</span></div>
			<div class="col-md-1"><span>${typesymbol}</span></div>
			<div class="col-md-1"><span>${dem2}</span></div>
			<div class="col-md-1">=</div>
			<div class="col-md-1"><span>${dem3}</span></div>
			<div class="col-md-1"><span style="color: red;margin-left:8px">&#x2718;</span>(${ref})</div>
      </div>
     `;
					let block = document.createElement('div');
					block.innerHTML = markup;
					let head = document.getElementById('results');
					head.appendChild(block);
				} else {
					alert('your score is' + count);
					alert('your are out start again');
					timervalue = counter
					updatedatabase();
				}
				start();
			}
		})
	}
</script>

</html>