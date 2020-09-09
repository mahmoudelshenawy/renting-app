@push('scripts')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="//cdn.datatables.net/plug-ins/1.10.21/i18n/Arabic.json"></script> --}}
<script>
     $(document).ready(function() {
     $("#apartment_table").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        dom: "Bfrtip",
        buttons: [
            {
                text: "Add New Apartment",
                className: "btn btn-primary",
                action: function(e, dt, node, config) {
                    window.location.href = "{{URL::current()}}" + "/create";
                }
            },
            {
                text: "Reload",
                action: function(e, dt, node, config) {
                    dt.ajax.reload();
                }
            },
            {
                text: '<i class="fa fa-trash"></i>',
                className: "btn btn-danger delBtn"
            },
            "colvis",
            "excel",
            "print",
            "pdf"
        ],
        ajax: "{{aurl('apartments')}}",
        columnDefs: [
            {
                targets: 3,
                orderable: false,
                searchable: false
            }
        ],
        columns: [
            {
                data: "checkbox",
                name: "checkbox",
                orderable: false,
                searchable: false,
                exportable: false,
                printable: false
            },
            { data: "id", name: "id" },
            { data: "name", name: "name" },
            { data: "code", name: "code" },
            { data: "apartment_area", name: "apartment_area" },
            { data: "floor_id", name: "floor_id" },
            {
                data: "actions",
                name: "actions",
                orderable: false,
                searchable: false,
                exportable: false,
                printable: false
            },
            
        ]
    });
});
    //    check_all()
    delete_all()



    </script>
@endpush

@extends('layouts.app')
@section('content')
@include('layouts.breadcrumbs')
<div class="row">
  @if (session()->has('sucess'))
<div class="alert alert-sucess">{{session('success')}}</div>
  @endif
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header  justify-content-between align-items-center">                               
            <h4 class="card-title">{{__('admin.admins')}}</h4> 
            </div>
            <div class="card-body">
              <form id="form_data" method="POST" action="{{ aurl("apartments/delete/all") }}">
                @csrf
                @method('delete')
              
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="apartment_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="check_all" onclick="check_all()" /></th>
                                <th>ID</th>
                                <th>@lang( 'rent.apartment_name' )</th>
                                <th>@lang( 'rent.code' )</th>
                                <th>@lang( 'rent.apartment_area' )</th>
                                <th>@lang( 'rent.floor' ) </th>
                                <th>@lang( 'admin.actions' )</th>
                                
                            </tr>
                        </thead>
                    </table>
                </div>
              </form>
            </div>
        </div> 

    </div>                  
</div>

<!-- Modal -->
<div id="mutlipleDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
      </div>
      <div class="modal-body">

        <div class="alert alert-danger">
        	<div class="empty_record hidden">
        	<h4>{{ trans('admin.please_check_some_records') }} </h4>
        	</div>
        	<div class="not_empty_record hidden">
        	<h4>{{ trans('admin.ask_delete_itme') }} <span class="record_count"></span> ? </h4>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<div class="empty_record hidden">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
      	</div>
      	<div class="not_empty_record hidden">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
        <input type="submit"  value="{{ trans('admin.yes') }}"  class="btn btn-danger del_all" />
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

