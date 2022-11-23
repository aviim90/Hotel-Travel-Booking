@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Hotels</div>

                    <div class="card-body">
                        <a href="{{route('hotels.create')}}" class="btn btn-success">Add Hotel</a>
                        <hr>
                        <h5>Filter by Country</h5>

                        <form method="post" action="{{route('hotels.filter')}}">
                            @csrf
                            <div class="mb-3">
                                <label>Choose Country</label>
                                <select class="form-select" name="country_id">
                                    <option value="" {{ ($filter_country_id==null)?'selected':'' }}>all</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ ($filter_country_id==$country->id)?'selected':''}}>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success">Filter</button>
                        </form>
                        <hr>
                        <h5>Find Hotel</h5>
                        <form method="post" action="{{route('hotels.find')}}">
                            @csrf
                            <div class="mb-3">
                                <label>Find by text:</label>
                                <input class="form-control" name="name" type="text" value="{{$findHotel}}">
                            </div>
                            <button class="btn btn-success">Find</button>
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th><a href="{{route('price.order', 'price')}}"> Price
                                        @if(isset($orderBy)&&$orderBy=='price')
                                            {!!($orderDirection=='DESC')?'&uparrow;':'&downarrow;'!!}
                                        @endif
                                    </a></th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Country</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotels as $hotel)
                                <tr>
                                    <td>
                                        <img src="{{route('image.display', $hotel->photo)}}" style="width: 300px;">
                                    </td>
                                    <td>{{$hotel->name}}</td>
                                    <td>{{$hotel->price}}</td>
                                    <td>{{$hotel->start}}</td>
                                    <td>{{$hotel->end}}</td>
                                    <td>{{$hotel->country->name}}</td>

                                    <td>
                                        <a href="{{route('hotels.edit', $hotel->id)}}"
                                           class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('hotels.destroy', $hotel->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


