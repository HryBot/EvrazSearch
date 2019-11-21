<meta charset="UTF-8">
<?php

    
    $db_host = "localhost";
    $db_login = "root";
    $db_password = "";
    $db_name = "evraz";
    $rows=[];
    try {
        $dbh = new PDO("mysql: host=$db_host;dbname=$db_name;charset=utf8", $db_login, $db_password);

        $stmt = $dbh->prepare("CALL Create_res(?,?)");
        $stmt->execute(array($_POST["article_name"],$_POST["article_text"]));
        // var_dump($stmt);
        $rows = $stmt->fetchAll();
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    setcookie("status","Статья создана",time()+100);
    header("Location: /admin.php");
?>