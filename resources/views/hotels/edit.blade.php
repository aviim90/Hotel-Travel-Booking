@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Hotels</div>

                    <div class="card-body">
                        <form method="POST" action="{{isset($hotel)?route('hotels.update',$hotel->id):route('hotels.store')}}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($hotel))
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{isset($hotel)?$hotel->name:''}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input class="form-control" type="text" name="price" value="{{isset($hotel)?$hotel->price:''}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Start</label>
                                <input class="form-control" type="date" name="start" value="{{isset($hotel)?$hotel->start:''}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">End</label>
                                <input class="form-control" type="date" name="end" value="{{isset($hotel)?$hotel->end:''}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Country</label>
                                <select name="country_id" class="form-select">
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{isset($hotel)&&($country->id==$hotel->country_id)?'selected':''}}>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input class="form-control" type="file" name="image" value="{{isset($hotel)?$hotel->photo:''}}">
                            </div>
                            <button type="submit" class="btn btn-success"> {{isset($hotel)?'Save':'Add'}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



