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
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                <th>Valor</th>
                <th>Tipo</th>
                <th>Data</th>
                <th>Seeder</th>
                </tr>
            </thead>
            <tbody>
        @forelse($historic as $historics)
        <tr>
            <td>{{$historics->amount}}</td>
            <td>{{$historics->type($historics->type)}}</td>
            <td>{{$historics->date}}</td>
            <td>
                @if($historics->user_id_transaction)
                  {{$historics->userSeender->name}}
                @else
                 - 
                @endif
            </td>
        </tr>
        @empty
        @endforelse
            </tbody>
        </table>

        </div>
    </div>
@stop
