<b>Welcome to PiWatch</b> <br> <br>
Select the button below to start a scan of your network
<br> <br> <br> <br>
<div id="scan_button"> Start Scan </div>

<script type="text/javascript">
$(document).ready(function(){
  $('#scan_button').button().click(function(){
    $.ajax({
      url: 'modules/webHelpers/startScan.php',
      })
    .done(function(resp) {
      console.log(resp);
    });
  })
});
</script>
