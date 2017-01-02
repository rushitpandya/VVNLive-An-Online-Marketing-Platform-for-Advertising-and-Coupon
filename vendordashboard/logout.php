<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['vendorid']);
unset($_SESSION['businessid']);
unset($_SESSION['productid']);
unset($_SESSION['start']);
//session_destroy();
echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
?>