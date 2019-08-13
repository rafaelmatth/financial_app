@extends('adminlte::page')

@section('title', 'Financial App')

@section('content_header')
    <h1>Corfirmação</h1>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Confirmar Transferência</h3>
        </div>
        <div class="box-body">
        @include('admin.includes.alerts')
        <p><b>Transferir para: </b>{{$sender->name}}<p>
        <p><b>Saldo disponível: </b>{{$balance->amount}}<p>
        <form method="POST" action="{{route('transfer.store')}}">
            {!! csrf_field() !!}
            <div class="form-group">
                    <input type="hidden" name="sender_id" value="{{$sender->id}}">
                <input type="number" step="0.01" class="form-control" name="valor" placeholder="Valor da transferência">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sucess">Transferir</button>
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
