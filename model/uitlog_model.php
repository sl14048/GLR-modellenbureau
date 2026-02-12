<?php

session_start();

session_destroy();

header("Location: model_inlog_verwerk.php");
exit;