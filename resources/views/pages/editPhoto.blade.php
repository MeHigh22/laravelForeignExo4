@extends("layouts.index")



@section("content")
    <div class="container mt-5">
        <form action="/albums/{{$edit->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="url">Photo : </label>
            <div class="group-form">
                <img src="{{asset('storage/img/'.$edit->url)}}" alt="" height="150px">
                <input type="file" name="url" id="url">
            </div>
            <button type="submit" class="btn btn-success my-5">Changer</button>
        </form>
    </div>

@endsection

