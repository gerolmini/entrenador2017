<?php
$dat = parse_url(getenv('DATABASE_URL'));
    $db = [
        'host' => $dat['host'],
        'name' => ltrim($dat['path'], '/'),
        'user' => $dat['user'],
        'pass' => $dat['pass'],
        'port' => $dat['port'],
        'type' => "pgsql"
    ];

    global $db;
?>
