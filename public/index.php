<?php
require '../app/Autoloader.php';
App\Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

ob_start();

if ($p === 'home') {
    require '../pages/home.php';
} else {
    require '../pages/single.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';
