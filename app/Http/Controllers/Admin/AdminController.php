<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Historic;

class AdminController extends Controller
{
    public function index(Historic $historic){
        
        $saldo = auth()->user()->balance->amount;
        $saldo = number_format($saldo, 2);
        $saldo = str_replace(".", ",", $saldo);

        $transacoes = auth()->user()->historics;
        $nT = count($transacoes);
        $userId = auth()->user()->id;
        $ultT = $historic->date;

        return view('admin.home.index', compact('saldo', 'nT', 'ultT', 'userId'));
    }
}
