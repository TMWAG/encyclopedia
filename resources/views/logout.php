<?php
session_start();
unset($_SESSION['usr']);
header("Location: ".$_SERVER['HTTP_REFERER']);
?>