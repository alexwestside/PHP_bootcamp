<?php
session_start();
require_once 'Site.class.php';
require_once 'DB.class.php';
require_once 'Chat.class.php';
DB::init();
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>check</title>
   </head>
   <body>
<?php
    if (key_exists('login', $_SESSION))
      echo "Welcome, <b>{$_SESSION['login']}</b><br/>";
?>
     <b>login</b>
     <form action="ajax.php?action=login" method="post">
       <input type="text" name="login" value="">
       <input type="text" name="pass" value="">
       <input type="submit" name="submit" value="OK">
     </form>
     <b>register</b>
     <form action="ajax.php?action=register" method="post">
       <input type="text" name="login" value="">
       <input type="text" name="pass" value="">
       <input type="submit" name="submit" value="OK">
     </form>
     <b>logout</b>
     <form action="ajax.php?action=logout" method="post">
       <input type="submit" name="submit" value="OK">
     </form>
     <b>CREATE GAME</b>
     <form action="ajax.php?action=newGame" method="post">
       <input type="text" name="num_players" value="">
       <input type="submit" name="submit" value="OK">
     </form>
     <div class="contein">
      <?php
      // Site::viewAllGames();
       ?>
     </div>
     <br>
     <br>
     <div class="chat">
       <div id="msg_list">

       </div>
       <input type="text" name="msg" value="" id="msg">
       <input type="button" name="send" value="send" id="send">
     </div>
     <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script type="text/javascript">

     $(document).ready(function(){
       function reloadgamelist() {
         $.ajax({
           type:"GET",
           url: "ajax.php",
           data: "action=viewGames",
           success: function(data){
             $(".contein").html(data);
           }
         });
       }
       function reloadmsg() {
         $.ajax({
           type:"GET",
           url: "ajax.php",
           data: "action=loadMsg",
           success: function(data){
             $("#msg_list").html(data);
           }
         });
       }

       $("#send").click(function(){
         var value = $("#msg").val();
         $("#msg").val("");
         $.ajax({
           type:"GET",
           url: "ajax.php",
           data: "action=sendMsg&text=" + value ,
           success: function(data){
             $("#msg_list").html(data);
           }
         });
        return false;
       });


       setInterval(reloadgamelist, 2500);
       setInterval(reloadmsg, 2500);

  });
  </script>
   </body>
 </html>
