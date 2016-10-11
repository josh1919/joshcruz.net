<?php //TODO: I'll need to fix the connection to make sure this will work.
//NEXT FOUR LINES ARE FOR PHOTOGRAPHY.JOSHCRUZ.NET
define("DB_HOST", "localhost");
define("DB_USER", "joshcruz_cs19923");
define("DB_PASS", "1450tobias");
define("DB_NAME", "joshcruz_photography");
  // 1. Create a database connection

  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if ($conn->connect_error) die($conn->connect_error);

 ?><?php //TODO: I'll need to fix the connection to make sure this will work.
// define("DB_SERVER", "localhost");
// define("DB_USER", "root");
// define("DB_PASS", "maudio40");
// define("DB_NAME", "photography");
//   // 1. Create a database connection

//   $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
//   // Test if connection succeeded
//   if ($conn->connect_error) die($conn->connect_error);


// ?>