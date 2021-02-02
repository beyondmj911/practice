<?php 
header("Content-Type: text/html;charset=utf-8");
$username = $_POST['username'];
$password = $_POST['password'];
$response = array('code'=>0,'msg'=>'');
$link = mysql_connect('localhost','root','123456');
if(!$link){
    $response['code']=1;
    $response['msg'] = "数据库连接失败";
    echo json_encode($response);
    exit;
}
if(!$password){
    $response['code']=2;
    $response['msg'] = "密码不能为空";
    echo json_encode($response);
    exit;
}
if(!$username){
    $response['code']=3;
    $response['msg'] = "用户名不能为空";
    echo json_encode($response);
    exit;
}
mysql_select_db('hhp');
mysql_set_charset('utf8');
$sql1 = "SELECT * FROM users where username='{$username}'";
$res1 = mysql_query($sql1);
$row = mysql_fetch_row($res1);
if($row){
    $response['code']=4;
    $response['msg'] = "用户已重名，请更换用户名";
    echo json_encode($response);
    exit;
}


$sql2 = "INSERT INTO users(username,pwd) VALUES('{$username}','{$password}')";
$res = mysql_query($sql2);
if(!$res){
    $response['code']=5;
    $response['msg'] = "数据插入失败";
    echo json_encode($response);
}else{
    $response['msg'] = "注册成功！";
    echo json_encode($response);
}
mysql_close($link);

?>