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
            <div class="btn btn-primary"><i class="fas fa-cart-plus"></i> Recarregar</div>
            <div class="btn btn-danger"><i class="fas fa-cart-arrow-down"></i> Sacar</div>
        </div>
        <div class="box-body">
                <div class="small-box bg-green">
                        <div class="inner">
                        <h3>R$ {{ $amount}}<sup style="font-size: 20px"></sup></h3>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Historico <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
        </div>
    </div>
@stop
