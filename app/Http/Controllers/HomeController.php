<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $url = "/";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Home';
        $data['subTitle'] = $this->subTitle();
        $data['breadcrumb'] = $this->url;
        return view('admin',$data);
    }

    public function me()
    {
        $data['title'] = 'Profil';
        $data['subTitle'] = $this->subTitle();
        $data['breadcrumb'] = 'me';
        $data['row'] = \Auth::user();
        return view('admin.users.me',$data);
    }
}
