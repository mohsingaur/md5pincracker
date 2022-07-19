<!DOCTYPE html>
<html>
<head>
	<title>Muhammad Mohsin MD5 Cracker</title>
	<style>
		*{
			padding:0;
			margin: 0;
			box-sizing: border-box;
		}
		.nav, .content{
			background: #eee;
			border-radius: 5px;
			font-family: sans-serif, verdana, arial;
			margin: 5px;
			padding: 15px;
		}
		.nav ul li{
			display: inline-block;
			list-style: none;
		}
		.nav ul li a{
			text-decoration: none;
			color: #111;
			padding-right: 20px;
			font-weight: bold;
		}
		.content h1,h2,p,pre{
			margin: 0 0 10px 0;
		}
		.content input{
			padding: 3px;
			margin: 10px 0;
			border:1px solid black;
			border-radius: 4px;
		}
		.content input[type="submit"]{
			background: #11c;
			color: #fff;
			font-weight: bold;
		}
		.content input[type="submit"]:hover{
			cursor: pointer;
		}
		.result{
			display: block;
			margin: 10px 0;
			padding: 5px 0;
		}

	</style>
</head>
<body>

	<?php 
	// Adding in git repo
	$output = "";
	$res = "Not Found";
	$show = 0;
	$error = false;
	$msg = false;
	$n = false;
	$md5 = false;
	$time = false;
	$nums = false;

	if(isset($_GET['md5'])){
		$time_pre = microtime(true);
		$md5 = $_GET['md5'];
		$num = "0123456789";
		
		
		for ($i=0; $i<strlen($num); $i++) {
			$num1 = $num[$i];
			for ($j=0; $j <strlen($num) ; $j++) { 
				$num2 = $num[$j];
				for ($k=0; $k < strlen($num); $k++) { 
					$num3 = $num[$k];
					for ($l=0; $l < strlen($num); $l++) { 
						$num4 = $num[$l];
						$try = $num1.$num2.$num3.$num4;
						$check = hash("md5", $try);
						while ($show < 20) {
							$nums .= $check." - ".$try."\n";
							$show++;
						}

						if ($check == $md5) {
							$res = $try;
						}					
					}
				}
			}	
		}
		$time_post = microtime(true);
		$time = $time_post - $time_pre;
		$output .= "<b>MD5 values			   4 Digit Number</b>\n".$nums."\nElapsed Time: ".$time;
	}

	
	if (isset($_GET['md5gen'])) {
		$n = $_GET['md5gen'];
		if (strlen($n) != 4) {
			$error = "Input must be exactly 4 numeric characters";
		}
		else if (!is_numeric($n)) {
			$error = "Input must be 4 digit number";
		}
		else{
			$error = "<b>MD5 code for </b>".$n." <b>is</b> ".hash("md5", $_GET['md5gen']);
		}
		
	}

	if (isset($_GET['md5mak'])) {
		$msg = "<b>MD5 code for </b>".$_GET['md5mak']." <b>is</b> ".hash("md5", $_GET['md5mak']);
	}

	?>

	<div class="nav">
		<ul>
			<li><a href="index.php">MD5 Cracker Application</a></li>
			<li><a href="index.php">Home</a></li>
		</ul>
	</div>
	<div class="content">
		<h1>MD5 Cracker By Muhammad Mohsin</h1>
		<p>This application takes an MD5 hash of a four random numbers and attempts to hash all four number combinations to determine the original four numbners. </p>

		<form>
			<input type="text" name="md5" size="35" placeholder="Enter MD5 hash value"/>
			<input type="submit" value="Crack MD5">
		</form>
		<p>Original PIN: <b><?= $res ?></b></p>

		<pre>

			Debug Output:

			<?= $output; ?>

		</pre>

	</div>

	<div class="content">
		<h2>MD5 PIN Maker</h2>
		<form>
			<input type="text" name="md5gen" value="<?= htmlentities($n)?>" size="35" placeholder="Enter 4 digit numeric PIN"/>
			<input type="submit" value="Compute MD5 for PIN">
		</form>
		<span class="result">
			<?= $error ?>
		</span>
	</div>

	<div class="content">
		<h2>MD5 Maker</h2>
		<form>
			<input type="text" name="md5mak" size="35" placeholder="Enter any characters"/>
			<input type="submit" value="Compute MD5 code">
		</form>
		<span class="result">
			<?= $msg ?>
		</span>
	</div>	

</body>
</html>