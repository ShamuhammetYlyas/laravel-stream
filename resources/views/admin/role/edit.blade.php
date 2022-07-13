@extends('layouts.admin-layout')
@section('title') Admin - Roles @endsection

@section('css')
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
                <h3>Role - {{ $role->name }}</h3>
                <p class="text-subtitle text-muted">Roles that can be assign admin users</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">

            <div class="custom-wrapper">
                <div class="card-header custom-display">
                    Table
                </div>
            </div>
                
            <div class="card-body">
                <div class="col-md-6 col-12 offset-3">
                    <div class="card">
                        <div class="card-header pb-1">
                            <h4 class="card-title text-center">Role infos edit form</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.role.update', $role->id) }}" class="form form-horizontal" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Role name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name" class="form-control" name="name" value="{{ $role->name }}" placeholder="Role name" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Role description</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="description" class="form-control" name="description" value="{{ $role->description }}" placeholder="Role description" required>
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
