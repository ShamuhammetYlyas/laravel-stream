@extends('layouts.admin-layout')
@section('title') Admin - Services @endsection

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
                <h3>Serwis - {{ $service->name_tk }}</h3>
                <p class="text-subtitle text-muted">Portalda hyzmat edýän hyzmatlar</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Serwisler</li>
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
                            <h4 class="card-title text-center">Serwis maglumat üýtgetme formy</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.service.update', $service->id) }}" class="form form-horizontal" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ady türkmençe</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name_tk" class="form-control" name="name_tk" value="{{ $service->name_tk }}" placeholder="Ady türkmençe" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ady rusça</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name_ru" class="form-control" name="name_ru" value="{{ $service->name_ru }}" placeholder="Ady rusça" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ady iňlisçe</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name_en" class="form-control" name="name_en" value="{{ $service->name_en }}" placeholder="Ady iňlisçe" required>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Submit</button>
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
