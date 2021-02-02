function ajax({method='get',data,url,success,error}){
    var xhr = null;//创建ajax对象
    try{//兼容
        xhr = new XMLHttpRequest();
    }catch(error){
        xhr = new ActiveXObject('Microsoft.XMLHTTP');//兼容IE8
    }
    if(data){
        data = queryString(data);//通过外部函数把数据连成get的url尾部
    }
    if(method=='get'&&data){
        url+='?' + data;
    }
    xhr.open(method,url,true);
    if(method == "get"){
        xhr.send();
    }else{
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xhr.send(data);
    }
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200){
                if(success){
                    success(xhr.responseText);
                }
            }else{
                if(error){
                    error("Error:" + xhr.status);
                }
                
            }
        }
    }
}
function queryString(obj){
    var str = "";
    for(var attr in obj){
        str += attr + '=' + obj[attr] + '&';
    }
    return str.substring(0,str.length-1);
}
   