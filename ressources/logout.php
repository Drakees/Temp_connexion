<?php

session_destroy();
var_dump($_SESSION);
header("Location: index.php");
