<meta charset="UTF-8">
<?php
function history($Uid)
{
    
    $db_host = "localhost";
    $db_login = "root";
    $db_password = "";
    $db_name = "evraz";
    $rows=[];
    try {
        $dbh = new PDO("mysql: host=$db_host;dbname=$db_name;charset=utf8", $db_login, $db_password);

        $stmt = $dbh->prepare("SELECT * FROM requests WHERE id_user=?");
        $stmt->execute(array($Uid));
        // var_dump($stmt);
        $rows = $stmt->fetchAll();
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    return $rows;
}
?>