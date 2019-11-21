<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ЕВРАЗ Администрирование</title>
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
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 logo-col1">
					<img src="images/logo.png" class="logo">
				</div>
				<div class="col">
                    <h1>Администрирование</h1>
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
                <div class="col-md-auto">
                    <button class="btn btn-primary" id="new_article_btn">Добавить статью</button>
                </div>
                <!-- <div class="col-md-auto">
                    <button class="btn btn-primary" id="alter_article_btn">Редактировать статью</button>
                </div> -->
                <div class="col-md-auto">
                    <button class="btn btn-primary" id="new_user_btn">Создать пользователя</button>
                </div>
                <!-- <div class="col-md-auto">
                    <button class="btn btn-primary" id="alter_user_btn">Редактировать пользователя</button>
                </div> -->
                <div class="col"></div>
            </div>
            <!--Форма создания статьи-->
            <div class="row new-article" style="display: none;">
                <div class="col"></div>
                <div class="col">
                    <form method="POST" action="create_res.php">
                        <input type="text" name="article_name" id="article_name" placeholder="Название статьи" required>
                        <textarea name="article_text" id="article_text"placeholder="Текст статьи" rows="10" required></textarea>
                        <input type="submit" name="send_article" class="btn btn-primary" value="Добавить статью">
                    </form>
                </div>
                <div class="col"></div>
            </div>

            <!--Форма редактирования статьи-->
            <div class="row alter-article" style="display: none;">
                <div class="col"></div>
                <div class="col">
                    <form method="GET" action="">
                        <input type="text" name="article_name" id="article_name" placeholder="Название статьи" required>
                        <textarea name="article_text" id="article_text"placeholder="Текст статьи" rows="10" required></textarea>
                        <input type="submit" name="send_article" class="btn btn-primary" value="Изменить статью">
                    </form>
                </div>
                <div class="col"></div>
            </div>

            <!--Форма создания пользователя-->
            <div class="row new-user" style="display: none;">
                <div class="col"></div>
                <div class="col">
                    <form method="POST" action="create_user.php">
                    <input type="text" name="user_login" id="user_name" placeholder="логин" required>
                        <input type="text" name="user_name" id="user_name" placeholder="Имя пользователя" required>
                        <input type="text" name="user_surname" id="user_surname" placeholder="Фамилия пользователя" required>
                        <input type="date" name="user_birthday" id="user_birthday" placeholder="Дата рождения" required>
                        <input type="password" name="password" id="password" placeholder="Пароль" required>
                        <input type="submit" name="send_article" class="btn btn-primary" value="Добавить пользователя">
                    </form>
                </div>
                <div class="col"></div>
            </div>

            <!--Форма редактирования пользователя-->
            <div class="row alter-user" style="display: none;">
                <div class="col"></div>
                <div class="col">
                    <form method="GET" action="">
                        <input type="text" name="user_name" id="user_name" placeholder="Имя пользователя" required>
                        <input type="text" name="user_surname" id="user_surname" placeholder="Фамилия пользователя" required>
                        <input type="date" name="user_birthday" id="user_birthday" placeholder="Дата рождения" required>
                        <input type="password" name="password" id="password" placeholder="Пароль" required>
                        <label for="is_alter_user_admin">Права администратора</label>
                        <input type="checkbox" name="is_admin" id="is_alter_user_admin">
                        <input type="submit" name="send_article" class="btn btn-primary" value="Изменить данные пользователя">
                    </form>
                </div>
                <div class="col"></div>
            </div>

		</div>
	</body>
</html>