@extends('layouts.admin.app')
@section('title', trans('admin.users.edit'))

@section('content')
@include('includes.alerts')

<!-- breadcrumb -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class='fa fa-user-edit'></i> @lang('admin.users.edit')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.home') }}"><i class="fas fa-home"></i> Home</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fas fa-users"></i> @lang('admin.users.list')
                        </a>
                    </li>

                    <li class="breadcrumb-item active"><i class='fa fa-user-edit'></i> @lang('admin.users.edit')</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
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
                    <div class="card-body">
                        {{-- Form model para preencher automaticamente os campos com dados do usuário --}}
                        {{ Form::model($user, array('route' => array('admin.users.update', $user->id), 'method' =>
                        'PUT')) }}
                        <div class="form-group">
                            {{ Form::label('name', trans('admin.name')) }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', trans('admin.email')) }}
                            {{ Form::email('email', null, array('class' => 'form-control')) }}
                        </div>

                        <div class='form-group'>
                            <h5><b>@lang('admin.roles.assign')</b></h5>

                            @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]', $role->id, $user->roles ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}
                            <br>
                            @endforeach
                        </div>

                        <div class='form-group'>
                            <h5><b>@lang('admin.permissions.assign')</b></h5>

                            @foreach ($permissions as $permission)
                            {{ Form::checkbox('permissions[]', $permission->id, $user->permissions ) }}
                            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                            @endforeach
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', trans('admin.password')) }}<br>
                            {{ Form::password('password', array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', trans('admin.password_confirmation')) }}<br>
                            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::button('<i class="fa fa-save"></i> '. trans('admin.save'), [
                            'type' => 'submit',
                            'class' => 'btn btn-success'
                            ]) }}

                            <a href="{{ route('admin.users.index') }}" class="btn btn-default">
                                <i class="fa fa-undo"></i> @lang('admin.return')
                            </a>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
