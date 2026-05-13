<?php
session_start();
unset($_SESSION['AUTH']);
header('Location: index.php?hal=home');
exit;
