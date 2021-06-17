<html>

<?php
    include "class/database.php";
    $database = new database();
    $database->connect();
    session_start();
    if(isset($_POST["join_new_table"])){
        $database->join_newtable();                   
    }
    if(isset($_POST["join_table"])){
        $database->join_table($_POST["join_table"]);
    }
?>
    <head>
        <title>西洋棋-大廳</title>
        <style type ="text/css">
        .container{width:100%;height:100%}
        .left{width:25%;height:100%;margin:0px;background-color:#FFF8D7;display:inline-block;vertical-align:top}
        .center{width:50%;height:100%;margin:0px;background-color:#FFFFFF;display:inline-block;text-align: center;vertical-align:top}
        .right{width:24%;height:100%;margin:0px;background-color:#FFF8D7;display:inline-block;vertical-align:top}
        .table{background-color:#FFFFFF;border-color:#0066CC;line-height:30px}
        .table-button{background-color:#ACD6FF;line-height:15px;border:5px #0066CC solid}
        .table-table{font-size:20px;font-weight:bold}
        .button{height:50px;margin-top:450px;text-align: center}
        .newtable-button{width:250px;height:40px;font-size:20px}
        .other-button{width:60px;height:30px;line-height:30px;font-size:16px}
        </style>
    </head>
    <body style = "margin:0px;background-color:#FFF8D7">
        <div class = "container">
            <div class = "left"></div>
            <div class = "center">
                <?php
                    $database->get_table();
                ?>
            </div>
            <div class = "right">
                <div class = "button">
                    <form method="POST" action="lobby.php">
                        <input type="submit" value="開設新房" class = "newtable-button" name="join_new_table">
                        <br/>
                        <br/>
                        <input type="button" value="上一頁" class = "other-button">
                        <input type="button" value="下一頁" class = "other-button">
                        <input type="button" value="刷新" class = "other-button" onclick="window.location.reload()"  >
                        <input type="button" value="離開" class = "other-button" onclick="javascript:location.href='./index.php'">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>