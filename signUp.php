<html>
    <?php
        include "class/database.php";
        $database = new database();
        $id;
        $password;
        $password_verify;
        $signUp;
        $database->connect();
        if(isset($_POST["signUp"])){
            $signUp = $_POST["signUp"];
            if(isset($_POST["id"]))$id = $_POST["id"];
            if(isset($_POST["password"]))$password = $_POST["password"];
            if(isset($_POST["password_verify"]))$password_verify = $_POST["password_verify"];
            if($id != "" && $password != "" && $password_verify != ""){
                if($password == $password_verify){ 
                    $database->add_newUsers($id,$password);
                    header("Location:signIn.php"); 
                    exit;
                }else{
                    echo "密碼和確認不相符";
                }
            }else{
                echo "有欄位沒有填寫";
            }
        }
    ?>
    <head>
        <title>西洋棋-帳號申請</title>
        <style type ="text/css">
        .title{font-size:24px;font-weight:bold}
        .signUp{height:300px;width:500px;margin-left:auto;margin-right:auto;margin-top:50px;background-color:#00E3E3}
        .signUp-enter{width:300px;margin-left:auto;margin-right:auto;padding:30px;text-align: center;font-size:18px;line-height:40px;font-weight:bold;color:#FFFFFF}
        .signUp-button{width:123px;height:40px;position:relative;top:-10px;}
        </style>
    </head>
    <body style = "background-color:#FFF8D7">
        <div class = "signUp">
            <div class = "signUp-enter">
                <span class = "title">帳號申請</span>
                <hr/>
                <form method = "post">
                    帳號　　：　<input type="text" autocomplete="off" name="id">
                    <br/>
                    密碼　　：　<input type="password"  autocomplete="off" name="password">
                    <br/>
                    確認密碼：　<input type="password"  autocomplete="off" name="password_verify">
                    <br/>
                    <br/>
                    <input type="submit" value="確定送出" name = "signUp" class = "signUp-button">
                </form>
            </div>
        </div>
    </body>
</html>   