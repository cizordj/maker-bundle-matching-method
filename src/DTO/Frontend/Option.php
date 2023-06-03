<?php

declare(strict_types=1);

namespace App\DTO\Frontend;

class Option
{
    public function __construct(
        public readonly int $value,
        public readonly string $title,
    ) {
    }
}
