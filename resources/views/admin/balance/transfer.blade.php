@extends('adminlte::page')

@section('title', 'Financial App')

@section('content_header')
    <h1>Recarga</h1>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Transferir Saldo</h3>
        </div>
        <div class="box-body">
        @include('admin.includes.alerts')
        <form method="POST" action="{{route('confirm.transfer')}}">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="text" class="form-control" name="sender" placeholder="Para quem vai transferir? (Nome ou E-mail)">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sucess">Próxima Etapa</button>
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
