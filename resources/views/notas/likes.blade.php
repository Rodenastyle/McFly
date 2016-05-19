@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> {{ trans('likes.model') }}
            <a class="btn btn-success pull-right" href="{{ route('notas.create') }}"><i class="glyphicon glyphicon-plus"></i> {{ trans('notas.create') }}</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($notas->count())
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>{{ trans('notas.id') }}</th>
                        <th>{{ trans('notas.title') }}</th>
                        <th>{{ trans('notas.body') }}</th>
                        <th class="text-right">{{ trans('notas.options') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($notas as $like => $nota)
                        <tr>
                            <td>{{$nota->id}}</td>
                            <td>{{$nota->title}}</td>
                            <td>{{$nota->body}}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-primary" href="{{ route('notas.show', $nota->id) }}"><i class="glyphicon glyphicon-eye-open"></i> {{ trans('notas.view') }}</a>
                                <a class="btn btn-xs btn-warning" href="{{ route('notas.edit', $nota->id) }}"><i class="glyphicon glyphicon-edit"></i> {{ trans('notas.edit') }}</a>
                                <form action="{{ route('likes.destroy', $like) }}" method="POST" style="display: inline;" onsubmit="if(confirm('{{ trans("notas.deleteConfirm") }}')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> {{ trans('notas.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @else
                <h3 class="text-center alert alert-info">{{ trans('notas.empty') }}</h3>
            @endif

        </div>
    </div>

@endsection