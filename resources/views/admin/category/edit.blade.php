@extends('layouts.admin-layout')
@section('title') Admin - Kategoriýalar @endsection

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
                <h3>Kategoriýa - {{ $category->name_tk }}</h3>
                <p class="text-subtitle text-muted">Portalda bar bolan kategoriýalar</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategoriýalar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
                
            <div class="card-body">
                <div class="col-md-6 col-12 offset-3">
                    <div class="card">
                        <div class="card-header pb-1">
                            <h4 class="card-title text-center">Kategoriýa maglumat üýtgetme formy</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.category.update', $category->id) }}" class="form form-horizontal" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ady türkmençe</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name_tk" class="form-control" name="name_tk" value="{{ $category->name_tk }}" placeholder="Ady türkmençe" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ady rusça</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name_ru" class="form-control" name="name_ru" value="{{ $category->name_ru }}" placeholder="Ady rusça" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ady iňlisçe</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name_en" class="form-control" name="name_en" value="{{ $category->name_en }}" placeholder="Ady iňlisçe" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Degişli serwisi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-select" id="service" name="service_id">
                                                    <option value=""></option>
                                                    @forelse($services as $service)
                                                        <option value="{{ $service->id }}" {{ $category->service_id == $service->id ? 'selected' : '' }}>
                                                            {{ $service->name_tk }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Esasy kategoriýa</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-select" id="category" name="parent_id">
                                                    <option value=""></option>
                                                    @forelse($categories->whereNull('parent_id') as $cat)
                                                        <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                                                            {{ $cat->name_tk }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Tertip belgisi</label>
                                            </div>

                                            <div class="col-8">
                                                <div class="form-group">
                                                    @if ($category->parent_id)
                                                        <select class="form-select" id="order" name="order">
                                                            @forelse($categories->where('parent_id', $category->parent_id) as $key => $value)
                                                            <option value="{{ $value->order }}" {{ $category->order == $value->order ? 'selected' : '' }}>
                                                                {{ $loop->iteration }}
                                                            </option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    @else
                                                        <select class="form-select" id="order" name="order">
                                                            @forelse($categories->whereNull('parent_id') as $key => $value)
                                                            <option value="{{ $value->order }}" {{ $category->order == $value->order ? 'selected' : '' }}>
                                                                {{ $loop->iteration }}
                                                            </option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Attributes</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="choices form-select multiple-remove" multiple="multiple" name="attribute[]">
                                                    @foreach ($attributes as $attribute)
                                                        <option value="{{ $attribute->id }}" {{ $category->attributes->contains($attribute->id) ? 'selected' : '' }}>{{ $attribute->labelName_tk }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                           <!--  <div class="col-md-4">
                                                <label>Attributes</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="choices form-select multiple-remove" multiple="multiple" name="attribute[]">
                                                    @foreach ($category->attributes as $attribute)
                                                        <option value="{{ $attribute->id }}" selected>{{ $attribute->labelName_tk }}</option>
                                                    @endforeach
                                                </select>
                                            </div> -->

                                            <div class="col-md-4">
                                                <label>Öňki surat</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name_tk }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Täze surat</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" type="file" id="image" name="image" {{ $category->parent_id ? '' : 'disabled' }}>
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
<script src="{{ asset('admin/own/js/alem.js') }}"></script>
<script src="{{ asset('admin/vendors/choices.js/choices.min.js') }}"></script>
@endsection
