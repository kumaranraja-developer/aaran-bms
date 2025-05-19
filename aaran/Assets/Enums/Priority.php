<?php

namespace Aaran\Assets\Enums;

enum Priority: int
{
    case IMPORTANT = 1;
    case PRIORITY = 2;
    case TOPMOST = 3;
    case LOW = 4;
    case MEDIUM = 5;
    case HIGH = 6;

    case MODERATE = 7;

    public function getName(): string
    {
        return match ($this) {
            self::IMPORTANT => 'Important',
            self::PRIORITY => 'Priority',
            self::TOPMOST => 'Topmost',
            self::LOW => 'Low',
            self::MEDIUM => 'Medium',
            self::HIGH => 'High',
            self::MODERATE => 'Moderate',
        };
    }

    public function getStyle(): string
    {
        return match ($this) {
            self::IMPORTANT => 'text-yellow-700 bg-yellow-500',
            self::PRIORITY => 'text-white bg-yellow-600',
            self::TOPMOST => 'text-red-700 bg-red-300',
            self::LOW => 'text-blue-600 bg-blue-300',
            self::MEDIUM => 'text-gray-700 bg-red-300',
            self::HIGH => 'text-orange-700 bg-red-300',
            self::MODERATE => 'text-stone-700 bg-red-300',
        };
    }

}
