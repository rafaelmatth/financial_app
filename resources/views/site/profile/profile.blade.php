@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h1>Meu Perfil</h1>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Dados</h3>
        </div>
        <div class="box-body">
        <form method="POST" action="">
            {!! csrf_field() !!}
            <div class="form-group">
                <label>Nome</label>
            <input type="text" class="form-control" name="" value="{{ auth()->user()->name }}"  placeholder="Nome">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" name="" value="{{ auth()->user()->email }}"  placeholder="E-mail">
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" class="form-control" name="" value="{{ auth()->user()->password }}"  placeholder="Senha">
            </div>
            <div class="form-group">
                    <label>Imagem</label>
                    <input type="file" class="form-control" name=""  value="{{ auth()->user()->image }}"  placeholder="Imagem">
                </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sucess">Alterar</button>
            </div>
        </form>
        </div>
    </div>
    <style>
        input[type=number]::-webkit-inner-spin-button { 
        -webkit-appearance: none;        
        }
        input[type=number] { 
        -moz-appearance: textfield;
        appearance: textfield;
        }
        .btn-sucess{
            background: green;
            color: white;
        }
        .btn-sucess:hover{
            background: green ;
            color: white;
        }
    </style>
@stop
