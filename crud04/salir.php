<?php
session_start();

unset($_SESSION['nick']);
unset($_SESSION['IdUsu']);

header('Location: index.php');