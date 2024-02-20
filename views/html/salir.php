<?php
require_once('../../config/sesiones.php');
session_destroy();
header('Location:../../login.php');
exit();
