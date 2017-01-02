<?php
session_start();
unset($_SESSION['start1']);

//session_destroy();
echo "<script type='text/javascript'> window.location='login.php'</script>"; 
?>