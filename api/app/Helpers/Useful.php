<?php

namespace App\Helpers;

class Useful {
    /**
     * переводит строку в транслит
     */
    static function translit($string)
    {
        $replace=[
            " "=>"-",
            "'"=>"",
            "`"=>"",
            "а"=>"a","А"=>"a",
            "б"=>"b","Б"=>"b",
            "в"=>"v","В"=>"v",
            "г"=>"g","Г"=>"g",
            "д"=>"d","Д"=>"d",
            "е"=>"e","Е"=>"e",
            "ж"=>"zh","Ж"=>"zh",
            "з"=>"z","З"=>"z",
            "и"=>"i","И"=>"i",
            "й"=>"y","Й"=>"y",
            "к"=>"k","К"=>"k",
            "л"=>"l","Л"=>"l",
            "м"=>"m","М"=>"m",
            "н"=>"n","Н"=>"n",
            "о"=>"o","О"=>"o",
            "п"=>"p","П"=>"p",
            "р"=>"r","Р"=>"r",
            "с"=>"s","С"=>"s",
            "т"=>"t","Т"=>"t",
            "у"=>"u","У"=>"u",
            "ф"=>"f","Ф"=>"f",
            "х"=>"h","Х"=>"h",
            "ц"=>"c","Ц"=>"c",
            "ч"=>"ch","Ч"=>"ch",
            "ш"=>"sh","Ш"=>"sh",
            "щ"=>"sch","Щ"=>"sch",
            "ъ"=>"","Ъ"=>"",
            "ы"=>"y","Ы"=>"y",
            "ь"=>"","Ь"=>"",
            "э"=>"e","Э"=>"e",
            "ю"=>"yu","Ю"=>"yu",
            "я"=>"ya","Я"=>"ya",
            "і"=>"i","І"=>"i",
            "ї"=>"yi","Ї"=>"yi",
            "є"=>"e","Є"=>"e"
        ];
        $str = iconv("UTF-8","UTF-8//IGNORE",strtr($string,$replace));
        $str = strtolower($str);
        $str = str_replace('/', '-', $str);
        $str = preg_replace('~[^-a-z0-9_]+~u', '', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }

    /**
     * Создает  альяс для урла
     */
    static function create_alias($id = NULL, $incomming_alias = NULL, $prefix = 'eds')
    {
        $alias = $prefix.$id.'-'.$incomming_alias;
        return $alias;
    }

    /**
     * Clean HTML and values.
     * Useful when using _GET and _POST values
     * @param string In value
     * @return string Out value
     */
    public static function parseCleanValue($val) {
        if ($val == '') {
            return '';
        }

        if (get_magic_quotes_gpc()) {
            $val = stripslashes($val);
            $val = preg_replace("/\\\(?!&amp;#|\?#)/", "&#092;", $val);
        }
        $val = str_replace("&#032;", " ", $val);
        $val = str_replace("&", "&amp;", $val);
        $val = str_replace("<!--", "&#60;&#33;--", $val);
        $val = str_replace("-->", "--&#62;", $val);
        $val = preg_replace("/<script/i", "&#60;sсript",  $val);
        $val = str_replace(">", "&gt;", $val);
        $val = str_replace("<", "&lt;", $val);
        $val = str_replace('"', "&quot;", $val);
        $val = str_replace("$", "&#036;", $val);
        $val = str_replace("\r", "", $val); // Remove tab chars
		$val = str_replace("!", "&#33;", $val);
        $val = str_replace("'", "&#39;", $val); // for SQL injection security

        // Recover Unicode
        $val = preg_replace("/&amp;#([0-9]+);/s", "&#\\1;", $val);
        // Trying to fix HTML entities without ;
        $val = preg_replace("/&#(\d+?)([^\d;])/i", "&#\\1;\\2", $val);

        return $val;
    }
}
