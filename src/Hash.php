<?php

namespace Loren\Hashgen;

class Hash
{
    public function generateHashtag($str)
    {
        $stringReturn = '';

        // Changing 2+ spaces	by a unique space
        $str = preg_replace("/\s+/", " ", $str);

        foreach (explode(' ', $str) as $word) {
            $stringReturn = $stringReturn . ucfirst($word);
        }

        if (strlen($stringReturn) > 139 || empty($stringReturn)) return false;

        return "#" . $stringReturn;
    }
}
