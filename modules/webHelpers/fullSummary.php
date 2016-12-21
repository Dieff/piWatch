<html>

<style>

.test{
  width: 500px;
}

</style>

<body class="test">
<b>An Executive Summary of our findings that
you should totally give to your boss</b> <br> <br>
<?php
$a = json_decode(file_get_contents("../modules.json"), true);

foreach ($a as $key => $value){
  echo '<p>';
  include '../reporters/' . $value['moduleDisplay'];
  echo '</p>';
}
?>
</body>
</html>
