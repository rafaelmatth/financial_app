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
        {{$historic}}
        </form>
        </div>
    </div>
@stop
