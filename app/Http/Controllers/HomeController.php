<?php

namespace LinksApp\Http\Controllers;

use Illuminate\Http\Request;
use LinksApp\Http\Controllers\StoreController;

class HomeController extends Controller
{
    private $storeController;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->storeController = new StoreController();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'files' => $this->storeController->getFilesForUser()
        ]);
    }

    public function redirect() {
        return redirect('/');
    }
}
