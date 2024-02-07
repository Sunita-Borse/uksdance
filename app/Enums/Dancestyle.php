<?php

namespace App\Enums;

enum Dancestyle: string {
    case KATHAK = 'Kathak';
    case BHARATNATYAM = 'Bharatnatyam';

    public static function all(): array {
        return [
            self::KATHAK,
            self::BHARATNATYAM,
        ];
    }

    public static function toSelectArray(): array {
        return self::all();
    }

    public function label(): string {
        return match ($this) {
            self::KATHAK => 'Kathak',
            self::BHARATNATYAM => 'Bharatnatyam',
        };
    }
}