<?php
declare(strict_types=1);

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace buzzingpixel\twigtruncate;

use Twig_Filter;
use Twig_Markup;
use Twig_Extension;

class TruncateTwigExtension extends Twig_Extension
{
    private $truncationFactory;

    public function __construct(TruncationFactory $truncationFactory)
    {
        $this->truncationFactory = $truncationFactory;
    }

    public function getFilters(): array
    {
        return [new Twig_Filter('truncate', [$this, 'truncateFilter'])];
    }

    public function ucFirstFilter(string $val) : Twig_Markup
    {
        return new Twig_Markup(ucfirst($val), 'UTF-8');
    }

    public function truncateFilter(
        string $val,
        int $limit,
        string $strategy = 'word',
        string $truncationString = '…',
        int $minLength = 0
    ) : Twig_Markup {
        return new Twig_Markup(
            $this->truncationFactory->make(
                $limit,
                $strategy,
                $truncationString,
                $minLength
            )
            ->truncate($val),
            'UTF-8'
        );
    }
}
