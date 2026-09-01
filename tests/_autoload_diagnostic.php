<?php
register_shutdown_function(static function (): void {
    $error = error_get_last();
    file_put_contents(__DIR__ . '/_autoload_shutdown.log', print_r($error, true));
    echo "shutdown\n";
});

echo "before\n";
require dirname(__DIR__) . '/vendor/autoload.php';
echo "after-autoload\n";
var_dump(class_exists('PHPUnit\\TextUI\\Command'));
echo "after-class-check\n";
