<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;
class Balance extends Model
{
    public $timestamps = false;

    public function deposit(float $valor):Array {
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($valor, 2, '.', '');
        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type' => 'I',
            'amount' => $valor,
            'total_before' => $totalBefore,
            'total_after' => $this->amount,
            'date' => date('Ymd'),                
        ]);

        if($deposit && $historic){
            DB::commit();
            return [
                'success' => 'true',
                'message' => 'Recarga feita com sucesso!'
            ];
        }else{
            DB::rollback();
            return [
            'success' => 'false',
            'message' => 'Erro ao realizar recarga.'
            ];
        }
    }

    public function withdrawn(float $valor):Array {
        if($this->amount < $valor){
            return [
                'success' => 'false',
                'messege'  => 'Saldo insufuciente',
            ];
        }
               
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($valor, 2, '.', '');
        $withdrawn = $this->save();

        $historic = auth()->user()->historics()->create([
            'type' => 'O',
            'amount' => $valor,
            'total_before' => $totalBefore,
            'total_after' => $this->amount,
            'date' => date('Ymd'),                
        ]);

        if($withdrawn && $historic){
            DB::commit();
            return [
                'success' => 'true',
                'message' => 'Saque realizado com sucesso!'
            ];
        }else{
            DB::rollback();
            return [
            'success' => 'false',
            'message' => 'Erro ao realizar saque.'
            ];
        }
    }

    public function transfer(float $valor, User $sender){
        if($this->amount < $valor){
            return [
                'success' => 'false',
                'messege'  => 'Saldo insufuciente',
            ];
        }
               
        DB::beginTransaction();

        // Decremento de saldo do remetente
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($valor, 2, '.', '');
        $transfer = $this->save();

        $historic = auth()->user()->historics()->create([
            'type' => 'T',
            'amount' => $valor,
            'total_before' => $totalBefore,
            'total_after' => $this->amount,
            'date' => date('Ymd'),  
            'user_id_transaction' => $sender->id,            
        ]);

        // Adicao de saldo do receptor 
        $senderBalance = $sender->balance()->firstOrCreate([]);
        $senderTotalBefore = $sender->amount ? $sender->amount : 0;
        $senderBalance->amount += number_format($valor, 2, '.', '');
        $transferSender = $senderBalance->save();

        $historicSender = $sender->historics()->create([
            'type' => 'I',
            'amount' => $valor,
            'total_before' => $senderTotalBefore,
            'total_after' => $senderBalance->amount,
            'date' => date('Ymd'),  
            'user_id_transaction' => auth()->user()->id,          
        ]); 

        if($transfer && $historic && $transferSender && $historicSender){
            DB::commit();
            return [
                'success' => 'true',
                'message' => 'Sucesso ao transferir'
            ];
        }
        DB::rollback();
        return [
            'success' => 'false',
            'message' => 'Erro ao realizar tranferência.'
        ];      
    }


}
