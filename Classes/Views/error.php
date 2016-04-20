<?php header("HTTP/1.0 404 Not Found") ?>

<div class="alert alert-danger" role="alert">
<?php 
echo '<p><strong>Fehler!</strong></p>';
echo $controller;
echo $action;
?>
</div>