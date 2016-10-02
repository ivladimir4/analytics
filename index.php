<?php
/**
 * @version 0.0.1-dev
 * @description Тестовое задание на PHP разработчика
 * @author Иванов Владимир <vladimir.ivanov@academmedia.com>
 */

 require_once('settings.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App analytics | Here comes our game name</title>
    <link href="./vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/common.css" rel="stylesheet">

    <link rel="icon" href="./assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-icon">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top bg-gradient-9">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="./">Event Manager</a>
        </div>
    </div>
</nav>

<div class="container">
<?php
if ($database->connect_errno) {
    echo "<h2>Could not connect to database.</h2>";
} else {

$appMain = getApp(); // получаем информацию по приложению
if ($appMain != null) {
?>
    <div class="app_main">
        <div class="app_header">
          <h2><?=$appMain['application_name']?></h2>
          <p>
            <?=$appMain['country']?>,
            <?=$appMain['city']?>,
            <?=$appMain['app_id']?>
          </p>
        </div>

        <div class="app_events">
          <h3>EVENTS SUMMARY</h3>
<?php
$appEvents = getEvents();
?>
          <table class="table table-hover">
            <thead>
              <tr style='font-weight: bold;'>
                <td>#</td>
                <td>event</td>
                <td>date</td>
                <td>time_on</td>
                <td>type</td>
                <td>shuffle color</td>
              </tr>
            </thead>

            <tbody>
<?php
  if ($appEvents != null) {
    foreach ($appEvents as $key => $value) {
      $key = $key+1; $style = '';
      $event = strtolower($value['event']);
      $date = date('d-m-Y H:i',($value['timestamp']/1000));

      if ($value['data.time_on'] > 0) {
        $style.= 'font-style:italic;';
      }
      if ($value['data.type'] > 0) {
        $style.= 'font-weight:bold;';
      }

      if ($style != '') {
        echo "<tr class='row_{$key}' style='{$style}'>";
      } else {
        echo "<tr class='row_{$key}'>";
      }

      echo "<td>{$key}</td>";
      echo "<td>{$event}</td>";
      echo "<td>{$date}</td>";
      echo "<td>{$value['data.time_on']}</td>";
      echo "<td>{$value['data.type']}</td>";
      echo "<td>
        <button class='btn btn-primary' onclick=\"generateColor('{$key}');\">
        shuffle
        </button>
      </td>";
      echo '</tr>';
    }
  } else {
    echo '<tr><h3>Events not found.</h3></tr>';
  }
?>
            </tbody>
          </table>
        </div>

<?php
 } else {
   echo "<h2>Application not found...</h2>";
 }
} //db connect
?>
    </div>
</div>

<script src="./vendors/jquery/jquery.min.js"></script>
<script src="./vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="./assets/js/common.js"></script>
</body>
</html>
