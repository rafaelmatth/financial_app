@extends('adminlte::page')

@section('title', 'Financial App')

@section('content_header')
    <h1>Saldo</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
    </ol>
@stop

@section('content')
    <p>Meu saldo</p>
    <div class="box">
        <div class="box-header">
            <a href="{{ route('balance.deposit') }}" class="btn btn-primary"><b>+</b> Recarregar</a>
        @if( $amount > 0 )
        <a href="{{route('balance.withdrawn')}}" class="btn btn-danger"><b>↓</b> Sacar</a>
        @endif
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$final}}<sup style="font-size: 20px"></sup></h3>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Historico <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop
