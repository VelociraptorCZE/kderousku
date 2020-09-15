<?php
declare(strict_types=1);

namespace App\Transformer;

use DateTime;

class RestrictionTransformer
{
    public function transform(array $restrictionList): array
    {
        return array_map(function (array $restriction): array {
            ['start' => $start, 'end' => $end] = $restriction;

            $restriction['start'] = $start instanceof DateTime ? $start->format('j. n. Y') : 'N/A';
            $restriction['end'] = $end instanceof DateTime ? $end->format('j. n. Y') : 'N/A';

            return $restriction;
        }, $restrictionList);
    }
}
