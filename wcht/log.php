<?php
header("content-type:text/html;charset=utf-8");
$redis = new Redis();
$redis->connect('127.0.0.1','6379');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=test','root','root');
if($sn=$redis->rpop('sn')){
$pdo->exec('insert into log(name,addtime) value("'.$sn.'","'.date('Y-m-d H:i:s').'")');
}else{
$pdo->exec('insert into log(name,addtime) value("no","'.date('Y-m-d H:i:s').'")');
}
if($pdo=$sn){
	
	echo'秒杀成功';
	return true;
}else{
    echo'秒杀失败';
	return false;
}