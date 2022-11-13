@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Countries</div>

                    <div class="card-body">
                        <form method="POST" action="{{isset($country)?route('countries.update',$country->id):route('countries.store')}}">
                            @csrf
                            @if(isset($country))
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{isset($country)?$country->name:''}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Season</label>
                                <input class="form-control" type="text" name="season" value="{{isset($country)?$country->season:''}}">
                            </div>
                            <button type="submit" class="btn btn-success"> {{isset($country)?'Save':'Add'}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



