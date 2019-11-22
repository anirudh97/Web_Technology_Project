<?php
   session_start();
   session_destroy();
   setcookie("username", "", time() - 3600);
   setcookie("Rank", "", time() - 3600);
   echo "<script>
         alert('Successfully Logged Out')
         window.location.href='education/index.html'
         </script>";
?>