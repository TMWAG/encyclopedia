<?php
use App\Database;
$db = new Database();
$user_id = $_POST['user_id'];
$new_role = $_POST['role'];
$db->alter_role($user_id, $new_role);
header("Location: ".$_SERVER['HTTP_REFERER']);