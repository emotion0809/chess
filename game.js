var xmlHTTP;
function $_xmlHttpRequest()
    {   
        if(window.ActiveXObject){
        xmlHTTP=new ActiveXObject("Microsoft.XMLHTTP");
        }else if(window.XMLHttpRequest){
        xmlHTTP=new XMLHttpRequest();
        }
    }
function movs(x,y){
    $_xmlHttpRequest();
    xmlHTTP.open("GET","board.php?x="+(x-1)+"&y="+(y-1)); 
        xmlHTTP.onreadystatechange=function check_user(){
            if(xmlHTTP.readyState == 4)
            {
                if(xmlHTTP.status == 200)
                {
                    var str=xmlHTTP.responseText;
                    document.getElementById("board").innerHTML=str;
                }
            }
        }
        xmlHTTP.send(null);
}
