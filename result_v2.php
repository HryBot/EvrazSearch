<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Результаты поиска</title>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/styles.css" />
		<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/main_script_v2.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 logo-col1">
					<a href="/"><img src="images/logo.png" class="logo"></a>
				</div>
				<div class="col">
					<form method="GET" action="result_v2.php" class="search-form1">
						<?php
						session_start();	
						if(isset($_GET["search"]) && isset($_SESSION["uid"])){
							$search_tx=$_GET["search"];
						echo "<input type='text' name='search' value='$search_tx' class='search-text' placeholder='Поиск' required>";
						}
						else{
							header('Location: /');
						}
						?>
						<input type="submit" name="send" id="send" style="display: none;">
						<label for="send">
							<img src="images/magnifying-glass.png">
						</label>
					</form>
				</div>
			</div>
			<div class="card-row">
                <!--Карточка с информацией о статье-->
                <?php
                
                if(isset($_GET["search"]) && isset($_SESSION["uid"])){
                    $Ulogin=$_SESSION["uid"];
                    include "search.php";
                    $site=search($_GET["search"],$Ulogin);
					// var_dump($site);
					foreach ($site as $key => $value) {
						$name=$value[0]["res_name"];
						$desc=$value[0]["res_description"];
						$url=$value[0]["res_url"];
						echo" <div class='row'>
                    <div class='col'>
                        <div class='card' on_view='false'>
                            <h5 class='card-header'>$name</h5>
                            <div class='card-body'>
                                <h5 class='card-title'>$url</h5>
                                <p class='card-text'>$desc</p>
                                <a href='$url' class='btn btn-primary'>Перейти на ресурс</a>
                            </div>
                        </div>
                    </div>
				</div>";
					}
                
				}
            else{
                header("Location: /");
            }
			?>
		</div>
	</body>
</html>