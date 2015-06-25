<?

/**
 * Class SoundIndex
 * Use: SoundIndex::get('some string la-la');
 */
class SoundIndex
{
    protected static function _sound($string, $is_cyrillic = true) {
        static $codes = array(
            'A' => array(array(0, -1, -1),
                'I' => array(array(0, 1, -1)),
                'J' => array(array(0, 1, -1)),
                'Y' => array(array(0, 1, -1)),
                'U' => array(array(0, 7, -1))),

            'B' => array(array(7, 7, 7)),

            'C' => array(array(5, 5, 5), array(4, 4, 4),
                'Z' => array(array(4, 4, 4),
                    'S' => array(array(4, 4, 4))),
                'S' => array(array(4, 4, 4),
                    'Z' => array(array(4, 4, 4))),
                'K' => array(array(5, 5, 5), array(45, 45, 45)),
                'H' => array(array(5, 5, 5), array(4, 4, 4),
                    'S' => array(array(5, 54, 54)))),

            'D' => array(array(3, 3, 3),
                'T' => array(array(3, 3, 3)),
                'Z' => array(array(4, 4, 4),
                    'H' => array(array(4, 4, 4)),
                    'S' => array(array(4, 4, 4))),
                'S' => array(array(4, 4, 4),
                    'H' => array(array(4, 4, 4)),
                    'Z' => array(array(4, 4, 4))),
                'R' => array(
                    'S' => array(array(4, 4, 4)),
                    'Z' => array(array(4, 4, 4)))),

            'E' => array(array(0, -1, -1),
                'I' => array(array(0, 1, -1)),
                'J' => array(array(0, 1, -1)),
                'Y' => array(array(0, 1, -1)),
                'U' => array(array(1, 1, -1))),

            'F' => array(array(7, 7, 7),
                'B' => array(array(7, 7, 7))),

            'G' => array(array(5, 5, 5)),

            'H' => array(array(5, 5, -1)),

            'I' => array(array(0, -1, -1),
                'A' => array(array(1, -1, -1)),
                'E' => array(array(1, -1, -1)),
                'O' => array(array(1, -1, -1)),
                'U' => array(array(1, -1, -1))),

            'J' => array(array(4, 4, 4)),

            'K' => array(array(5, 5, 5),
                'H' => array(array(5, 5, 5)),
                'S' => array(array(5, 54, 54))),

            'L' => array(array(8, 8, 8)),

            'M' => array(array(6, 6, 6),
                'N' => array(array(66, 66, 66))),

            'N' => array(array(6, 6, 6),
                'M' => array(array(66, 66, 66))),

            'O' => array(array(0, -1, -1),
                'I' => array(array(0, 1, -1)),
                'J' => array(array(0, 1, -1)),
                'Y' => array(array(0, 1, -1))),

            'P' => array(array(7, 7, 7),
                'F' => array(array(7, 7, 7)),
                'H' => array(array(7, 7, 7))),

            'Q' => array(array(5, 5, 5)),

            'R' => array(array(9, 9, 9),
                'Z' => array(array(94, 94, 94), array(94, 94, 94)), // special case
                'S' => array(array(94, 94, 94), array(94, 94, 94))), // special case

            'S' => array(array(4, 4, 4),
                'Z' => array(array(4, 4, 4),
                    'T' => array(array(2, 43, 43)),
                    'C' => array(
                        'Z' => array(array(2, 4, 4)),
                        'S' => array(array(2, 4, 4))),
                    'D' => array(array(2, 43, 43))),
                'D' => array(array(2, 43, 43)),
                'T' => array(array(2, 43, 43),
                    'R' => array(
                        'Z' => array(array(2, 4, 4)),
                        'S' => array(array(2, 4, 4))),
                    'C' => array(
                        'H' => array(array(2, 4, 4))),
                    'S' => array(
                        'H' => array(array(2, 4, 4)),
                        'C' => array(
                            'H' => array(array(2, 4, 4))))),
                'C' => array(array(2, 4, 4),
                    'H' => array(array(4, 4, 4),
                        'T' => array(array(2, 43, 43),
                            'S' => array(
                                'C' => array(
                                    'H' => array(array(2, 4, 4))),
                                'H' => array(array(2, 4, 4))),
                            'C' => array(
                                'H' => array(array(2, 4, 4)))),
                        'D' => array(array(2, 43, 43)))),
                'H' => array(array(4, 4, 4),
                    'T' => array(array(2, 43, 43),
                        'C' => array(
                            'H' => array(array(2, 4, 4))),
                        'S' => array(
                            'H' => array(array(2, 4, 4)))),
                    'C' => array(
                        'H' => array(array(2, 4, 4))),
                    'D' => array(array(2, 43, 43)))),

            'T' => array(array(3, 3, 3),
                'C' => array(array(4, 4, 4),
                    'H' => array(array(4, 4, 4))),
                'Z' => array(array(4, 4, 4),
                    'S' => array(array(4, 4, 4))),
                'S' => array(array(4, 4, 4),
                    'Z' => array(array(4, 4, 4)),
                    'H' => array(array(4, 4, 4)),
                    'C' => array(
                        'H' => array(array(4, 4, 4)))),
                'T' => array(
                    'S' => array(array(4, 4, 4),
                        'Z' => array(array(4, 4, 4)),
                        'C' => array(
                            'H' => array(array(4, 4, 4)))),
                    'C' => array(
                        'H' => array(array(4, 4, 4))),
                    'Z' => array(array(4, 4, 4))),
                'H' => array(array(3, 3, 3)),
                'R' => array(
                    'Z' => array(array(4, 4, 4)),
                    'S' => array(array(4, 4, 4)))),

            'U' => array(array(0, -1, -1),
                'E' => array(array(0, -1, -1)),
                'I' => array(array(0, 1, -1)),
                'J' => array(array(0, 1, -1)),
                'Y' => array(array(0, 1, -1))),

            'V' => array(array(7, 7, 7)),

            'W' => array(array(7, 7, 7)),

            'X' => array(array(5, 54, 54)),

            'Y' => array(array(1, -1, -1)),

            'Z' => array(array(4, 4, 4),
                'D' => array(array(2, 43, 43),
                    'Z' => array(array(2, 4, 4),
                        'H' => array(array(2, 4, 4)))),
                'H' => array(array(4, 4, 4),
                    'D' => array(array(2, 43, 43),
                        'Z' => array(
                            'H' => array(array(2, 4, 4))))),
                'S' => array(array(4, 4, 4),
                    'H' => array(array(4, 4, 4)),
                    'C' => array(
                        'H' => array(array(4, 4, 4))))));

        $length = strlen($string);
        $output = '';
        $i = 0;

        $previous = -1;

        while($i < $length) {
            $current = $last = &$codes[$string[$i]];

            for($j = $k = 1; $k < 7; $k++) {
                if(!isset($string[$i + $k]) ||
                    !isset($current[$string[$i + $k]])
                )
                    break;

                $current = &$current[$string[$i + $k]];

                if(isset($current[0])) {
                    $last = &$current;
                    $j = $k + 1;
                }
            }

            if($i == 0) {
                $code = $last[0][0];
            } elseif(!isset($string[$i + $j]) || ($codes[$string[$i + $j]][0][0] != 0))
                $code = $is_cyrillic ? (isset($last[1]) ? $last[1][2] : $last[0][2]) : $last[0][2];
            else
                $code = $is_cyrillic ? (isset($last[1]) ? $last[1][1] : $last[0][1]) : $last[0][1];

            if(($code != -1) && ($code != $previous))
                $output .= $code;

            $previous = $code;

            $i += $j;

        }

        return str_pad(substr($output, 0, 6), 6, '0');
    }

