<?php

require_once '../../vendor/autoload.php';

$view_helper = new DBlackborough\Zf3ViewHelpers\Bootstrap4ProgressBar();

// All methods, info background, animated, striped and with label
echo $view_helper->__invoke(25)
    ->color('info')
    ->animate()
    ->striped()
    ->label('25%');
