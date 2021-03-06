@extends('adminlte::page')

@section('title', 'Financial App')

@section('content_header')
    <h1>Histórico</h1>
@stop

@section('content')
<div class="box">
        <div class="box-header">
        <form action="{{ route('historic.search') }}" method="post" class="form form-inline">
            {!! csrf_field() !!}
                        <input type="text" name="id" class="form-control" placeholder="ID">
                        <input type="date" name="date" class="form-control" >
                        <select name="type" class="form-control">
                            <option value="">-- Selecione o Tipo --</option>
                            @foreach ($types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                            @endforeach
                        </select>
                        <button type="submit" value="submit" class="btn btn-primary">Pesquisar</button>
                </form>
            <h3>Últimos registros</h3>
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
                  {{$historics->userSender->name}}
                @else
                 - 
                @endif
            </td>
        </tr>
        @empty
        @endforelse
            </tbody>
        </table>
        <div class="pagination">
            @if (isset($dataForm))
                {!! $historic->appends($dataForm)->links()!!} 
            @else
                {!! $historic->links()!!}
            @endif 
        </div>
    </div>
    </div>
    <style>
        .pagination{
            position: relative;
            display: flex;
            margin: 0 auto;
            justify-content: center;
            padding: 20px 0px 20px 0px;
        }
        </style>
@stop
