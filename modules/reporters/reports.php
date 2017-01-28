<div id='view_button'> View Report </div>
<div id='download-button'> Download as PDF </div>

<a hidden id='hiddenDownloadStarter' href="http://localhost/piWatch/temp/report.pdf" download="report.pdf">Download</a>

<script type='test/javascript'>
$(document).ready(function(){
  $('#view_button').button().click(function(){
    window.location = 'http://localhost/piWatch/modules/webHelpers/fullSummary.php';
  }
  );
  $('#download-button').button().click(function(){
    $.ajax({
      url: 'http://localhost/piWatch/modules/webHelpers/createPDF.php',
      })
    .done(function(resp) {
      document.getElementById('hiddenDownloadStarter').click();
    });
  });
});
</script>
