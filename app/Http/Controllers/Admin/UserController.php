<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile(){
        return view('site.profile.profile');
    }

    public function profileUpdate(Request $request){
        
        $user = auth()->user();
        
        $data = $request->all();
        
        if($data['password'] != null){
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }

        $data['image'] = $user->image;
        if($request->hastFile('image') && $request->file('image')->isValid()) {
            if($user->image){
                $name = $user->image;
            }else{
                $name = $user->id.kebab_case($user->name);
            }
            $extension = $request->image->extension();

            $nameFile = "{$name}.{$extension}";
        }

        $update = auth()->user()->update($data);

        if($update){
            return redirect()->route('profile')->with('sucess','Sucesso ao atualizar');

        }

        return redirect()->back()->with('error', 'Falha ao atualizar o perfil...');

    }
}
