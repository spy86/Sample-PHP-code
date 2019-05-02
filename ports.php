<?php
/**
* This script allows you to scan hosts
* Detection of open and closed ports.
*
*
*/

// Insert a style sheet to the results properly looked
echo '<html>'."\n"
       .' <head>'."\n"
       .'  <title>port scanner </title>'."\n"
       .'   <style type="text/css">'."\n"
       .'            body{background-color:#FFFFFF;font: 13px Tahoma; color: #000000; vertical-align: middle;}'."\n"
       .'   </style>'."\n"
       .' </head>'."\n"
       .'<body>'."\n";

// Script can perform long!
set_time_limit(0);

// Disable error reporting
error_reporting(0);

// Set the host to scan ...
$host = '127.0.0.1';

// Set the example by typing the value 0
// The following values ??have been entered, for example ...
$port_begin = '2';
$port_end = '2000';

// Set two variables default ... needed to display the statistics DO NOT MODIFY!
$open_ports = '0';
$closed_ports = '0';

// Check to see if the values ??have been entered;]
if(empty($host) OR empty($port_begin) OR empty($port_end)) {
      die('There have been filled in the appropriate fields - see the source of the script and complete !');
}

echo '� <b>Scanned ports:</b>'."\n"
       .'<br>'."\n";

for($i = $port_begin; $i <= $port_end; $i++) {
      $fp = fsockopen($host, $i);
     
      if($fp) {
            echo '<b>'.$i.'</b> -> <b>open</b>'."\n"
                  .'<br>';
            $open_ports++;
      } else {
            echo $i.' -> closed'."\n"
                  .'<br>';
            $closed_ports++;
      }
     
      fclose($fp);
}

echo '<br>'."\n"
       .'<b>Statistics:</b>'."\n"
       .'      <br>'."\n"
       .'Number of ports open: <b>'.$open_ports.'</b>'."\n"
       .'      <br>'."\n"
       .'Number of ports closed: '.$closed_ports."\n"
    .'</body>'."\n"
       .'</html>';

?> 