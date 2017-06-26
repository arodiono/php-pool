<?php

session_start();

if ($_SESSION['loggued_on_user'] != NULL && $_SESSION['loggued_on_user'] != "")
    header('Location: lobby.php');
else
    header('Location: register.php');
