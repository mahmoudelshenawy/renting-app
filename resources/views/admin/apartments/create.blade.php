@extends('layouts.app')

@section('content')
@include('layouts.breadcrumbs')
<div class="container">
<div class="row vh-100 justify-content-between align-items-center" style="margin-top: -100px">
<div class="col-12">
    <div class="card">
        <div class="card-header">                               
        <h4 class="card-title">{{ trans('rent.add_apartment') }}</h4>                                
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">    
                                                        
                    <div class="col-12">
                        <form action="{{ route('apartments.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="username1">{{trans('rent.apartment_name')}}</label>                                                  
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="username1" name="name" placeholder="{{trans('rent.apartment_name')}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror                                                      
                            </div>
                            <div class="form-group">
                            <label for="email1">{{trans('rent.code')}}</label>                                                   
                                <input type="code" class="form-control  @error('code') is-invalid @enderror" id="code1" 
                                name="code" placeholder="{{trans('rent.code')}}">
                                @error('code')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror  
                            </div>
                            <div class="form-group">
                            <label for="inputPassword31">{{trans('rent.apartment_area')}}</label>                                                    
                                <input type="text" class="form-control @error('apartment_area') is-invalid @enderror" id="inputapartment_area31"
                                name="apartment_area" 
                                placeholder="{{trans('rent.apartment_area')}}">  
                                @error('apartment_area')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror              
                            </div> 
                            
                            <div class="form-group">
                            <label for="inputPassword31">{{trans('rent.floor')}}</label>                                                    
                                <input type="text" class="form-control @error('floor_id') is-invalid @enderror" id="inputPassword31"
                                name="floor_id" 
                                placeholder="{{trans('rent.floor')}}">        
                                @error('floor_id')
                            <span class="text-danger">{{$message}}</span>
                                @enderror        
                            </div> 
                            <div class="form-group">                                                  
                            <button type="submit" class="btn btn-primary">{{ trans('rent.add_apartment') }}</button></button>
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