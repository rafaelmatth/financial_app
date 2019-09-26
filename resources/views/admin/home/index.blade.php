@extends('adminlte::page')

@section('title', 'Financial App')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"></span>

            <div class="info-box-content">
              <span class="info-box-text">Seu saldo</span>
            <span class="info-box-number">R$ {{$saldo}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"></span>

            <div class="info-box-content">
              <span class="info-box-text">Seu Id</span>
            <span class="info-box-number">{{$userId}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green">  <ion-icon name="cash"></ion-icon>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Nº de transacões</span>
            <span class="info-box-number">{{$nT}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data</span>
              <span class="info-box-number">{{$ultT}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
@stop
