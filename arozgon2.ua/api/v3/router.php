<?php
$action = strtolower($_GET['action']);
require_once "$action" . '.php';
