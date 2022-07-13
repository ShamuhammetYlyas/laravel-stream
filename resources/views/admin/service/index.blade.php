@extends('layouts.admin-layout')
@section('title') Admin - Services @endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin/vendors/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/sweetalert2/sweetalert2.min.css') }}">
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
                <h3>Serwisler</h3>
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
                <div class="card-header custom-display">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#border-less"><span class="bi bi-plus-circle"></span> Täze goş</button>
                </div>
            </div>
                
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ady türkmençe</th>
                            <th>Ady rusça</th>
                            <th>Ady iňlisçe</th>
                            <th>Goşmaça</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $service->name_tk }}</td>
                                <td>{{ $service->name_ru }}</td>
                                <td>{{ $service->name_en }}</td>
                                <td align="center">
                                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-primary" style="border-radius: .267rem; margin-right:10px"><i class="bi bi-pencil-square"></i></a>

                                    <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                        <a href="javascript:void(0)" class="btn btn-danger ml-3" id="delete-service-{{$service->id}}">
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
    <div class="modal-dialog modal-dialog-scrollable" role="document">
    <form action="{{ route('admin.service.store') }}" class="form form-vertical" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Täze serwis goşmak formy</h5>
                <button type="button" class="close rounded-pill"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
              
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Ady türkmençe</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="name_tk"
                                    placeholder="Ady türkmençe" value="{{ old('name_tk') }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Ady rusça</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="name_ru"
                                    placeholder="Ady rusça" value="{{ old('name_ru') }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Ady iňlisçe</label>
                                <input type="text" id="first-name-vertical"
                                    class="form-control" name="name_en"
                                    placeholder="Ady iňlisçe" value="{{ old('name_en') }}" required>
                            </div>
                        </div>

                    </div>
                </div>
            
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Ýap</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Goş</span>
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
<script>
    // Simple Datatable
let table1 = document.querySelector('#table1');
let dataTable = new simpleDatatables.DataTable(table1);

$("[id^='delete-service-']").each(function() {
  var id = $(this).attr('id');
  id = id.replace("delete-service-",'');
     $('#delete-service-'+id).on('click', function(event){
            event.preventDefault();
                Swal.fire({
                  title: "Bu serwisi pozmak islýäňizmi!",
                  icon: 'warning',
                  showCancelButton: true,
                  reverseButtons: true,
                  confirmButtonColor: '#0CC27E',
                  cancelButtonColor: '#FF586B',
                  confirmButtonText: 'Howwa, poz!',
                  cancelButtonText: 'Ýok!',
                  confirmButtonClass: 'btn btn-success ml-3',
                  cancelButtonClass: 'btn btn-danger',
                  // buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                      $('#delete-service-'+id).parent().submit();
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

</script>
@endsection