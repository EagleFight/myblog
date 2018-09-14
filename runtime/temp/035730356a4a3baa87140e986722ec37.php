<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"E:\xampp\htdocs\tp5\public/../application/home\view\index\chat1.html";i:1536555146;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/static/chat/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/chat/css/style.css" rel="stylesheet">
    <!-- Include these three JS files: -->
    <script type="text/javascript" src="/static/chat/js/swfobject.js"></script>
    <script type="text/javascript" src="/static/chat/js/web_socket.js"></script>
    <script type="text/javascript" src="/static/chat/js/jquery.min.js"></script>
    <script>
        if (typeof console == "undefined") {    this.console = { log: function (msg) {  } };}
        // 如果浏览器不支持websocket，会使用这个flash自动模拟websocket协议，此过程对开发者透明
        WEB_SOCKET_SWF_LOCATION = "/static/chat/swf/WebSocketMain.swf";
        // 开启flash的websocket debug
        WEB_SOCKET_DEBUG = true;

        var ws, name, client_list={};
        // 连接服务端
        function connect() {
            // 创建websocket
            ws = new WebSocket("ws://"+document.domain+":7272");
            // 当socket连接打开时，输入用户名
            ws.onopen = onopen;
//        // 当有消息时根据消息类型显示不同信息
            ws.onmessage = onmessage;
            ws.onclose = function() {
                console.log("连接关闭，定时重连");
                connect();
            };
            ws.onerror = function() {
                console.log("出现错误");
            };
        }
        function onopen()
        {
            if(!name)
            {
                show_prompt();
            }
            // 登录
            var login_data = '{"type":"login","client_name":"'+'唐彦武'.replace(/"/g, '\\"')+'","room_id":"3"}';
            console.log("websocket握手成功success，发送登录数据:"+login_data);
            ws.send(login_data);
        }

        // 输入姓名
        function show_prompt(){
            name = prompt('输入你的名字：', '');
            if(!name || name=='null'){
                name = '游客';
            }
        }
        // 服务端发来消息时
        function onmessage(e)
        {
            console.log(e.data);
            var data = eval("("+e.data+")");
            switch(data['type']){
                // 服务端ping客户端
                case 'ping':
                    ws.send('{"type":"pong"}');
                    break;;
                // 登录 更新用户列表
                case 'login':
                    //{"type":"login","client_id":xxx,"client_name":"xxx","client_list":"[...]","time":"xxx"}
                    say(data['client_id'], data['client_name'],  data['client_name']+' 加入了聊天室', data['time']);
                    if(data['client_list'])
                    {
                        client_list = data['client_list'];
                    }
                    else
                    {
                        client_list[data['client_id']] = data['client_name'];
                    }
//                    flush_client_list();
                    console.log(data['client_name']+"登录成功");
                    break;
                // 发言
                case 'say':
                    //{"type":"say","from_client_id":xxx,"to_client_id":"all/client_id","content":"xxx","time":"xxx"}
                    say(data['from_client_id'], data['from_client_name'], data['content'], data['time']);
                    break;
                // 用户退出 更新用户列表
                case 'logout':
                    //{"type":"logout","client_id":xxx,"time":"xxx"}
                    say(data['from_client_id'], data['from_client_name'], data['from_client_name']+' 退出了', data['time']);
                    delete client_list[data['from_client_id']];
                    flush_client_list();
            }
        }
        // 提交对话
        function onSubmit() {
            var input = document.getElementById("textarea");
            var to_client_id = $("#client_list option:selected").attr("value");
            var to_client_name = $("#client_list option:selected").text();
            ws.send('{"type":"say","to_client_id":"'+to_client_id+'","to_client_name":"'+to_client_name+'","content":"'+input.value.replace(/"/g, '\\"').replace(/\n/g,'\\n').replace(/\r/g, '\\r')+'"}');
            input.value = "";
            input.focus();
        }

        // 发言
        function say(from_client_id, from_client_name, content, time){
            $("#chat-container").append('<div class="speech_item"><img src="http://lorempixel.com/38/38/?'+from_client_id+'" class="user_icon" /> '+from_client_name+' <br> '+time+'<div style="clear:both;"></div><p class="triangle-isosceles top">'+content+'</p> </div>');
        }
    </script>
    <style>
        #chat-container{width: 100%;height: auto;}
    </style>
</head>
<body onload="connect()">
<form onsubmit="onSubmit(); return false;">
    <select>
        <option value="1">游客1</option>
        <option value="2">游客2</option>
    </select>
    <textarea id="textarea"></textarea>
    <input type="submit" class="btn btn-default" value="发表" />
</form>
<div id="chat-container">
    <div>
        <p>08:00</p>
        <h6><span>你好啊</span></h6>
    </div>
</div>
</body>
</html>