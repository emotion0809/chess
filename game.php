<html>
<?php
    include "class/database.php";
    session_start();
    $_SESSION["p"]=array(
        array("wrook","wknight","wbishop","wqueen","wking","wbishop","wknight","wrook"),
        array("wpawn","wpawn","wpawn","wpawn","wpawn","wpawn","wpawn","wpawn"),
        array("blank","blank","blank","blank","blank","blank","blank","blank"),
        array("blank","blank","blank","blank","blank","blank","blank","blank"),
        array("blank","blank","blank","blank","blank","blank","blank","blank"),
        array("blank","blank","blank","blank","blank","blank","blank","blank"),
        array("pawn","pawn","pawn","pawn","pawn","pawn","pawn","pawn"),
        array("rook","knight","bishop","queen","king","bishop","knight","rook")
    );
    $_SESSION["color"]=array(
        array("w","w","w","w","w","w","w","w"),
        array("w","w","w","w","w","w","w","w"),
        array("blank","blank","blank","blank","blank","blank","blank","blank"),
        array("blank","blank","blank","blank","blank","blank","blank","blank"),
        array("blank","blank","blank","blank","blank","blank","blank","blank"),
        array("blank","blank","blank","blank","blank","blank","blank","blank"),
        array("b","b","b","b","b","b","b","b"),
        array("b","b","b","b","b","b","b","b")
    );
    $_SESSION["can_move"] = array();
    for($i = 1;$i <= 8;$i++){
        for($j = 1;$j <= 8;$j++){
            if(($i+$j)%2==1){
                $_SESSION["can_move"][$j-1][$i-1] = "#745c57";
            }else{
                $_SESSION["can_move"][$j-1][$i-1] = "#d9c7a9";
            }
        }
    }
    $_SESSION["action"] = 1;
    $_SESSION["self"] = "b";
    $_SESSION["enenmy"] = "w";
?>
<head>
<title>西洋棋</title>
        <style type ="text/css">
        input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border:dashed;
  color: transparent;
  padding: 16px 32px;
  text-decoration: none;
  cursor: pointer;
}
        .left{width:25%;height:100%;margin:0px;background-color:#FFF8D7;display:inline-block;vertical-align:top}
        .center{width:50%;height:100%;margin:0px;background-color:#FFFFFF;display:inline-block;text-align: center;vertical-align:top}
        .right{width:24%;height:100%;margin:0px;background-color:#FFF8D7;display:inline-block;vertical-align:top}
        .button{height:50px;margin-top:450px;text-align: center}
        .rook{background-size: cover;background-position: center;background-image:url(Image/rook.png);background-repeat:no-repeat;width:95%;height:95%;}
        .pawn{background-size: cover;background-position: center;background-image:url(Image/chess.png);background-repeat:no-repeat;width:95%;height:95%;}
        .bishop{background-size: cover;background-position: center;background-image:url(Image/bishop.png);background-repeat:no-repeat;width:95%;height:95%;}
        .knight{background-size: cover;background-position: center;background-image:url(Image/knight.png);background-repeat:no-repeat;width:95%;height:95%;}
        .king{background-size: cover;background-position: center;border-width:3px;background-image:url(Image/king.png);background-repeat:no-repeat;width:95%;height:95%;}
        .queen{background-size: cover;background-position: center;background-image:url(Image/queen.png);background-repeat:no-repeat;width:95%;height:95%;}
        .blank{background-size: cover;background-position: center;background-image:url(Image/blank.png);background-repeat:no-repeat;width:95%;height:95%;}
        .wrook{background-size: cover;background-position: center;background-image:url(Image/wrook.png);background-repeat:no-repeat;width:95%;height:95%;}
        .wpawn{background-size: cover;background-position: center;background-image:url(Image/wchess.png);background-repeat:no-repeat;width:95%;height:95%;}
        .wbishop{background-size: cover;background-position: center;background-image:url(Image/wbishop.png);background-repeat:no-repeat;width:95%;height:95%;}
        .wknight{background-size: cover;background-position: center;background-image:url(Image/wknight.png);background-repeat:no-repeat;width:95%;height:95%;}
        .wking{background-size: cover;background-position: center;border-width:3px;background-image:url(Image/wking.png);background-repeat:no-repeat;width:95%;height:95%;}
        .wqueen{background-size: cover;background-position: center;background-image:url(Image/wqueen.png);background-repeat:no-repeat;width:95%;height:95%;}
        .green{border:5px #00FF00 solid}
        </style>
</head>
    <body style = "background-color:#FFF8D7">
    <script type="text/javascript" src="game.js"></script>
    <div class="left">
    </div>
    <div class="center" id = "board">
            <table width="100%" height="100%">
            <?php
             
            for($i = 1;$i <= 8;$i++){
                echo"<tr>";
                    for($j = 1;$j <= 8;$j++){
                        if(($i+$j)%2==1)
                        {
                            echo"
                            <td bgcolor = '#745c57' style='border:3px ".$_SESSION["can_move"][$i-1][$j-1]." solid;'>";
                            echo "<input id='slot".$i.",".$j."' style='background-color:#745c57;' class='".$_SESSION["p"][$i-1][$j-1]." 'onclick='movs($i,$j)' value='' type='button'>";
                            echo"</td>";
                        }else{
                            echo"
                            <td bgcolor = '#d9c7a9' style='border:3px ".$_SESSION["can_move"][$i-1][$j-1]." solid;'>";
                            echo "<input id='slot".$i.",".$j."' style='background-color:#d9c7a9;' class='".$_SESSION["p"][$i-1][$j-1]." 'onclick='movs($i,$j)' value='' type='button'>";
                            echo"</td>";
                        }
                    }
                    echo"</tr>";
                }        
                ?>
            </table>
            </div>
            <div class="right">
            <div class = "button">
                    <form method="POST" action="lobby.php">
                        <input style="background-image:url(Image/rook.png);background-repeat:no-repeat;width:70px;height:70px;" value="King" type="submit" class = "newtable-button" name="create">
                        <br/>
                        <br/>
                        <input id="fuck" type="button" name="test" value="上一頁" class = "other-button">
                        <input type="button" value="下一頁" class = "other-button">
                        <input type="button" value="刷新" class = "other-button" onclick="movs(2,4)"  >
                        <input type="button" value="離開" class = "other-button" onclick="javascript:location.href='./index.php'">
                    </form>
                  <script>
                  </script>
                </div>
            </div>
    </body>  
</html>