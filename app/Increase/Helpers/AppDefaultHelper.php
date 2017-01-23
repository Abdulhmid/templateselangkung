<?php

class AppDefaultHelper {

	public static function dynamicTitle(){
		return str_contains(Request::segment(2), 'create') ? 'Tambah' : 'Ubah';
	}

}