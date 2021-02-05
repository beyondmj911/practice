<?php 
header("Content-Type: text/html;charset=utf-8");
$response = array('code'=>0,'msg'=>'');
$link = mysql_connect('localhost','root','123456');
if(!$link){
    $response['code']=1;
    $response['msg'] = "数据库连接失败";
    echo json_encode($response);
    exit;
}

mysql_select_db('hhp');
mysql_set_charset('utf8');
$sql = "SELECT * FROM users";
$res = mysql_query($sql);
$atr = array();
while($row = mysql_fetch_row($res)){
    array_push($atr,$row);
}
echo json_encode($atr);
mysql_close($link);
?>