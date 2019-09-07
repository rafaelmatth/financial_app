<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;
use App\Models\Historic;
class BalanceController extends Controller
{
    public function index(){
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;
        $final = "R$ " . $amount;
        return view('admin.balance.index' , compact('final', 'amount'));
    }

    public function deposit(){
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request, Balance $balance){
        //$balance->deposit($request->valor);
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->valor);
        
        if($response['success'])
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        return redirect()
            ->back()
            ->with('error', $response['message']);        
    }

    public function withdrawn(){
        return view('admin.balance.withdrawn');
    }

    public function withdrawnStore(MoneyValidationFormRequest $request, Balance $balance){
        //$balance->deposit($request->valor);
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdrawn($request->valor);
        
        if($response['success'])
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        return redirect()
            ->back()
            ->with('error', $response['message']);        
    }

    public function transfer(){
        return view('admin.balance.transfer');
    }

    public function confirmTransfer(Request $request, User $user){
        if(!$sender = $user->getSender($request->sender))
            return redirect()
                ->back()
                ->with('error','Usuário não encontrado!');
        if($sender->id === auth()->user()->id)
            return redirect()
                ->back()
                ->with('error','Não é possível tranferir para sua própria conta!');
        
        $balance = auth()->user()->balance;   
                
        return view('admin.balance.transfer-confirm', compact('sender', 'balance'));       
    }

    public function transferStore(MoneyValidationFormRequest $request, User $user){           
        if(!$sender = $user->find($request->sender_id))
            return redirect()
                ->route('balance.transfer')
                ->with('success', 'Recebedor não encontrado');

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->valor, $sender);
        
        if($response['success'])
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        
        return redirect()
            ->back()
            ->with('error', $response['message']);
    }
    public function historic(Historic $historics){
        $historic = auth()->user()->historics()->with(['userSender'])->paginate(10);

         $types = $historics->type();
        
        return view('admin.balance.historic', compact('historic', 'types'));
    }

    public function searchHistoric(Request $request, Historic $historics){
        $dataForm = $request->all();

        $historic = $historics->search($dataForm);

        $types = $historics->type();

        return view('admin.balance.historic', compact('historic', 'types'));

    }
}



