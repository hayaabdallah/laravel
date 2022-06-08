@extends('movies.layout')
@section('content')


<div class="row">
    <br><br><br><br>
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>NETFLIX MOVIES - 2022</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('movies.create') }}"> Create New Movie</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Movie Name</th>
        <th>Movie gener</th>
        <th>Movie Description</th>
        <th>Movie image</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($movies as $movie)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $movie->movie_name}}</td>
        <td>{{ $movie->movie_gener}}</td>
        <td>{{ $movie->movie_description}}</td>
        <td>
           <img src="{{asset('storage/images/'.$movie->photo)}}" style="width:100px ;height:100px;">
        </td>

        <td>
            <form action="{{ route('movies.destroy',$movie->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('movies.show',$movie->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('movies.edit',$movie->id) }}">Edit</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $movies->links() !!}

@endsection