@push('scripts')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="//cdn.datatables.net/plug-ins/1.10.21/i18n/Arabic.json"></script> --}}
<script>
     $(document).ready(function() {
     $("#rentants_table").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        dom: "Bfrtip",
        buttons: [
            {
                text: "Add New Rentant",
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
        ajax: "{{aurl('rentants')}}",
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
            { data: "age", name: "age" },
            { data: "number", name: "number" },
            { data: "activity", name: "activity" },
            {
                data: "actions",
                name: "actions",
                orderable: false,
                searchable: false,
                exportable: false,
                printable: false
            }
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
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header  justify-content-between align-items-center">                               
            <h4 class="card-title">{{__('rent.rentants')}}</h4> 
            </div>
            <div class="card-body">
              <form id="form_data" method="POST" action="{{ aurl("rentants/delete/all") }}">
                @csrf
                @method('delete')
              
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="rentants_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="check_all" onclick="check_all()" /></th>
                              </form>
                                <th>ID</th>
                                <th>@lang( 'rent.rentant_name' )</th>
                                <th>@lang( 'rent.age' )</th>
                                <th>@lang( 'rent.number' )</th>
                                <th>@lang( 'rent.activity' ) </th>
                                <th>@lang( 'admin.actions' )</th>
                                
                            </tr>
                        </thead>
                    </table>
                </div>
             
            </div>
        </div> 

    </div>                  
</div>

<!-- agedal -->
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

