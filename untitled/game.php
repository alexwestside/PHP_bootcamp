<?php
session_start();

require_once 'Site.class.php';
require_once 'GameZone.class.php';
require_once 'Ship.class.php';
require_once 'Scout.class.php';
require_once 'DB.class.php';

if (!DB::$instance)
{
  DB::init();
  $gopa = DB::getMysqliInstance()->connect_errno."Generation of new";
}

try {
  $gz = Site::loadGameZone();

} catch (Exception $e) {
  $alert = "<script type=\"text/javascript\">alert('".json_encode($e->getMessage())."gopa= ".$gopa."'); </script>";
}
if (!isset($alert))
  $alert = Null;

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="ie.css">
   </head>
   <body>
     <?=$alert?>
     <div style="width:2000px">
      <div id="gamezone">
    <?php
    $gz->printgz();
     ?>
      </div>
     <div id="controls">
       <h1>Controls</h1>
       <div id="ship_desc">
<?php
         if (isset($gz->ships))
          echo $gz->ships[$gz->curShip];
        else
          echo "No more ships";
?>
      </div>
      <div id="realcontrols">
<?php
      $gz->printControls($_SESSION['team']);
 ?>
      </div>
     </div>

     </div>
     <div style="clear:both"></div>
     <div class="chat">
       <div id="msg_list">

       </div>
       <input type="text" name="msg" value="" id="msg">
       <input type="button" name="send" value="send" id="send">
     </div>
    <br>
    <form action="ajax.php?action=delGame" method="post">
      <b>RESET</b>
      <br>
      <button type="submit" name="reset" value="OK">OK</button>
    </form>
    <div class="static">
      <div class="start"></div>
    </div>

     <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
     <script type="text/javascript">
     $(document).ready(function(){
       function reloadMap() {
         $.ajax({
           type:"GET",
           url: "reloadmap.php",
           success: function(data){
             $("#gamezone").html(data);
           }
         });
       }

       function reloadControls() {
         $.ajax({
           type:"GET",
           url: "reloadmap.php",
           data: "controls=OK",
           success: function(data){
             $("#realcontrols").html(data);
           }
         });
       }

       $("input").click(function(){
         var name = $(this).attr('name');
         var value = $(this).val();
         $.ajax({
           type:"GET",
           url: "move.php",
           data: name + "=" + value ,
           success: function(data){
             $("#ship_desc").html(data);
           }
         });
        reloadMap();
        reloadControls();
        return false;
       });

       function send(){
         var name = $(this).attr('name');
         var value = $(this).val();
         $.ajax({
           type:"GET",
           url: "move.php",
           data: name + "=" + value ,
           success: function(data){
             $("#ship_desc").html(data);
           }
         });
        reloadMap();
        reloadControls();
        return false;
       };

       $('#realcontrols').on('click', 'input', function (){
         var name = $(this).attr('name');
         var value = $(this).val();
         $.ajax({
           type:"GET",
           url: "move.php",
           data: name + "=" + value ,
           success: function(data){
             $("#ship_desc").html(data);
           }
         });
        reloadMap();
        reloadControls();
        return false;
           });
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
           $(".static").on('load', '.start', function functionName() {
            $(".start").addClass("end");
           });


           setInterval(reloadmsg, 2500);
           setInterval(reloadMap, 2500);
           setInterval(reloadControls, 2500);

     });
     </script>
   </body>
 </html>
