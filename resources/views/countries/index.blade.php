@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Countries</div>

                    <div class="card-body">
                        <a href="{{route('countries.create')}}" class="btn btn-success">Add Country</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Season</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{$country->name}}</td>
                                    <td>{{$country->season}}</td>
                                    <td>
                                        <a href="{{route('countryHotels',$country->id)}}" class="btn btn-success">Hotels</a>
                                    </td>
                                    <td>
                                        <a href="{{route('countries.edit', $country->id)}}" class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('countries.destroy', $country->id)}}">
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


