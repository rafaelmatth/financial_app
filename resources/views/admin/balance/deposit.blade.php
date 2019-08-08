@extends('adminlte::page')

@section('title', 'Financial App')

@section('content_header')
    <h1>Recarga</h1>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Fazer Recarga</h3>
        </div>
        <div class="box-body">
        @if(isset($errors))
            @foreach ($errors->all() as $error )
            <div class="alert alert-warning">
                <p>{{$error}}<p>
            </div>
            @endforeach
        @endif
        <form method="POST" action="{{route('deposit.store')}}">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="number" step="0.01" class="form-control" name="valor"placeholder="Valor recarga">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sucess">Recarregar</button>
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