    //------------------------------------------------------------------------------

    /**
     * @param $string
     * @return array|null decimal sound index of all words in input string
     */
    public static function sound($string) {
        $is_cyrillic = false;
        if(preg_match('#[А-Яа-я]#i', $string) === 1) {
            $string = self::translit($string);
            $is_cyrillic = true;
        }

        $string = preg_replace(array('#[^\w\s]|\d#i', '#\b[^\s]{1,3}\b#i', '#\s{2,}#i', '#^\s+|\s+$#i'),
            array('', '', ' '), strtoupper($string));

        if(!isset($string[0]))
            return null;

        $matches = explode(' ', $string);
        foreach($matches as $key => $match)
            $matches[$key] = self::_sound($match, $is_cyrillic);
        return $matches;
    }

    //------------------------------------------------------------------------------

    protected static function translit($string) {
        static $ru = array(
            'А', 'а', 'Б', 'б', 'В', 'в', 'Г', 'г', 'Д', 'д', 'Е', 'е', 'Ё', 'ё', 'Ж', 'ж', 'З', 'з',
            'И', 'и', 'Й', 'й', 'К', 'к', 'Л', 'л', 'М', 'м', 'Н', 'н', 'О', 'о', 'П', 'п', 'Р', 'р',
            'С', 'с', 'Т', 'т', 'У', 'у', 'Ф', 'ф', 'Х', 'х', 'Ц', 'ц', 'Ч', 'ч', 'Ш', 'ш', 'Щ', 'щ',
            'Ъ', 'ъ', 'Ы', 'ы', 'Ь', 'ь', 'Э', 'э', 'Ю', 'ю', 'Я', 'я'
        );

        static $en = array(
            'A', 'a', 'B', 'b', 'V', 'v', 'G', 'g', 'D', 'd', 'E', 'e', 'E', 'e', 'Zh', 'zh', 'Z', 'z',
            'I', 'i', 'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'R', 'r',
            'S', 's', 'T', 't', 'U', 'u', 'F', 'f', 'H', 'h', 'C', 'c', 'Ch', 'ch', 'Sh', 'sh', 'Sch', 'sch',
            '\'', '\'', 'Y', 'y', '\'', '\'', 'E', 'e', 'Ju', 'ju', 'Ja', 'ja'
        );

        $string = str_replace($ru, $en, $string);
        return $string;
    }

    public static function sound_hash($s) {
        return md5(serialize(self::sound($s)));
    }

    public static function get($s) {
        $s = str_replace('-', ' ', $s);
        return md5(metaphone(SoundIndex::translit($s)).preg_replace("/[^0-9]/", "", $s));
    }
}
