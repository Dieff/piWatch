<?php

echo exec('/usr/local/bin/wkhtmltopdf --zoom 5 http://localhost/piWatch/modules/webHelpers/fullSummary.php ../../temp/report.pdf');

?>
