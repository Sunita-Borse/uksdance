<?php

namespace App\Enums;

enum Exam: int
{
    case Prarmbhik = 1;
    case Praveshika_Pratham = 2;
    case Praveshika_Purna = 3;
    case Madhyama_Pratham = 4;
    case Madhyama_Purna = 5;
    case Visharad_Pratham = 6;
    case Visharad_Purna = 7;

    public function label()
    {
        return match ($this) {
            self::Prarmbhik => 'Prarmbhik',
            self::Praveshika_Pratham => 'Praveshika_Pratham',
            self::Praveshika_Purna => 'Praveshika_Purna',
            self::Madhyama_Pratham => 'Madhyama_Pratham',
            self::Madhyama_Purna => 'Madhyama_Purna',
            self::Visharad_Pratham => 'Visharad_Pratham',
            self::Visharad_Purna => 'Visharad_Purna',
        };
    }
}
