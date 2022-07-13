@extends('layouts.admin-layout')
@section('title') Admin - Attributes @endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-tagsinput.css') }}">
<style type="text/css">
    .bi-plus-circle::before {
        vertical-align: middle;
    }

    .custom-wrapper {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .label-info {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
        background-color: blue;
    }

</style>
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Attribute - {{ $attribute->labelName_tk }}</h3>
                <p class="text-subtitle text-muted">Awtoulaglar we tehnika attribute</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Attribute</li>
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
                <div class="col-md-8 col-12 offset-2">
                    <div class="card">
                        <div class="card-header pb-1">
                            <h4 class="card-title text-center">Attribute infos edit form</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.attribute.update', $attribute->id) }}"
                                    class="form form-horizontal" method="POST" id="attribute-edit-form">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Label name türkmençe</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="labelName_tk" class="form-control"
                                                    name="labelName_tk" value="{{ $attribute->labelName_tk }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Label name rusça</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="labelName_ru" class="form-control"
                                                    name="labelName_ru" value="{{ $attribute->labelName_ru }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Label name iňlisçe</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="labelName_en" class="form-control"
                                                    name="labelName_en" value="{{ $attribute->labelName_en }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Input name</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="input_name" class="form-control"
                                                    name="input_name" value="{{ $attribute->input_name }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Type</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="type" class="form-control" name="type"
                                                    value="{{ $attribute->type }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Mobile type</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="mobile_type" class="form-control"
                                                    name="mobile_type" value="{{ $attribute->mobile_type }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Options türkmençe</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="options_tk[]" data-role="tagsinput"
                                                    value="{{ $attributeOptions_tk }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Options rusça</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="options_ru[]" data-role="tagsinput"
                                                    value="{{ $attributeOptions_ru }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Options iňlisçe</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="options_en[]" data-role="tagsinput"
                                                    value="{{ $attributeOptions_en }}">
                                            </div>

                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Üýtget</button>
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
<script src="{{ asset('admin/js/bootstrap-tagsinput.min.js') }}"></script>
<script>
    $('#attribute-edit-form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
</script>
@endsection
