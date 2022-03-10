<?php
$flag = "CTF{Meowmeow}";
if( !isset($_POST['username']) || !isset($_POST['password']) || $_POST['username']=="" || $_POST['password']=="" ){
    header("Location: index.php");
}
$username = $_POST['username'];
$password = $_POST['password'];

require_once('config.php');
$sql = "SELECT * FROM `users` WHERE `username` = '$username' and `password` = '$password';";

$result=mysqli_query($link,$sql);
mysqli_close($link);
try {
    $row = mysqli_fetch_array($result);   
    
    if($row ){
        echo $flag, '<br>';
        echo '登入成功';
    }else{
        echo '登入失敗';
    }
}
catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), '<br>';
    echo 'Check credentials in config file at: ', $Mysql_config_location, '\n';
}
?>