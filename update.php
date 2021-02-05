<?php 
header("Content-Type: text/html;charset=utf-8");
$id = $_POST['id'];
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
$sql = "SELECT * FROM users WHERE id='{$id}'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);

if(!$row){
    $response['code']=2;
    $response['msg'] = "该用户不存在";
    echo json_encode($response);
}else{
    echo json_encode($row);
}



mysql_close($link);
?>