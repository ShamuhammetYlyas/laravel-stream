@extends('layouts.admin-layout')
@section('title') Admin - Zakazlar @endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin/vendors/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/sweetalert2/sweetalert2.min.css') }}">
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
#border-less{
    height: 100vh;
}

</style>
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Zakazlar</h3>
                <p class="text-subtitle text-muted">Portalda bar bolan zakazlar</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Zakazlar</li>
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
                {{-- <div class="card-header custom-display">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#border-less"><span class="bi bi-plus-circle"></span> Täze goş</button>
                </div> --}}
            </div>
                
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Surat</th>
                            <th>Category</th>
                            <th>Contact Name</th>
                            <th>Contact phone</th>
                            <th>Status</th>    
                            <th>Description</th>
                            <th align="center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offers as $offer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('storage/'.$offer->subcategory->image) }}" width="100%"></td>
                                <td>{{ $offer->subcategory->name_tk }}</td>
                                <td>{{ $offer->contact_name  }}</td>
                                <td>{{ $offer->contact_telephone  }}</td>
                                <td>
                                    @if ($offer->vip)
                                        <span class="badge bg-success">Vip</span>
                                    @else
                                        <span class="badge bg-danger">Not Vip</span>
                                    @endif
                                </td>
                                <td>{{ $offer->description  }}</td>
                                <td align="center">
                                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                    @if ($offer->vip)
                                        <a href="{{ route('admin.offer.change-vip', ['offer'=>$offer->id, 'vip'=>0]) }}" class="btn btn-danger" style="border-radius: .267rem; margin-right:10px">Make normal</a>
                                    @else
                                        <a href="{{ route('admin.offer.change-vip', ['offer'=>$offer->id, 'vip'=>1]) }}" class="btn btn-success" style="border-radius: .267rem; margin-right:10px">Make vip</a>
                                    @endif 
                                    

                                    <form action="{{ route('admin.category.destroy', $offer->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                        <a href="javascript:void(0)" class="btn btn-danger ml-3" id="delete-offer-{{$offer->id}}">
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
</div>
@endsection

@section('js')
<script src="{{ asset('admin/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('admin/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/custom/js/category.js') }}"></script>
<script src="{{ asset('admin/vendors/choices.js/choices.min.js') }}"></script>

<script>
    // Simple Datatable
let table1 = document.querySelector('#table1');
let dataTable = new simpleDatatables.DataTable(table1);

// const element = document.querySelector('.choices');
// const choices = new Choices(element, {
//     maxItemCount: -1,
// });

$("[id^='delete-offer-']").each(function() {
  var id = $(this).attr('id');
  id = id.replace("delete-offer-",'');
     $('#delete-offer-'+id).on('click', function(event){
            event.preventDefault();
                Swal.fire({
                  title: "Bu zakazy pozmak islýäňizmi!",
                  icon: 'warning',
                  showCancelButton: true,
                  reverseButtons: true,
                  confirmButtonColor: '#0CC27E',
                  cancelButtonColor: '#FF586B',
                  confirmButtonText: 'Howwa, poz!',
                  cancelButtonText: 'Ýok!',
                  confirmButtonClass: 'btn btn-success ml-3',
                  cancelButtonClass: 'btn btn-danger',
                }).then((result) => {
                    if (result.isConfirmed) {
                      $('#delete-offer-'+id).parent().submit();
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