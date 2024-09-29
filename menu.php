<html>
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
		<link rel="shortcut icon" href="img/logo.ico" />
		<title>Menu</title>
	</head>
	<?php
		include("validar.php");
		
		include ("ligabd.php");
		
		$lista="select * from players where id='".$_SESSION["idp"]."'";
		$faz_lista=mysqli_query($ligabd,$lista);
		$registos=mysqli_fetch_array($faz_lista);
	?>
<script src="js/jquery-3.1.1.min.js"></script>
<script>
	var speed=<?php echo json_encode($registos["speed"]);?>;
		speed = Math.round(speed,0);
	var gl=<?php echo json_encode($registos["gold"]);?>;
		gl = Math.round(gl,0);
	var hp=<?php echo json_encode($registos["health"]);?>;
		hp = Math.round(hp,0);
	
	function next(){window.location.href = "game.php";};
	function score(){window.location.href = "scoreboard.php";};
	function buys(){
		if(gl>=300){
			if(speed<=600){
				speed += 50;
				gl -=300;
				$.post('updatemenu.php', {gold: gl,speed: speed,health:hp});
			}else{
				document.getElementById("ms").disabled = true;
			document.getElementById("ms").style.backgroundColor="#717b73";
			}
		}else{
			document.getElementById("ms").disabled = true;
			document.getElementById("ms").style.backgroundColor="#717b73";
		};		
		document.getElementById("glm").innerHTML="Gold: "+gl;
		document.getElementById("speed").innerHTML="Speed: "+speed;
	};
	function buyh(){
		if(gl>=300){
			if(hp<10){
				hp += 1;
				gl -=300;
				$.post('updatemenu.php', {gold: gl,speed: speed,health:hp});
			}else{
				document.getElementById("mh").disabled = true;
				document.getElementById("mh").style.backgroundColor="#717b73";
			}
		}else{
			document.getElementById("mh").disabled = true;
			document.getElementById("mh").style.backgroundColor="#717b73";
		};
		document.getElementById("glm").innerHTML="Gold: "+gl;
		document.getElementById("health").innerHTML="Health: "+hp;
	};
	
</script>
<body>
	<div id="mbg">
		<div id="content">
			<br>
			<center><table  cellspacing="7">
			<tr>
			<td colspan="4" style="border-bottom:2px solid #000"><center><div class="attr">Attributes</div></center></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
			<td><img height="30"  src="texture/coin.png"></td><td><div class="attr" id="glm"><?php echo "Gold: ".$registos["gold"];?></div></td></tr>
			
			<tr ><td ><img height="30" width="35" src="texture/boots.png"></td><td><div class="attr" id="speed"><?php echo "Speed: ".$registos["speed"];?></div></td><td><button id="ms" OnClick="buys()">+</button></td><td><div id="price">(300)</div></td>
			
			<tr><td><img height="25" src="texture/heart.png"></td><td><div id="health" class="attr"><?php echo " Health: ".$registos["health"];?></div></td><td><button id="mh" OnClick="buyh()">+</button></td><td><div id="price">(300)</div></td></tr>
			</table>
			<table style="position:relative;top:220px;width:100%;" >
			<tr ><td><center><form style="margin-bottom=0px;" action="sair.php">
				<input style="margin-bottom=0px;" class="menuButton" type="submit" value="Exit"><br>
			</form>
			</center></td><td>
			<center>
			<button style="font-size:15;width:150px;" class="menuButton" OnClick="score()"><i class="fa fa-bar-chart"></i> Scoreboard</button>
			</center>
			</td><td>
			<center>
			<button class="menuButton" OnClick="next()">Play</button>
			</center>
			</td></tr>
			</table>
			</center>
		</div>
	</div>
</body>
</html>