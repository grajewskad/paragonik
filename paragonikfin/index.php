<!DOCTYPE html>
<head>
<link rel="stylesheet" href="style.css"/>
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
<script src="../JsBarcode.all.js" type="text/javascript"></script>
<script src="main.js"></script>
</head>
	<body>

		<?php
            session_start();

            
			if (isset( $_SESSION["check"])){
				if($_SESSION["check"]==1){
					echo "Teraz możesz się zalogować";
					echo "<br>";
					echo "<br>";
					$_SESSION["check"]=0;
				}

				else if($_SESSION["check"]==2){
					echo "Nieprawidłowe hasło";
					echo "<br>";
					$_SESSION["check"]=0;
				}

				else if($_SESSION["check"]==3){
					echo "Użytkownik już istnieje";
					echo "<br>";
					$_SESSION["check"]=0;
				}
			}





		?>
<span style="font-size:20px;">Zaloguj się</span>
<form action="login.php" method="get">
		<div class="bord"><image class="icon" src="user.png"></image><input type="email" class="prostokat" placeholder="e-mail" name="mail">
			
		</input>
	</div>
		<div class="bord"><image class="icon" src="lock.png"></image><input type="password" class="prostokat" placeholder="hasło" name="password">
			</input>
		</div>
		<button type="submit">
		<image src="arrow.png" width="30px">
	</button>
	</form>
	<a style="font-size:10px;" href="pass.html">Przypomnij hasło</a><br/><br/>

<span style="font-size:20px;">Zarejestruj się</span>
		<form action="register.php" method="get" id="my-form">

	<div class="bord"><image class="icon" src="name.png"></image><input type="text" class="prostokat" placeholder="imię" name="name">
			
		</input>
	</div>

	<div class="bord"><image class="icon" src="name.png"></image><input type="text" class="prostokat" placeholder="nazwisko" name="surname">
			
		</input>
	</div>


		<div class="bord"><image class="icon" src="user.png"></image><input type="text" class="prostokat" placeholder="login" name="login">
			
		</input>
	</div>
		<div class="bord"><image class="icon" src="lock.png"></image><input type="password" class="prostokat" placeholder="hasło" name="password">
			</input>
		</div>
		<div class="bord"><image class="icon" src="lock.png"></image><input type="email" required class="prostokat" placeholder="e-mail" name="mail">
			</input>
		</div>
		<button type="submit">
		<image src="arrow.png" width="30px">
	</button>
	</form>




	</body>