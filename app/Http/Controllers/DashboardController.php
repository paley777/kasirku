<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'active' => 'beranda',
            'countgood' => Good::count(),
            'countuser' => User::count(),
            'countcat' => Category::count(),
            'counttrans' => Transaction::count(),
        ]);
    }
}
