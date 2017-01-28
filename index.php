<!DOCTYPE html>
<html>
  <head>
    <title> PiWatch Network Auditor </title>
    <link rel="icon" type="image/gif" href="Maine.jpg" />
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"> </script>
    <script type="text/javascript" src="js/jquery-ui.min.js"> </script>
    <script type="text/javascript" src="js/piWatchUi.js"> </script>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>

<body>
<div id='main_content_container'>
<div id='left_navbar'>

<?php
require('modules/classes.php');
$moduleData = array_merge(array('homepage' => array(
  'moduleName' => 'Home',
  'moduleDisplay' => 'home.php'
)), getModulesData(), array('reports' => array(
  'moduleName' => 'Summary of Findings',
  'moduleDisplay' => 'reports.php'
)));

foreach ($moduleData as $key => $val){
  echo '<div class="ui-state-default navItem" id="' . $key .'">';
  echo ' <span hidden>modules/reporters/'. $val['moduleDisplay'] . '</span>';
  echo $val['moduleName'];
  echo '</div>';
}

?>
</div>
<div id='right_content'>

</div>
</div>
</body>
</html>
