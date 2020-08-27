@extends('layouts.admin.app')
@section('title', 'Admin :: Home')

@section('content')
@include('includes.alerts')

<!-- breadcrumb -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
            </div>
        </div>
    </div>
</section>

@endsection