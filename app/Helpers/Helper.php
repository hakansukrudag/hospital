<?php

namespace App\Helpers;

use DateTime;

trait Helper
{
    public function reverseBirthday(?int $years): string
    {
        if ($years === null) {
            return '0';
        }
    return date('Y-m-d', strtotime($years . ' years ago'));
    }

    private function ageCalculator(string $date): int
    {
        $date = new DateTime($date);
        $now = new DateTime();
        return $now->diff($date)->y;
    }
}
