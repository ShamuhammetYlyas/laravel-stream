@extends('layouts.admin-layout')
@section('title') Admin - Attributes @endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin/vendors/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-tagsinput.css') }}">
<style type="text/css">
.bi-plus-circle::before{
    vertical-align: middle;
}
.custom-wrapper{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.label-info{
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
                <h3>Technic attributes</h3>
                <p class="text-subtitle text-muted">Awtoulaglar we tehnika attributes</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Attributes</li>
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
                <div class="card-header custom-display">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#border-less"><span class="bi bi-plus-circle"></span> New</button>
                </div>
            </div>
                
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Label name</th>
                            <th>Input name</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attributes as $attribute)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attribute->labelName_tk }}</td>
                                <td>{{ $attribute->input_name }}</td>
                                <td>{{ $attribute->type }}</td>
                                <td align="center">
                                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.attribute.edit', $attribute->id) }}" class="btn btn-primary" style="border-radius: .267rem; margin-right:10px"><i class="bi bi-pencil-square"></i></a>

                                    <form action="{{ route('admin.attribute.destroy', $attribute->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                        <a href="javascript:void(0)" class="btn btn-danger ml-3" id="delete-attribute-{{$attribute->id}}">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

                                        <!--BorderLess Modal Modal -->
<div class="modal fade text-left modal-borderless" id="border-less"
    tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <form action="{{ route('admin.attribute.store') }}" class="form form-vertical" method="POST" id="attribute-form">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new attribute form</h5>
                <button type="button" class="close rounded-pill"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
              
                <div class="form-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Lable name türkmençe</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="labelName_tk"
                                    placeholder="Lable name türkmençe" value="{{ old('labelName_tk') }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Lable name rusça</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="labelName_ru"
                                    placeholder="Lable name rusça" value="{{ old('labelName_ru') }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Lable name iňlisçe</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="labelName_en"
                                    placeholder="Lable name iňlisçe" value="{{ old('labelName_en') }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Input name</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="input_name"
                                    placeholder="Input name" value="{{ old('input_name') }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Type</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="type"
                                    placeholder="type" value="{{ old('type') }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Mobile type</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="mobile_type"
                                    placeholder="Mobile type" value="{{ old('mobile_type') }}" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Options türkmençe</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="options_tk[]"
                                    data-role="tagsinput" id="optionlar">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Options rusça</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="options_ru[]"
                                    data-role="tagsinput" id="optionlar_ru">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Options iňlisçe</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="options_en[]"
                                    data-role="tagsinput" id="optionlar_en">
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Add</span>
                </button>
            </div>
        </div>
    </form>
    </div>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('admin/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('admin/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-tagsinput.min.js') }}"></script>
<script>

// Simple Datatable
let table1 = document.querySelector('#table1');
let dataTable = new simpleDatatables.DataTable(table1);

$("[id^='delete-attribute-']").each(function() {
  var id = $(this).attr('id');
  id = id.replace("delete-attribute-",'');
     $('#delete-attribute-'+id).on('click', function(event){
            event.preventDefault();
                Swal.fire({
                  title: "Are you sure?!",
                  icon: 'warning',
                  showCancelButton: true,
                  reverseButtons: true,
                  confirmButtonColor: '#0CC27E',
                  cancelButtonColor: '#FF586B',
                  confirmButtonText: 'Yes, sure!',
                  cancelButtonText: 'No!',
                  confirmButtonClass: 'btn btn-success ml-3',
                  cancelButtonClass: 'btn btn-danger',
                  // buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                      $('#delete-attribute-'+id).parent().submit();
                    } else{
                      Swal.fire(
                        'Cancelled',
                        'Goýbolsun edildi',
                        'error'
                      )
                    }
                  })
     });

});

$('#attribute-form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

</script>
@endsection