<?php
/**
 * @version 0.0.1-dev
 * @description Тестовое задание на PHP разработчика
 * @author Иванов Владимир <vladimir.ivanov@academmedia.com>
 */

 date_default_timezone_set('Etc/GMT-7');
 setlocale(LC_ALL, 'ru_RU');
 $database = new mysqli("127.0.0.1", "root", "root", "analytics");
 $application = "ios.111111.app-store";

 function getApp() {
   global $database,$application;

   $result = $database->query("SELECT * FROM `apps` WHERE app_id='{$application}';");
   $array = $result->fetch_assoc();

   return $array;
 }
 function getEvents() {
   global $database,$application;

   $result = $database->query("SELECT * FROM `events` WHERE app_id='{$application}' ORDER by `data.time_on` DESC;");
   while($row = $result->fetch_assoc()) {
     $array[] = $row;
   }

  return $array;
 }
?>
