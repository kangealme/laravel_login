<?php

namespace App\Http\Controllers;

use App\Models\Submenu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
    //
    public function pilih($subMenu)
    {
        $subMenu = Submenu::where('sub_menu', $subMenu)->first();
        dd($subMenu);
    }
}
