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
if(!$username){
    $response['code']=2;
    $response['msg'] = "用户名不能为空";
    echo json_encode($response);
    exit;
}
if(!$password){
    $response['code']=3;
    $response['msg'] = "密码不能为空";
    echo json_encode($response);
    exit;
}
mysql_select_db('hhp');
mysql_set_charset('utf8');
$sql1 = "SELECT * FROM users where username='{$username}' and pwd='{$password}'";
$res1 = mysql_query($sql1);
$row = mysql_fetch_row($res1);
if(!$row){
    $response['code']=4;
    $response['msg'] = "用户或者密码错误，请重新输入！";
    echo json_encode($response);
}else{
    $response['msg'] = "登陆成功,2s后自动跳转到登陆界面";
    echo json_encode($response);
}

mysql_close($link);

?>