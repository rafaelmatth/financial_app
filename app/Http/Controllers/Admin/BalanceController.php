<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
class BalanceController extends Controller
{
    public function index(){
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;
        $final = "R$ " . $amount;
        return view('admin.balance.index' , compact('final'));
    }

    public function deposit(){
        return view('admin.balance.deposit');
    }

    public function depositStore(Request $request, Balance $balance){
        //$balance->deposit($request->valor);
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $balance->deposit($request->valor);
        return redirect()->route('admin.balance');
    }


}