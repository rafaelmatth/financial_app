<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $saldo = auth()->user()->balance->amount;
        $saldo = number_format($saldo, 2);
        $transacoes = auth()->user()->historics;
        $nT = count($transacoes);
        return view('admin.home.index', compact('saldo', 'nT'));
    }
}
