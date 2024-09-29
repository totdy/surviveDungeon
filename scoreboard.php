<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styles.css">
		<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
		<link rel="shortcut icon" href="img/logo.ico" />
		<title>Scoreboard</title>
	</head>
	<?php
		include("validar.php");
		
		include ("ligabd.php");
		
		$lista="select * from players order by level DESC";
		$faz_lista=mysqli_query($ligabd,$lista);
		$num_registos=mysqli_num_rows($faz_lista);
		
	?>
	<script>
		function back(){window.location.href = "menu.php";};
	</script>
	<body>
		<div id="mbg">
		<div id="content2">
			<table id="table" border="0" width="100%" cellspacing="0" cellpadding="5">
			<tr bgcolor='0b311b' style="color:white;"><th width="40%">Name</th><th width="30%">Level</th><th width="30%">Number of deaths</th></tr>

			<?php
			for($i=0;$i<$num_registos;$i++){
				$registos=mysqli_fetch_array($faz_lista);
				if($_SESSION["idp"]==$registos["id"]){
					echo "<tr  style='background-color: rgba(11, 49, 27, .5);color:white'>";
				}else{
					"<tr>";
				}
				echo "<td>".$registos["name"]."</td>";
				echo "<td>".$registos["level"]."</td>";
				echo "<td>".$registos["ndeaths"]."</td>";
				echo "</tr>";
			}
			?>
			</table>
			<button id="back" onClick="back()">Back</button>
		</div>
		</div>
	</body>
</html>
