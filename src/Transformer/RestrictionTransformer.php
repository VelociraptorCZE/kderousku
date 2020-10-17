<?php
declare(strict_types=1);

namespace App\Transformer;

use App\Entity\Restriction;
use DateTime;

class RestrictionTransformer
{
    public function transform(array $restrictionList): array
    {
        $now = new DateTime;

        return array_map(function (Restriction $restriction) use ($now): array {
            $transformedRestriction = [
                'name' => $restriction->getName(),
                'image' => $restriction->getImage(),
                'info' => $restriction->getInfo()
            ];

            $start = $restriction->getStart();
            $end = $restriction->getEnd();

            $transformedRestriction['start'] = $start instanceof DateTime ? $start->format('j. n. Y') : '';
            $transformedRestriction['end'] = $end instanceof DateTime ? $end->format('j. n. Y') : 'do odvolání';

            if ($start > $now) {
                $transformedRestriction['daysLeft'] = "Opatření začne platit za {$start->diff($now)->days} dnů";
            }

            return $transformedRestriction;
        }, $restrictionList);
    }
}
