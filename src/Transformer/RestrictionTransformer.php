<?php
declare(strict_types=1);

namespace App\Transformer;

use DateTime;

class RestrictionTransformer
{
    public function transform(array $restrictionList): array
    {
        $now = new DateTime;

        return array_map(function (array $restriction) use ($now): array {
            ['start' => $start, 'end' => $end] = $restriction;

            $restriction['start'] = $start instanceof DateTime ? $start->format('j. n. Y') : '';
            $restriction['end'] = $end instanceof DateTime ? $end->format('j. n. Y') : 'do odvolání';

            if ($start > $now) {
                $restriction['daysLeft'] = "Opatření začne platit za {$start->diff($now)->days} dnů";
            }

            return $restriction;
        }, $restrictionList);
    }
}
