<?php
  $server = DB_SERVER;
  $username = DB_USERNAME;
  $password = DB_PASSWORD;
  $dbname = DB_DATABASE_NAME;
  $db_connection = new mysqli($server,$username,$password);

  if(mysqli_connect_error())
  {
      die("Could not connect to database!: " . mysqli_connect_error());
  }
   $dbTableFound = mysqli_select_db($db_connection,$dbname);
  /*check if table exists*/
      //*create database table first use*/
  if (!$dbTableFound)
  {
        //*create database first use*/
      $myDB = "CREATE DATABASE taskDB";
      if (mysqli_query($db_connection, $myDB))
      {
         mysqli_select_db($db_connection,$dbname);
         $newTable = 'CREATE TABLE ' . DB_TABLE_NAME .
          '(
         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,'.
         DB_SHORT_DESC . ' VARCHAR(90) NOT NULL,'.
         DB_LONG_DESC . ' VARCHAR(90),'.
         DB_TASK_COMPLETED . ' TINYINT(1) UNSIGNED DEFAULT "0"
         )';
         mysqli_query($db_connection, $newTable);
         $dbTableFound = mysqli_select_db($db_connection,$dbname);
         
         if(!$dbTableFound)
         {
             echo '<div>There was a problem creating the database table. The following error occured:<br> ' .  mysqli_connect_error() . '<br>';
             die("Could not create database table!: " . mysqli_connect_error());
         }
      }
      else
      {
           die("Could not create database!: " . mysqli_connect_error());
      }
  }
?>
