<?php 

/*
                    ______                 __      
   ____ ___  __  __/ ____/______  ______  / /_____ 
  / __ `__ \/ / / / /   / ___/ / / / __ \/ __/ __ \
 / / / / / / /_/ / /___/ /  / /_/ / /_/ / /_/ /_/ /
/_/ /_/ /_/\__, /\____/_/   \__, / .___/\__/\____/ 
          /____/           /____/_/      

          Student project by Anthony.D
          Project starded on 15_03_2022
*/

session_start();
$host = "localhost"; /* Hostname */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "myCrypto"; /* Database name */

$con = mysqli_connect($host, $user, $password, $dbname);
// Chech connection
if(!con){
    die("Connection failed:" .mysqli_connect_error());
}

?>