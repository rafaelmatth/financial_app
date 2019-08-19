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
                <th>#</th>
                <th>Valor</th>
                <th>Tipo</th>
                <th>Seeder</th>
                </tr>
            </thead>
            <tbody>
        @forelse($historic as $historics)
        <tr>
            <td>{{$historics->id}}</td>
            <td>{{$historics->amount}}</td>
            <td>{{$historics->type}}</td>
            <td>{{$historics->user_id_transaction}}</td>
        </tr>
        @empty
        @endforelse
            </tbody>
        </table>

        </div>
    </div>
@stop
