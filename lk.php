<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Личный кабинет</title>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/styles.css" />
		<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/main_script.js"></script>
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
		<div class="modal fade" id="change-password-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<img src="images/logo.png" class="modal-logo">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" name="entry-form" action="change_pass.php">
							<input type="password" name="old_password" placeholder="Старый пароль" required>
							<input type="password" name="new_password" placeholder="Новый пароль" required>
							<input type="password" name="new_password_2" placeholder="Повторите новый пароль" required>
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
						<label for="enter-btn" class="btn btn-warning">Изменить</label>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 logo-col1">
					<a href="/"><img src="images/logo.png" class="logo"></a>
				</div>
				<div class="col">
                    <h1 class="page-name">Личный кабинет</h1>
					<!--<form method="GET" action="" class="search-form1">
						<input type="text" name="search" class="search-text" placeholder="Поиск" required>
						<input type="submit" name="send" id="send" style="display: none;">
						<label for="send">
							<img src="images/magnifying-glass.png">
						</label>
					</form>-->
				</div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="user-info">
						<?php
						if(isset($_SESSION["login"])){
						$name=$_SESSION["name"];
						$sername=$_SESSION["surname"];
						$birthday=$_SESSION["birthday"];
                        echo "<p>Фамилия: <span>$sername</span></p>
                    </div>
                    <div class='user-info'>
                        <p>Имя: <span>$name</span></p>
                    </div>
                    <div class='user-info'>
                        <p>Дата рождения: <span>$birthday</span></p>
					</div>";
						}
					?>
						<button class="btn btn-warning btn-user-info" data-toggle="modal" data-target="#change-password-form">Изменить пароль</button>
                </div>
                <div class="col"></div>
			</div>
			<div class="row row-history">
				<div class="col"></div>
				<div class="col col-history">
				<h5>История поиска</h5>
					<table>
						<tr>
							<th>Дата</th>
							<th>Название статьи</th>
						</tr>
				<?php
				include "history.php";
				$history1=history($_SESSION["uid"]);
				foreach ($history1 as $key => $value) {
					$date=$value["request_date"];
					$text=$value["request_text"];
					echo "<tr>
					<td>$date</td>
					<td>$text</td>
				</tr>";
				}
						
				?>
					</table>
					<button class="btn btn-warning">Очистить историю поиска</button>
				</div>
				<div class="col"></div>
			</div>

		</div>
	</body>
</html>