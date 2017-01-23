<?php

namespace App\Library\Breadcrumb;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class Breadcrumb {

    static private $array = [];

    public function __construct() {
        self::build();
    }

    static public function set($last_segment = 0) {
        
    }

    static public function render($params = []) {

        $html = '';

        /** Rendering breadcrumb show */
        if (!empty($params)) {
            foreach ($params as $j => $i) {

                /** Prepping data */
                $r = explode(':', $i);

                /** Rendering breadcrumb list */
                if (!empty(self::$array)) {
                    foreach (self::$array as $k => $v) {
                        if ($k == $r[0]) {
                            if ($j == count($params) - 1) {
                                $html .= '<li><a class="acitve-pages" >' . $v['title'] . '</a></li>';
                            } else {
                                if (key_exists(1, $r)) {
                                    $html .= '<li><a href="' . $v['url'] . '/' . $r[1] . '" >' . $v['title'] . '</a></li>';
                                } else {
                                    $html .= '<li><a href="' . $v['url'] . '" >' . $v['title'] . '</a></li>';
                                }
                            }
                        }
                    }
                }
            }
        }


        $html .= '';

        return $html;
    }

    static private function build() {

        self::$array = [
            '/' => [
                'url' => URL::to('/'),
                'title' => 'Dashboard',
            ],
            /** Shift  */
            'roles' => [
                'url' => URL::to('roles'),
                'title' => "Grup",
            ],
            'new-roles' => [
                'url' => URL::to('roles/create'),
                'title' => "Buat Data Grup Baru",
            ],
            'edit-roles' => [
                'url' => URL::to('roles/create'),
                'title' => "Perbarui Data Grup",
            ],               
        ];
    }

}

?>
