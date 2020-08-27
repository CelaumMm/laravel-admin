@extends('layouts.admin.app')
@section('title', trans('admin.profile.edit'))

@section('content')
    @include('includes.alerts')

    <!-- breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-user-edit"></i> @lang('admin.profile.edit')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>
                                Home</a></li>
                        <li class="breadcrumb-item active"><i class="fas fa-user-edit"></i> @lang('admin.profile.edit')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if( !is_null(Auth::user()->avatar_id) && !empty(Auth::user()->avatar_id) && !is_null(Auth::user()->getMedia('avatar')->first() ) )
                                    <img class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->avatar->getUrl('card') }}">
                                @else
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/no-user.png') }}" alt="{{ auth()->user()->name }}">
                                @endif
                            </div>

                            <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-edit"></i>@lang('admin.profile.edit')</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <form role="form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf

                                <div class="form-group">
                                    <label for="name"><span class="text-danger">*</span>@lang('admin.name')</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}" >
                                </div>

                                <div class="form-group">
                                    <label for="email"><span class="text-danger">*</span>@lang('admin.email')</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="current_password">@lang('admin.current_password')</label>
                                    <input type="password" class="form-control" name="current_password" id="current_password">
                                </div>

                                <div class="form-group">
                                    <label for="password">@lang('admin.new_password')</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>

                                <div class="form-group">
                                    <label for="password">@lang('admin.confirm_password')</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                </div>

                                <div class="form-group">
                                    <label for="image">@lang('admin.image')</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>                            
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i> @lang('admin.save')
                                </button>

                                <a href="{{ route('home') }}" class="btn btn-default">
                                    <i class="fa fa-undo"></i> @lang('admin.return')
                                </a>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>

            @if( !is_null(Auth::user()->getMedia('avatar')->first() ) )
            <div class="row row-cols-1 row-cols-md-4">
                @foreach (auth()->user()->getMedia('avatar') as $avatar)
                    <div class="col mb-4">
                        <!-- <div class="card h-100"> -->
                        <div class="card">
                            <!-- <img src="{{ asset('vendor/admin-lte/dist/img/avatar.png') }}" class="card-img-top" alt="..."> -->

                            <img src="{{$avatar->getUrl('card')}}" class="card-img-top" alt="...">
                            <!-- <img src="{{$avatar->getFullUrl('card')}}" class="card-img-top" alt="..."> -->
                            <!-- <img src="{{$avatar->getPath('card')}}" class="card-img-top" alt="..."> -->

                            <div class="card-body text-center">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>

                            <div class="card-footer">
                                <a class="btn btn-app float-left" href="#" 
                                    onclick="event.preventDefault();document.getElementById('selectForm{{$avatar->id}}').submit()">
                                    <i class="fa fa-check"></i> Aplicar
                                </a>

                                <form action="{{route('profile.foto-update', auth()->id())}}" style="display:none"
                                    id="selectForm{{$avatar->id}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" type="submit" name="selectedAvatar" value="{{$avatar->id}}">
                                </form>

                                <a class="btn btn-app float-right mr-3" href="#"
                                    onclick="event.preventDefault();document.getElementById('deleteForm{{$avatar->id}}').submit()">
                                    <i class="fa fa-trash"></i> Remover
                                </a>

                                <form action="{{route('profile.foto-destroy', auth()->id())}}" style="display:none"
                                    id="deleteForm{{$avatar->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" type="submit" name="deletedAvatar" value="{{$avatar->id}}">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
@endsection

@push('css')
<style>
    .nav-tabs-custom>.nav-tabs>li.active {
        border-top-color: #d2d6de;
    }

    .thumbnail {
        margin-bottom: 0px;
        border-radius: 50%;
    }
</style>

@endpush