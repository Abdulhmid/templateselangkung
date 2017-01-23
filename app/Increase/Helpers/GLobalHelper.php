<?php

class GlobalHelper {

    public static function url() {
        return explode('/', \Request::url());
    }

    public static function indexUrl() {
        return Request::segment(1);
    }

    public static function lastUrl() {
        return last(self::url());
    }

    public static function actionUrl() {
        return Request::segment(2);
    }

    public static function checkImage($pathImage, $user = true) {
        if (file_exists(public_path() . "/" . $pathImage) && !empty($pathImage)) {
            return asset($pathImage);
        } else {
            if ($user == true)
                return \Avatar::create(Auth::user()->name)->toBase64();
            else
                return \Avatar::create(Auth::user()->name)->toBase64();
        }
    }

    public static function formatDate($date, $format = 'd F Y \a\t H:i') {
        return (!is_null($date)) ? (new DateTime($date))->format($format) : "-";
    }

    public static function formatCurrency($amount) {
        return 'Rp ' . number_format($amount, 0, ',', '.') . ',-';
    }

    public static function encrypt($sData) {
        $id = (double) $sData * 432.234;
        return strtr(rtrim(base64_encode($id), '='), '+/', '-_');
    }

    public static function decrypt($sData) {
        $url = base64_decode(strtr($sData, '-_', '+/'));
        $id = (double) $url / 432.234;
        return intval($id);
    }

    public static function softTrim($text, $count, $wrapText='[...]'){

        if(strlen($text)>$count){
            preg_match('/^.{0,' . $count . '}(?:.*?)\b/siu', $text, $matches);
            $text = $matches[0];
        }else{
            $wrapText = '';
        }
        return $text . $wrapText;
    }

    public static function convertDate($dataConvert, $format = "Y-m-d") {
        $date = date_create($dataConvert);

        return date_format($date, $format);
    }

    public static function idrFormat($number, $prefix = 0) {
        return !is_null($number) ? number_format($number, $prefix, ",", ".") : "-";
    }

    public static function getMonth()
    {
        return [
            1  => 'Januari',
            2  => 'Februari',
            3  => 'Maret',
            4  => 'April',
            5  => 'Mei',
            6  => 'Juni',
            7  => 'Juli',
            8  => 'Agustus',
            9  => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
    }
}
