<?php 
session_start();
$cn = pg_connect("host=localhost port=5432 dbname=WebMenu user=postgres password=root");
$account = $_REQUEST['account'];
$password = $_REQUEST['password'];
$sql = "select account, password from members where account = '$account' and password = '$password'";
$result = pg_query($cn, $sql);

if (!empty(pg_fetch_all($result))) {
    foreach(pg_fetch_all($result) as $row) {
        if ($account != null && $password != null && $row['account'] == $account && $row['password'] == $password) {
            echo '登入成功';
        } 
    }
} else {
    echo "<script>
    alert('登入失敗!');
    history.go(-1);
    </script>";
}

$cn = null;

?>