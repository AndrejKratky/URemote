<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function updatePlan (Request $request, $plan) {
        if (Auth::check()) {
            $user = Auth::user();
            switch ($plan) {
                case 'standard':
                    $user->stav_uctu = 'U';
                    break;
                case 'premium':
                    $user->stav_uctu = 'P';
                    break;
                case 'student':
                    $user->stav_uctu = 'S';
                    break;
                case 'lecturer':
                    $user->stav_uctu = 'L';
                    break;
                default:
                    break;
            }
            $user->save();
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }
}
