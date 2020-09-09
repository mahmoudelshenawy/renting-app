@push('scripts')
<script>
$('.datepickerInput').datepicker({
    format: 'yyyy-mm-dd',
    autoclose:false,
todayBtn:true,
clearBtn:true
});
</script>
@endpush

@extends('layouts.app')

@section('content')
@include('layouts.breadcrumbs')
<div class="container mt-4">
<div class="row justify-content-between align-items-center">
<div class="col-12">
    <div class="card">
        <div class="card-header">                               
        <h4 class="card-title">{{ trans('rent.add_lease') }}</h4>                                
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">    
                                                        
                    <div class="col-12">
                        <form action="{{ route('leases.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="apartment">{{trans('rent.apartment')}}</label>     
                            <?php $apartments = \App\Models\Apartment::all(['id' , 'name']); ?>      
                            <select name="apartment_id" id="apartment" class="form-control @error('apartment_id') is-invalid @enderror" id="username1">                                     
                                <option >{{ trans('rent.please_select_apartment') }}</option>
                                @forelse ($apartments as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>  
                                @empty
                                <option>{{ trans('rent.no_apartment') }}</option>  
                                @endforelse
                            </select>  
                                @error('apartment_id')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror                                                      
                            </div>
                            <div class="form-group">
                            <label for="rentant">{{trans('rent.rentant')}}</label>     
                            <?php $rentants = \App\Models\Rentant::all(); ?>      
                            <select name="rentant_id" id="apartment" class="form-control @error('rentant_id') is-invalid @enderror" id="username1">                                      
                                <option >{{ trans('rent.please_select_rentant') }}</option>
                                @forelse ($rentants as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>  
                                @empty
                                <option>{{ trans('rent.no_rentant') }}</option>  
                                @endforelse
                            </select> 
                                @error('rentant_id')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror                                                      
                            </div>
                            <div class="form-group">
                            <label for="email1">{{trans('rent.duration')}}</label>                                                   
                                <input type="duration" class="form-control  @error('duration') is-invalid @enderror" id="duration1" 
                                name="duration" placeholder="{{trans('rent.duration')}}">
                                @error('duration')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror  
                            </div>
                            <div class="form-group">
                            <label for="inputPassword31">{{trans('rent.agreed_money')}}</label>                                                    
                                <input type="text" class="form-control @error('agreed_money') is-invalid @enderror" id="inputagreed_money31"
                                name="agreed_money" 
                                placeholder="{{trans('rent.agreed_money')}}">  
                                @error('agreed_money')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror              
                            </div> 
                            
                            <div class="form-group">
                            <label for="inputPassword31">{{trans('rent.start_from')}}</label>                                                    
                                <input type="text" class="form-control datepickerInput @error('start_from') is-invalid @enderror" id="inputPassword31"
                                name="start_from" 
                                placeholder="{{trans('rent.start_from')}}">        
                                @error('start_from')
                            <span class="text-danger">{{$message}}</span>
                                @enderror        
                            </div> 
                            <div class="form-group">                                                  
                            <button type="submit" class="btn btn-primary">{{ trans('rent.add_lease') }}</button></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
</div>
</div>
@endsection