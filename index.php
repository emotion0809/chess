<html>
    <head>
        <title>西洋棋</title>
        <style type ="text/css">
        .title{font-size:60px;font-weight:bold}
        .center{width:300px;margin-left:auto;margin-right:auto;margin-top:150px;text-align: center;line-height:20px}
        .select{width:180px;height:40px;font-size:20px}
        .user{width:120px;position:absolute;top:15px;right:0px;text-align: center}
        .user-bloder{width:90px;height:90px;margin-left:auto;margin-right:auto;font-size:80px;border-style:outset;color:#0066CC;border-color:#0066CC;background-color:#FFFFFF}
        .signIn{width:80px;height:25px}
        .win_statistical{font-size:16px;color:#0066CC};
        </style>
    </head>
    <body style = "background-color:#FFF8D7">
        <?php
            include "class/database.php";
            $database = new database();
            $id = "?";
            session_start();
            if(isset($_POST["signOut"]))session_unset();
            if(isset($_SESSION["id"]))$id = $_SESSION["id"];
            if($id == "?"){
                echo"<div class = 'user'>
                        <div class = 'user-bloder'>?</div>
                        <br/>
                        <form action = 'signIn.php'>
                            <input type='submit' value='登入' class = 'signIn'>
                        </form>
                    </div>";
            }else{
                $database->connect();
                $id_fristword = strtoupper(substr($id,0,1));
                $win_statistical = $database->get_WinStatistical($id);
                echo"<div class = 'user'>
                        <div class = 'user-bloder'>$id_fristword</div>
                        <div class = 'win_statistical'>勝:$win_statistical[0]敗:$win_statistical[1]和:$win_statistical[2]<br/></div>
                        <form action = 'index.php' method = 'post'>
                            <input type='submit' value='登出' name = 'signOut' class = 'signIn'>
                        </form>
                    </div>";
            }
            if(isset($_POST["start"])){
                if($id != "?"){
                    header("Location:lobby.php"); 
                    exit;
                }else{
                    echo "請先登入";
                }
            }
        ?>
        <div class = "center">
            <div class = "title">
            Chess
            </div>
            <br/>
            <br/>
            <hr/>
            <form method = "POST">
                <br/>
                <input type="submit" value="開始遊玩" name = "start" class = "select">
            <form>
            </form>
                <br/>
                <input type="button" value="覆盤" class = "select">
            </form>
        </div>
    </body>    
</html>   