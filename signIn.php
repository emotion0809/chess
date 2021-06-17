<html>
    <?php
        include "class/database.php";
        $database = new database();
        $id;
        $password;
        if(isset($_POST["signIn"])){
            $database->connect();
            if(isset($_POST["id"]))$id = $_POST["id"];
            if(isset($_POST["password"]))$password = $_POST["password"];
            $database->signIn($id,$password);
        }
    ?>
    <head>
        <title>西洋棋-登入</title>
        <style type ="text/css">
        .title{font-size:24px;font-weight:bold}
        .entrance{height:300px;width:500px;margin-left:auto;margin-right:auto;margin-top:50px;background-color:#00E3E3}
        .entrance-enter{width:300px;margin-left:auto;margin-right:auto;padding:30px;
                            text-align: center;font-size:18px;line-height:40px;font-weight:bold;color:#FFFFFF}
        .entrance-signIn{width:120px;height:40px;text-align: center;position:relative;top:-10px;left:-45px;}
        .entrance-signUp{width:80px;height:40px;position:relative;top:-68px;left:60px;}
        </style>
    </head>
    <body style = "background-color:#FFF8D7">
        <div class = "entrance">
            <div class = "entrance-enter">
                <span class = "title">會員登入</span>
                <hr/>
                <form method = "POST">
                    帳號：　<input type="text" autocomplete="off" name="id">
                    <br/>
                    密碼：　<input type="password"  autocomplete="off" name="password">
                    <br/>
                    <br/>
                    <input type="submit" value="登入" name = "signIn" class = "entrance-signIn">
                </form>
                <form action = "signUp.php">
                        <input type="submit" value="帳號申請" class = "entrance-signUp">
                </form>
            </div>
        </div>
    </body>    
</html>   