<?php include("conn.php"); 


if($_POST){
  if($_POST["name"]){
      $name= $_POST["name"];
      $txt= $_POST["txt"];
      $time = date("h:i");
      $today = date("l");


     $send = "INSERT INTO `chat`(`name`, `txt`, `date_time`, `today`) VALUES ('$name', '$txt', '$time', '$today');";
     $res = $conn->query($send);
    }

    if($_POST["username"]){
        $user = $_POST["username"];
        setcookie("username", $user, time() + (86400 * 30), "/");
    
    }
     



}
$cookp = "";
if(isset($_COOKIE["username"])){
$cookp = $_COOKIE["username"];
}


?>

<head>
<link rel="stylesheet" href="t_6.css">
<title>Refresh Div withour refershing the page completely</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="home.js"></script>
</head>
<body>
    <?php 
    
    if ($cookp == ""){
    ?>
    <div class="chat-wel" id="hide">
    <iframe name="votar" style="display:none;" ></iframe>
    <form action="index.php" method="post" target="votar">

    <input type="text" name="username" class="el-txt-send" placeholder="Username"/>
    <input type="text" name="pass" class="el-txt-send" placeholder="Password"/>

    <input type="submit" class="txt-btn"  onclick="done()" value="Done">
    </form>
     </div>

    <?php } else {?>

    

 
    <div class="chat"  id="show">
    <div id="cont" class="txts">
    <div id="chat"></div>
    <div id="m"></div>
 

   

    </div>
    <div class="space-x"></div>
    <iframe name="votar" style="display:none;" ></iframe>
    <form action="index.php" class="form" method="post" target="votar" onloadeddata="send()">
    <input type="text" name="txt" id="txt" class="el-txt-send" required="required"/>
    <input type="text" name="name" value="<?php echo $cookp; ?>" hidden/>
    <input type="submit"  value="Send" onclick="scroll()" class="txt-btn"/>
    </form>
    </div>

    <?php }?>
   

    
</body>
</html>