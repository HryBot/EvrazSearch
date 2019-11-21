<?php
session_start();
$db_host = "localhost";
$db_login = "root";
$db_password = "";
$db_name = "evraz";
$Ulogin=$_SESSION["login"];
try {
    $dbh = new PDO("mysql: host=$db_host;dbname=$db_name;charset=utf8", $db_login, $db_password);
    $stmt = $dbh->prepare("SELECT * from users WHERE login=?");
    $stmt->execute(array($Ulogin));
    $rows = $stmt->fetchAll();
    if(password_verify($_POST["old_password"],$rows[0]["password"])){
    $stmt1 = $dbh->prepare("CALL Change_Pass(?,?)");
    $stmt1->execute(array($_SESSION['uid'],password_hash($_POST["new_password"],PASSWORD_DEFAULT)));
    session_destroy();
    header("Location: /");
    }
    else{
        // $_SESSION["status"]="Введен неверный пароль";
        setcookie("status","Введен неверный пароль");
        header("Location: /lk.php");
    }

    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

