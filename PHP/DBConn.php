<?php 

$cn = pg_connect("host=localhost port=5432 dbname=WebMenu user=postgres password=root");
if($cn) {
    echo 'Success';
}
$result = pg_query($cn, "select * from members");
while($row = pg_fetch_object($result)) {
    echo "<br />" .$row->name. " ". $row->email;
}
pg_close($cn);
?>