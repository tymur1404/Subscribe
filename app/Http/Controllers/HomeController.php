<?php

namespace App\Http\Controllers;

use App\Facades\UserFacade;
use \Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home'); // Это предполагает, что у вас есть шаблон "welcome.blade.php" в директории "resources/views".
    }
}
