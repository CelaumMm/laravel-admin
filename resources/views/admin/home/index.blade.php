@extends('layouts.admin.app')
@section('title', trans('admin.users.create'))

@section('content')
@include('includes.alerts')

<!-- breadcrumb -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class='fa fa-user-plus'></i> @lang('admin.users.create')</h1>
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

                    <li class="breadcrumb-item active"><i class='fa fa-user-plus'></i> @lang('admin.users.create')</li>
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
