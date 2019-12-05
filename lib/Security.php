<?php
class Security{

    private static $seed = 'JxGoEAtxDtEArprDGMKF';

    static function chiffrer($texte_en_clair)
    {
        $texte_chiffre =hash( 'sha256',self::$seed.$texte_en_clair);
        return $texte_chiffre;
    }
}