@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> {{ trans('notas.model') }} / {{ trans('notas.create') }} </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('notas.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label for="title-field">{{ trans('notas.title') }}</label>
                    <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('body')) has-error @endif">
                       <label for="body-field">{{ trans('notas.body') }}</label>
                    <input type="text" id="body-field" name="body" class="form-control" value="{{ old("body") }}"/>
                       @if($errors->has("body"))
                        <span class="help-block">{{ $errors->first("body") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">{{ trans('notas.create') }}</button>
                    <a class="btn btn-link pull-right" href="{{ route('notas.index') }}"><i class="glyphicon glyphicon-backward"></i> {{ trans('notas.back') }}</a>
                </div>
            </form>

        </div>
    </div>
@endsection