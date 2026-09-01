<?php
declare(strict_types=1);

fwrite(STDOUT, "before-autoload\n");
require __DIR__ . '/../vendor/autoload.php';
fwrite(STDOUT, "after-autoload\n");
fwrite(STDOUT, class_exists('PHPUnit\\Runner\\Version') ? "phpunit-class-ok\n" : "phpunit-class-missing\n");
require __DIR__ . '/bootstrap.php';
fwrite(STDOUT, "after-bootstrap\n");
