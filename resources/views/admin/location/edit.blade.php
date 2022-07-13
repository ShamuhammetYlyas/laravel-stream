@extends('layouts.admin-layout')
@section('title') Admin - Ýurtlar | Welaýatlar @endsection

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
                <h3>Location - {{ $location->name_tk }}</h3>
                <p class="text-subtitle text-muted">Portalda bar bolan ýurtlar | welaýatlar | etraplar</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ýurtlar | welaýatlar | etraplar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="col-md-9 col-12 offset-1">
                    <div class="card">
                        <div class="card-header pb-1">
                            <h4 class="card-title text-center">Ýurt | welaýat | etrap maglumat üýtgetme formy</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.location.update', $location->id) }}" class="form form-horizontal" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ady türkmençe</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name_tk" class="form-control" name="name_tk" value="{{ $location->name_tk }}" placeholder="Ady türkmençe" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ady rusça</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name_ru" class="form-control" name="name_ru" value="{{ $location->name_ru }}" placeholder="Ady rusça" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ady iňlisçe</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name_en" class="form-control" name="name_en" value="{{ $location->name_en }}" placeholder="Ady iňlisçe" required>
                                            </div>
                                            <div class="col-md-4">
                                                Ýurt <small class="text-danger">(Goşýanyňyz ýurt bolsa boş goýuň)</small>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-select" id="country" name="parent_id">
                                                    <option value=""></option>
                                                    @forelse($countries as $country)
                                                        <option value="{{ $country->id }}" {{ ($location->parent_id == NULL ? NULL : ($location->country->country ? $location->country->country->id : $location->country->id)) == $country->id ? 'selected' : '' }}>
                                                            {{ $country->name_tk }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                Welaýat <small class="text-danger">(Goşýanyňyz welaýat bolsa boş goýuň)</small>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-select" id="welayat" name="welayat_id">
                                                    <option value=""></option>
                                                    @forelse($location->parent_id == NULL ? [] : ($location->country->country ? $location->country->country->welayatlar : []) as $welayat)
                                                        <option value="{{ $welayat->id }}" {{ $location->parent_id == $welayat->id ? 'selected' : '' }}>
                                                            {{ $welayat->name_tk }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
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
<script src="{{ asset('admin/custom/js/location.js') }}"></script>
@endsection
