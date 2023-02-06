<?php 
$cn = pg_connect("host=localhost port=5432 dbname=WebMenu user=postgres password=root");
if(isset($_REQUEST['RegClick'])) {
    $account = $_REQUEST['account'];
    $password = $_REQUEST['password'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];

    $sql1 = "select * from members where account = '$account'";
    $result1 = pg_query($cn, $sql1);
    $db_line = pg_num_rows($result1);
    if($db_line >= 1) {
        echo "<script>alert('這個帳號已經存在了！請使用其他帳號註冊');history.go(-1);</script>";
        die;
    }
    $sql2 = "insert into members (account, password, name, email) values (". 
    "'$account', ". "'$password', ". "'$name', ". "'$email')";
    $result2 = pg_query($cn, $sql2);
    if($result2) {
        echo "<script>alert('註冊成功!');</script>";
    } else {
        echo "<script>alert('註冊失敗!');</script>";
    }
}
?>