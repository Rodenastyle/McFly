@extends('layout')
@section('header')
<div class="page-header">
        <h1>{{ trans('notas.model') }} / {{ trans('notas.show') }} #{{ $nota->id }}</h1>
        <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('{{ trans("notas.deleteConfirm") }}')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('notas.edit', $nota->id) }}"><i class="glyphicon glyphicon-edit"></i> {{ trans('notas.edit') }}</a>
                <button type="submit" class="btn btn-danger">{{ trans('notas.delete') }} <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">{{ trans('notas.id') }}</label>
                    <p class="form-control-static"> {{$nota->id}}</p>
                </div>
                <div class="form-group">
                     <label for="title">{{ trans('notas.title') }}</label>
                     <p class="form-control-static">{{$nota->title}}</p>
                </div>
                    <div class="form-group">
                     <label for="body">{{ trans('notas.body') }}</label>
                     <p class="form-control-static">{{$nota->body}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('notas.index') }}"><i class="glyphicon glyphicon-backward"></i>  {{ trans('notas.back') }}</a>

        </div>
    </div>

@endsection