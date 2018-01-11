<a href="log.php">开始秒杀</a>
<?php
header("content-type:text/html;charset=utf-8");
$pdo = new PDO('mysql:host=127.0.0.1;dbname=test','root','root');
$scoure=$pdo->query('select * from log');
$data=$scoure->fetch();
$redis = new Redis();
$redis->connect('127.0.0.1','6379');
for($i=0; $i<500; $i++){
 $redis->lpush('sn','_sn'.rand(1111,9999));
}
echo'订单已经生效';