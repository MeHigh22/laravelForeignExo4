@extends("layouts.index")


@section("content")

<div class="container mt-5">
        <h1>Add an album</h1>

        <form action="/albums" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">Nom : </label>
                <input type="text" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="">Author : </label>
                <input type="text" name="author" value="{{old('author')}}">
            </div>

            <div class="form-group">
                <label for="url">Photo : </label>
                <input type="file" name="url" id="url">
            </div>

            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
    <div class="container mt-5">
        <h1>Les albums</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Photo</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($albums as $album)
                <tr>
                    <th scope="row">{{$album->id}}</th>
                    <td>{{$album->name}}</td>
                    <td>{{$album->author}}</td>
                    <td>
                        <img src="{{asset('storage/img/'.$album->photos->url)}}" alt="" height="200px">
                    </td>
                    <td>
                        <a href="/albums/{{$album->id}}/edit" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="/albums/{{$album->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>

@endsection

