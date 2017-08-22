<?php

namespace Novius\Backpack\Base\Http\Controllers;

class AdminController extends \Backpack\Base\app\Http\Controllers\AdminController
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('adminLocalFromCookie');
    }
}
