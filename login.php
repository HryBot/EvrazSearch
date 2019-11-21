<meta charset="UTF-8">
<?php
// session_destroy();
session_start();
$db_host="localhost";
$db_login="root";
$db_password="";
$db_name="evraz";
if(isset($_POST["login"])){
    $Ulogin=$_POST["login"];
    try {
        $dbh = new PDO("mysql: host=$db_host;dbname=$db_name;charset=utf8", $db_login, $db_password);
        $stmt = $dbh->prepare("SELECT * from users WHERE login=?");
        $stmt->execute(array($Ulogin));
        $row_count = $stmt->rowCount();
        
        if($row_count==1){
        $rows = $stmt->fetchAll();
            if(password_verify($_POST["password"],$rows[0]["password"])){
                $_SESSION['login']=$rows[0]["login"];
                $_SESSION["uid"]=$rows[0]["id_user"];
                $_SESSION["name"]=$rows[0]["name"];
                $_SESSION["surname"]=$rows[0]["surname"];
                $_SESSION["birthday"]=$rows[0]["birthday"];
                header("Location: /");
            }
            else{
                setcookie("status","Введен неверный пароль!",time()+100);
                // $_SESSION["status"]= "Введен неверный пароль!";
                header("Location: /");
            }
        }
        else{
            // $_SESSION["status"]= "Ошибка, найдены одинаковые пользователи";
            setcookie("status","Ошибка, найдены одинаковые пользователи",time()+100);
            header("Location: /");
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

}
else{
    header("Location: /");
}


?>