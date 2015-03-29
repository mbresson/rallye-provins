<?php

require_once 'vendor/autoload.php';

require_once 'kernel/Kernel.php';

$kernel = Kernel::getInstance();
$kernel->run();

