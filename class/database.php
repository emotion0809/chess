<?php
    class database{
        private $ServerName="localhost";
        private $UserName = "emotion";
        private $password = "123456";
        private $DBName = "chess";
        public $conn;
        function connect(){
            $this->conn = mysqli_connect($this->ServerName,$this->UserName,$this->password,$this->DBName);
        }
        function add_newUsers($id,$password){
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $result = mysqli_query($this->conn,$sql);
            if(mysqli_num_rows($result) == 0){
                $sql = "INSERT INTO users (id,password) VALUE ('$id','$password')";
                mysqli_query($this->conn,$sql);
            }else{
                echo "使用者名稱已被使用";
            }
        }
        function signIn($id,$password){
            $sql = "SELECT id,password FROM users WHERE id = '$id'";
            $result = mysqli_query($this->conn,$sql);
            if(mysqli_num_rows($result)> 0){
                $row = mysqli_fetch_assoc($result);
                if($password == $row["password"]){
                    session_start();
                    $_SESSION["id"] = $row["id"];
                    header("Location:index.php"); 
                    exit;
                }else{
                    echo "帳號或密碼不正確";
                }
                echo "帳號或密碼不正確";
            } 
        }
        function get_WinStatistical($id){
            $winStatistical = new SplFixedArray(3);
            $sql = "SELECT win,loss,tie FROM users WHERE id = '$id'";
            $result = mysqli_query($this->conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $winStatistical[0] = $row["win"];
            $winStatistical[1] = $row["loss"];
            $winStatistical[2] = $row["tie"];
            return $winStatistical;
        }
        function get_table(){
            $sql="SELECT*FROM lobby where player1 != ''";
            $result = mysqli_query($this->conn,$sql);
            for($i = 0;$i < 4;$i++){
                if($row = mysqli_fetch_assoc($result)){
                    echo"
                        <form class = 'table' method = 'POST'>
                            <br/>
                            <button type='submit' class = 'table-button' value = '".$row["table_id"]."' name = 'join_table'>
                                <br/>
                                <table width = '500px' hight = '300px' cellpading = '800' class = 'table-table'>
                                    <tr>
                                        <td rowspan = '2' style = 'color:#0066CC'>桌號:".$row["table_id"]."</td>
                                        <td style = 'color:#FFFFFF'>白方</td>
                                        <td>黑方</td>
                                        <td rowspan = '2' style = 'color:#0066CC'>遊玩中</td>
                                    </tr>
                                    <tr>
                                        <td style = 'color:#FFFFFF'><br/>".$row["player1"]."</td>
                                        <td><br/>".$row["player2"]."</td>
                                    </tr>
                                </table>
                                <br/>
                            </button>
                        </form>";
                }
            }
        }
        function join_newtable(){
            for($i = 1;$i <= 100;$i++){
                $sql="SELECT player1 FROM lobby where table_id = $i";
                $result = mysqli_query($this->conn,$sql);
                $row = mysqli_fetch_assoc($result);
                if($row["player1"] == ""){
                    $sql = "UPDATE lobby SET player1 = '".$_SESSION["id"]."' WHERE table_id = $i ";
                    mysqli_query($this->conn,$sql);
                    header("location:game.php");
                    exit;
                }
            }
        }

        function join_table($table_id){
            $sql="SELECT player1,player2 FROM lobby where table_id = $table_id";
            $result = mysqli_query($this->conn,$sql);
            $row = mysqli_fetch_assoc($result);
            echo $row["player1"];
            echo $row["player2"];
            if($row["player1"] != "" && $row["player2"] == ""){
                echo "a";
                $sql = "UPDATE lobby SET player2 = '".$_SESSION["id"]."' WHERE table_id = $table_id ";
                mysqli_query($this->conn,$sql);
                header("location:game.php");
                exit;
            }
        }
    }
?>