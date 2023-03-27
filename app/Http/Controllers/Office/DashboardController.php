<?php

namespace App\Http\Controllers\Office;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('page.office.dashboard.main');
    }
    
}
