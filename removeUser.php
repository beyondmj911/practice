<?php 
header("Content-Type: text/html;charset=utf-8");
$id = $_GET['id'];
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
$sql = "DELETE from users WHERE id=$id";
$res = mysql_query($sql);
if(!$res){
    $response['code']=2;
    $response['msg'] = "数据删除失败";
    echo json_encode($response);   
}else{
    $response['msg'] = "数据删除成功";
    echo json_encode($response);
}
mysql_close($link);