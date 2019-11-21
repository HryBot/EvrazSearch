<meta charset="UTF-8">
<?php
function search($search_arr, $Uid){
    $search_txt=$search_arr;
    $search_arr=explode(" ",$search_arr);
 $db_host="localhost";
 $db_login="root";
 $db_password="";
 $db_name="evraz";
$res_data=[];
     try {
        $dbh = new PDO("mysql: host=$db_host;dbname=$db_name;charset=utf8", $db_login, $db_password);
         foreach ($search_arr as $key => $value) {
            $stmt = $dbh->prepare("CALL Search(?)");
            $stmt->execute(array($value));
            // var_dump($stmt);
            $rows = $stmt->fetchAll(0|PDO::FETCH_GROUP);
            array_push($res_data,$rows);
         }
         $stmt = $dbh->prepare("insert into requests (id_user,request_text,request_date) values (?,?,CURRENT_DATE)");
         $stmt->execute(array($Uid,$search_txt));
         $dbh = null;
     } catch (PDOException $e) {
         print "Error!: " . $e->getMessage() . "<br/>";
         die();
     }
$res_temp=[];
$res_temp1=[];
if (count($res_data)>1){
    $k=count($res_data);
    $res_temp=$res_data[0];
for ($i=0; $i <$k-1 ; $i++) { 
    $res_temp=array_intersect(array_keys($res_temp),array_keys($res_data[$i+1]));
}
// var_dump($res_data[0][]);
foreach ($res_temp as $key => $value) {
    array_push($res_temp1,$res_data[0][$value]);
}}
else $res_temp1=$res_data[0];
return $res_temp1;
}
?>