@extends('layouts.app')

@section('content')
@include('layouts.breadcrumbs')
<div class="container">
<div class="row vh-100 justify-content-between align-items-center" style="margin-top: -100px">
<div class="col-12">
    <div class="card">
        <div class="card-header">                               
        <h4 class="card-title">{{ trans('rent.edit_rentant') }}</h4>                                
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">    
                                                        
                    <div class="col-12">
                        <form action="{{ route('rentants.update' , $item->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                            <label for="username1">{{trans('rent.rentant_name')}}</label>                                                  
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="username1" name="name" placeholder="{{trans('rent.rentant_name')}}" value="{{$item->name}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror                                                      
                            </div>
                            <div class="form-group">
                            <label for="email1">{{trans('rent.age')}}</label>                                                   
                                <input type="age" class="form-control  @error('age') is-invalid @enderror" id="age1" 
                                name="age" placeholder="{{trans('rent.age')}}" value="{{$item->age}}">
                                @error('age')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror  
                            </div>
                            <div class="form-group">
                            <label for="inputPassword31">{{trans('rent.number')}}</label>                                                    
                                <input type="text" class="form-control @error('number') is-invalid @enderror" id="inputnumber31"
                                name="number" 
                                placeholder="{{trans('rent.number')}}" value="{{$item->number}}">  
                                @error('number')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror              
                            </div> 
                            
                            <div class="form-group">
                            <label for="inputPassword31">{{trans('rent.activity')}}</label>                                                    
                                <input type="text" class="form-control @error('activity') is-invalid @enderror" id="inputPassword31"
                                name="activity" 
                                placeholder="{{trans('rent.activity')}}" value="{{$item->activity}}">        
                                @error('activity')
                            <span class="text-danger">{{$message}}</span>
                                @enderror        
                            </div> 
                            <div class="form-group">                                                  
                            <button type="submit" class="btn btn-primary">{{ trans('rent.edit_rentant') }}</button></button>
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