<?php
class Security{

    private static $seed = 'JxGoEAtxDtEArprDGMKF';

    static function chiffrer($texte_en_clair)
    {
        $texte_chiffre =hash( 'sha256',self::$seed.$texte_en_clair);
        return $texte_chiffre;
    }

    static function generateRandomHex() {
        // Generate a 32 digits hexadecimal number
        $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
        $bytes = openssl_random_pseudo_bytes($numbytes);
        $hex   = bin2hex($bytes);
        return $hex;
    }


}