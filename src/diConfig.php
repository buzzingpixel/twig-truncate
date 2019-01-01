<?php
declare(strict_types=1);

use buzzingpixel\twigtruncate\TruncationFactory;
use buzzingpixel\twigtruncate\TruncateTwigExtension;

return [
    TruncateTwigExtension::class => function () {
        return new TruncateTwigExtension(new TruncationFactory());
    },
];
