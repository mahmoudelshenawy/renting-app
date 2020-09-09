@push('scripts')
@if ($errors->all())
    @foreach($errors->all() as $error)

<script>toastr.error('{{$error}}' , 'Error')</script>
    @endforeach
@endif

    

@if (session()->has('success_add'))
<script>toastr.success('{{session("success_add")}}' , 'success')</script> 
@endif
@if (session()->has('success_edit'))
<script>toastr.success('{{session("success_edit")}}' , 'success')</script> 
@endif
@if (session()->has('success_delete'))
<script>toastr.success('{{session("success_delete")}}' , 'success')</script> 
@endif

@endpush