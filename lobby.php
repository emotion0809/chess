<html>

<?php
    include "class/database.php";
    $database = new database();
    $database->connect();
    if(isset($_POST["create"])){
        $database->add_newtable();                   
    }
    session_start();
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
                    for($i = 1;$i <= 3;$i++){
                        $database->get_table($i);
                        if(isset($_SESSION["table_id"])){
                            if($_SESSION["table_id"] != 0){
                                echo"
                                    <form class = 'table'>
                                        <br/>
                                        <button type='submit' class = 'table-button'>
                                            <br/>
                                            <table width = '500px' hight = '300px' cellpading = '800' class = 'table-table'>
                                                <tr>
                                                    <td style ='color:#0066CC'>桌號:".$_SESSION["table_id"]."</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan = '2' style = 'color:#0066CC'>".$_SESSION["time"]."</td>
                                                    <td style = 'color:#FFFFFF'>白方</td>
                                                    <td>黑方</td>
                                                    <td rowspan = '2' style = 'color:#0066CC'>遊玩中</td>
                                                </tr>
                                                <tr>
                                                    <td style = 'color:#FFFFFF'><br/>".$_SESSION["player1"]."</td>
                                                    <td><br/>".$_SESSION["player2"]."</td>
                                                </tr>
                                            </table>
                                            <br/>
                                        </button>
                                    </form>";
                            $_SESSION["table_id"] = 0;
                            }
                        }  
                    }
                    
                ?>
            </div>
            <div class = "right">
                <div class = "button">
                    <form method="POST" action="lobby.php">
                        <input type="submit" value="開設新房" class = "newtable-button" name="create">
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