<?php
declare(strict_types=1);

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace buzzingpixel\twigtruncate;

use TS\Text\Truncation;

class TruncationFactory
{
    public function make(
        int $limit,
        string $strategy = 'word',
        string $truncationString = '…',
        int $minLength = 0
    ) {
        $strategies = [
            'char' => Truncation::STRATEGY_CHARACTER,
            'line' => Truncation::STRATEGY_LINE,
            'paragraph' => Truncation::STRATEGY_PARAGRAPH,
            'sentence' => Truncation::STRATEGY_SENTENCE,
            'word' => Truncation::STRATEGY_WORD,
        ];

        return new Truncation(
            $limit,
            $strategies[$strategy],
            $truncationString,
            'UTF-8',
            $minLength
        );
    }
}
