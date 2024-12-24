<?php
session_start();
session_unset();
session_destroy();
headers("location: login.html");
?>