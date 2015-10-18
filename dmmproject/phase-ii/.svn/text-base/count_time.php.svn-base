<?php
session_start();

$time = microtime(true);

if (!$_SESSION['foo']) {
    $_SESSION['foo'] = (microtime(true)+20);
}
?>
<script type="text/javascript">
    var timeoutID = setTimeout(function() {
        alert('20 Seconds have passed');
    }, <?php echo bcsub($_SESSION['foo'], $time)*1000 ?>);
</script>