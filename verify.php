<?php
   // include("config.php");
   // session_start();
   
   // if($_SERVER["REQUEST_METHOD"] == "POST") {
   //    // username and password sent from form 
      
   //    $myusername = mysqli_real_escape_string($db,$_POST['username']);
   //    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
   //    $sql = "SELECT username FROM users WHERE username = '$myusername' and pwd = '$mypassword'";
   //    $result = mysqli_query($db,$sql);
   //    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //    $active = $row['active'];
      
   //    $count = mysqli_num_rows($result);
      
   //    // If result matched $myusername and $mypassword, table row must be 1 row
		
   //    if($count == 1) {
   //      //  session_register("myusername");
   //       $_SESSION['login_user'] = $myusername;
   //       header("location: studentDashboard.html");
   //    }else {
   //       // $error = "Your Login Name or Password is invalid";
   //       // header("location: index.html");
   //       echo "<script>
   //       alert('Invalid Password or Username')
   //       window.location.href='index.html'
   //       </script>";

   //    }
   // }
   // $db->close();
   session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "credentials";
   $conn = new mysqli($servername, $username, $password, $dbname);
   $flag=1;
   $uname = $_POST['username'];
   $pwd = md5($_POST['password']);
   $sql = "SELECT username , ranking FROM users WHERE username = ? and pwd = ?";
   if($stmt=$conn->prepare($sql)){
       $stmt->bind_param("ss",$uname,$pwd);
       $stmt->execute();
       $stmt->bind_result($user,$rank);
   while($stmt->fetch()){
      if($user!='admin@college.edu'){
         setcookie("username", $user, time()+60*60*24);
         setcookie("Rank", $rank, time() + 60*60*24);
         // setcookie("username", $uname, TRUE);
         echo '<script>alert("Welcome '.$uname.'")</script>';
         echo '<script>window.location.href = "studentDashboard.html"</script>';
         
      }
      else{
          echo '<script>alert("Welcome '.$uname.'")</script>';
          echo '<script>window.location.href = "adminDashboard.html"</script>';

      }
      $flag=0;
   }
   if($flag){
      echo "<script>alert('Invalid Username or Password'); window.location.href = 'index.html';</script>";
   }
}



   // $rs=mysqli_query($conn,$sql);
   // if(mysqli_num_rows($rs)<1)
   // {
   //    echo "<script>alert('Invalid Username or Password')
   //  window.location.href = 'index.html'
   //  </script>";
   // }
   // else if($uname!='admin@college.edu')
   //  {
   //    $rank_query = "SELECT ranking FROM users WHERE username = '$uname'";
   //    $query_result = mysqli_query($conn,$rank_query);
   //    $row = $query_result->fetch_assoc();
   //    $rank = $row['ranking'];
      

   //    // $_SESSION["login"]=$uname;
   //    // $_SESSION["Rank"] = $rank;


      // setcookie("username", $uname, time()+60*60*24);
      // setcookie("Rank", $rank, time() + 60*60*24);
      // // setcookie("username", $uname, TRUE);
      // echo '<script>alert("Welcome '.$uname.'")</script>';
      // echo '<script>window.location.href = "studentDashboard.html"</script>';
   // }
   // else
   // {
   // echo '<script>alert("Welcome '.$uname.'")</script>';
   // echo '<script>window.location.href = "adminDashboard.html"</script>';
   // }

?>