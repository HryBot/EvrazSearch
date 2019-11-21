<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ЕВРАЗ</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/styles.css" />
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
</head>

<body>
	<script>
		$(document).ready(function() {
			if ($.cookie("status") != "null") {
				alert($.cookie("status"));
			}
			$.cookie("status", null);
		});
	</script>
	<!--Форма входа и регистрации-->
	<div class="modal fade" id="entry-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<a href="/"><img src="images/logo.png" class="modal-logo"></a>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" name="entry-form" action="login.php">
						<input type="text" name="login" placeholder="Логин" required>
						<input type="password" name="password" placeholder="Пароль" required>
						<input type="submit" name="enter" id="enter-btn" style="display: none;">
					</form>
					<!--<form method="POST" name="reg-form" action="">
							<input type="text" name="user_name" placeholder="Имя" required>
							<input type="text" name="user_surname" placeholder="Фамилия" required>
							<input type="date" name="login" placeholder="Логин" required>
							<input type="text" name="login" placeholder="Логин" required>
							<input type="password" name="password" placeholder="Пароль" required>
							<input type="submit" value="Зарегистрироваться" name="enter">
						</form>-->
				</div>
				<div class="modal-footer">
					<label>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
					</label>
					<label for="enter-btn" class="btn btn-warning">Войти</label>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row justify-content-end">
			<div class="col-md-auto">
				<?php
				if (isset($_SESSION["login"])) {
					$Ulogin = $_SESSION["login"];
					echo "Привет, <a href='lk.php'>$Ulogin</a>  <a href='logout.php'>Выход</a>";
				} else {
					echo '<button type="button" class="entry" data-toggle="modal" data-target="#entry-form">Вход</button>';
				}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-auto logo-col">
				<img src="images/logo.png" class="logo">
			</div>
		</div>
		<div class="row">
			<form method="GET" action="result_v2.php" class="search-form">
				<input type="text" name="search" class="search-text" placeholder="Поиск" required>
				<?php

				if (isset($_SESSION["login"])) {
					echo '<input type="submit" name="send" id="send" style="display: none;">
					<label for="send">
						<img src="images/magnifying-glass.png">
					</label>';
				} else {
					echo "Для начала войдите на сайт!";
				}
				echo "</form>";
				?>
		</div>
	</div>
</body>

</html>