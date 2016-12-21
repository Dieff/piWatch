<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../classes.php';

$pdo = getPDO();
$stmt = $pdo->query('SELECT ssid, enc, bssid, sign FROM wifi ORDER BY sign ASC');
$stmt->execute();

echo "<h1 id='header'>Wifi Network Results</h1>";
echo "<table>";
  echo "<tr>";
    echo "<th align=center colspan=3>Legend</th>";
  echo "</tr>";
  echo "<tr>";
    echo "<td bgcolor=#FF0000>Red: No Encryption. Data sent is at great potential risk.</td>";
    echo "<td bgcolor=#FFFF00>Yellow: Weak Encryption. Data sent is at moderate potential risk. Up to date encryption should be used.</td>";
    echo "<td bgcolor=#00FF00>Green: Good Encryption. Data sent is at minimal potential risk.</td>";
  echo "</tr>";
echo "</table>";
echo "<p>";
echo "<table>";
  echo "<tr>";
    echo "<th>SSID</th>";
    echo "<th>Encryption</th>";
    echo "<th>BSSID</th>";
    echo "<th>Signal</th>";
  echo "</tr>";
$count = 0;
while( $row = $stmt->fetch() ) {
  $count++;
  echo "<tr>";
    echo "<td>$row[0]</td>";
    $bgcolor = "#FFFFFF";
    if($row[1] == "None"){
      $bgcolor = "#FF0000";
    }
    elseif($row[1] == "wpa" || $row[1] == "wep"){
      $bgcolor = "#FFFF00";
    }
    elseif($row[1] == "wpa2"){
      $bgcolor = "#00FF00";
    }

    echo "<td bgcolor=$bgcolor>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
  echo "</tr>";
}
echo "</table>";

if($count == 0){
  echo '(No wifi networks found)';
}
?>
