<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\xampp\htdocs\tp5\public/../application/index\view\index\talk.html";i:1536400684;}*/ ?>
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
        // 连接建立时发送登录信息
        function onopen()
        {
            if(!name)
            {
                show_prompt();
            }
            // 登录
            var login_data = '{"type":"login","client_name":"'+name.replace(/"/g, '\\"')+'","room_id":"<?php echo isset($_GET['room_id']) ? $_GET['room_id'] : 1?>"}';
            console.log("websocket握手成功，发送登录数据:"+login_data);
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
                    flush_client_list();
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
    </script>
</head>
<body onload="connect()">
    <form>
        <textarea id="content"></textarea>
    </form>
</body>
</html>