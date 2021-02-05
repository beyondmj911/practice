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
mysql_select_db('hhp');
mysql_set_charset('utf8');
$sql1 = "UPDATE users SET pwd='{$password}' WHERE username='{$username}'";
$res1 = mysql_query($sql1);
if(!$res1){
    $response['code']=2;
    $response['msg'] = "修改失败";
    echo json_encode($response);
}else{
    $response['msg'] = "修改成功";
    echo json_encode($response);
}
mysql_close($link);
?>