<?php 
  $servername = "";
  $username = "";
  $password = "";
  $database = "";
  $tablename = "";
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>GamePlayer</title>
    
  </head>
  <body class="colorme">
    <div id="cookiecutter" style="float:right;">
      <a href="cookieset.html"><h2>
        Set Cookie
        </h2></a>
    </div>
    <form action="index.php" method="get">
      Groupname:<input name="groupname" readonly id="groupname" value="error"/>  
      Gamename:<input name="gamename" readonly id="gamename" value="error"/>  
      QuestionID:<input type="number" step="1" name="questionid" id="questionid" 
        value="<?php if (intval($_GET["questionid"])){echo intval($_GET["questionid"])+1;}else { echo "1";}?>"/><br>
      <input type="submit" id="submit" class="colorme" style="display:none; width:95%;height:200px;"/>
    </form>
  
    <script>
 function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
 }
  var inputgroup = document.getElementById("groupname");
  var inputgame  = document.getElementById("gamename");
  inputgroup.setAttribute("value",getCookie("groupname"));
  console.log("groupname: "+ getCookie("groupname"));
  console.log("gamename: " + getCookie("gamename"));
  inputgame.setAttribute("value",getCookie("gamename"));
  function show() {
    document.getElementById("submit").style.display="block";
  }
  setTimeout(show,5000);
   
  </script>
<!-- 
Future Things to do:

JS delay Button Show 5 sec
Big Button
Everything Else Small
-->
  <?php 
 
  $sql = "INSERT INTO `" . $tablename . "` ";
  $sql .= "(`Time`, `Group`, `Game`, `Question`)";
  $sql .= " VALUES (CURRENT_TIMESTAMP, '" . $_GET['groupname'] . "', '";
  $sql .= $_GET['gamename'] . "', '" .$_GET['questionid'] . "');";
  $sqlr = "SELECT  * FROM  `Timing` WHERE  Game =  '";
  $sqlr .= $_GET['gamename'] ."' and Question = '" . $_GET['questionid'] . "';";
  $conn = mysqli_connect($servername, $username, $password, $database);
  echo "<script>console.log('variables and connections')</script>";
  if ($conn->connect_error) {
    die("My vision is impaired! I cannot see!!" . $conn->connect_error);
  } 
  if ($conn->query($sql) === TRUE) {
    echo "Excellent.";
  }
  $result = $conn->query($sqlr);
  echo "<table>";
  while($row = $result->fetch_assoc()) {
      echo "<tr><td>". $row["Group"] . "</td></tr>";
  }
  echo "</table>";
  if (intval($result->num_rows) > 1) {
    echo "<style>body{background-color:red;} #submit{background-color:lightcoral;}</style>";
  } else{
    echo "<br><style>body{background-color:lime;}#submit {background-color:limegreen;}</style>";
  }
  
  
  echo $result->num_rows;
  mysqli_close($conn);
  
  
  
  ?>
 </body>
</html>
