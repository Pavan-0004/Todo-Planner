<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="./global1.css" /> 
    <link rel="stylesheet" href="./apiglo.css" />
    <link rel="stylesheet" href="./apiind.css" /> 
    
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Racing Sans One:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap"
    />
  </head>
  <?php
  include "config.php";
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
$sql = "SELECT * from todolist";
$result = mysqli_query($conn, $sql);
?>
<?php 
    date_default_timezone_set("Asia/Kolkata");
    $apiKey = "8a99a67d9f6a03abb8583aadef91a69c";
    $cityId = "1273293"; 
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=".$cityId."&lang=en&units=metric&APPID=".$apiKey;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch); 
    $data = json_decode($response);
    
    $currentTime = time();
    ?>

  <body>
    <div class="desktop-2">
      <div class="heading">
        <div class="header">
          <div class="header-child"></div>
          <div class="to-do-now">TO-DO NOW</div>
          <div class="header-child"></div>
        </div>
        <div class="divider">
          <div class="divider1"></div>
          <img class="notepencil-icon" alt="" src="./public/notepencil.svg" />

          <div class="divider1"></div>
        </div>
      </div>
      <div class="texttask">
        <form action = "insert.php" method="post">
          <input
            class="texttask-child"
            type="text"
            defaultvalue="entertext"
            placeholder="Enter your task"
            required
            id="entertext"
            name = "text"
          />
          <input type ="submit" type = "hidden"  name ="button1" class="texttask-item" />
          <label class="add-task">Add task</label>
        </div>
        </form>
      <img class="desktop-2-child" alt="" src="./public/line-3.svg" />

<?php while($rows=mysqli_fetch_assoc($result)) 
{ ?>
<form action = "delete.php" method = get>
<div class="rectangle-parent">
      <section class="group-child"></section>
      <button class="delet-wrapper" name = "btn" value = <?php echo $rows['id'];?> >
          <img class="delet-child" alt="" src="./public/group-727.svg" />
      </button>
      <div class="this-is-text" id="text">
  <tr>  
      <td><?php echo $rows['list']; ?></td> 
  </tr>

 </div>
</div>

<?php 
    } 
    ?>
    </form>
    </div>
    <form class="rparent" action="action.php" method="get">
        <div class="gchild"></div>
        <div class="d" id="temp"><?php echo $data->main->temp;?></div>
        <div class="p">
          <div class="d1">0</div>
          <div class="c">C</div>
        </div>
        <div class="th-mar-22" id="date"><?php echo date("j F,Y",$currentTime)?></div>
        <div class="jhansi-india-wrapper">
          <div class="jhansi-india" id="location">Hyd, India</div>
        </div>
        <img
          class="weathericon-2-52"
          alt=""
          src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon;?>.png"
        />
      </form>
      <img class="d2-child" alt="" src="./public/group-703.svg" />
</body>
  
</html>
