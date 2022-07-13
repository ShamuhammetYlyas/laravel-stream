@extends('layouts.admin-layout')
@section('title') Admin - Admin ulanyjylar @endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin/vendors/choices.js/choices.min.css') }}">
<style type="text/css">
.bi-plus-circle::before{
    vertical-align: middle;
}
.custom-wrapper{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
</style>
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Admin - {{ $admin_user->name }}</h3>
                <p class="text-subtitle text-muted">Portalyň admin ulanyjylary</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin ulanyjylar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">

            <div class="custom-wrapper">
                <div class="card-header custom-display">
                    Tablissa
                </div>
            </div>
                
            <div class="card-body">
                <div class="col-md-6 col-12 offset-3">
                    <div class="card">
                        <div class="card-header pb-1">
                            <h4 class="card-title text-center">Admin ulanyjy maglumat üýtgetme formy</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.admin-user.update', $admin_user->id) }}" class="form form-horizontal" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ady</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name" class="form-control" name="name" value="{{ $admin_user->name }}" placeholder="Ady" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ulanyjy ady</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="username" class="form-control" name="username" value="{{ $admin_user->username }}" placeholder="Ulanyjy ady" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Role</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="choices form-select multiple-remove" multiple="multiple" name="role[]">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}" {{ $admin_user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Açar sözi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="password" id="password" class="form-control" name="password">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Üýtget</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script src="{{ asset('admin/vendors/choices.js/choices.min.js') }}"></script>
@endsection
