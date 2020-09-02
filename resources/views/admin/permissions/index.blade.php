@extends('layouts.admin.app')
@section('title', trans('admin.permissions.list'))

@section('content')
@include('includes.alerts')

<!-- breadcrumb -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-list"></i> @lang('admin.permissions.list')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item active"><i class="fas fa-list"></i> @lang('admin.permissions.list')
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2">
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>
                    @lang('admin.permissions.create')</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <!-- <h3 class="card-title">All together</h3> -->

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                    class="fas fa-expand"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('admin.permissions')</th>
                                    <th>@lang('admin.operations')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <div class="form-row">
                                            <div class="col-auto">
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                    class="btn btn-sm btn-warning pull-left">
                                                    <i class="fa fa-edit"></i> @lang('admin.edit')
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                {!! Form::open([
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('".trans("admin.confirm")."');",
                                                'route' => ['admin.permissions.destroy', $permission->id]
                                                ]) !!}

                                                {!! Form::button('<i class="fa fa-trash"></i> ' . trans("admin.delete"),
                                                ['type'=>'submit' ,'class' => 'btn btn-sm btn-danger']) !!}

                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
