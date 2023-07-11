@extends('layouts.main')
@section('content')
    <div class="container">
        <h2>Room Lists</h2>
        @if (session('successMsg'))
            <div class="alert alert-success" role="alert">
                {{ session('successMsg') }}
            </div>
        @endif

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room type</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price per night</th>
                    <th scope='col'>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <th scope="row">{{ $room->id }}</th>
                        <td>{{ $room->room_type }}</td>
                        <td>{{ $room->capacity }}</td>
                        <td><img src="{{ $room->img_url }}" alt="Room image of room number {{ $room->id }}"
                                width="100"></td>
                        <td>{{ $room->price_per_night }}</td>

                        <td>

                            {{-- <a class="btn btn-raised btn-primary btn-sm" href="{{ route('editroom', $room->id) }}"><i
                                    class="bi bi-pencil-square"></i></a> || --}}

                            <form method="POST" id="delete-form-{{ $room->id }}"
                                action="{{ route('deleteroom', $room->id) }}" style="display:none;">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                            </form>
                            <button
                                onclick="
                    if(confirm('Are you sure to delete this data?')){
                        event.preventDefault(); 
                        document.getElementById('delete-form-{{ $room->id }}')
                        .submit();
                        }else{
                            event.preventDefault();
                        }"
                                class="btn btn-raised btn-danger btn-sm" href="{{ route('delete', $room->id) }}"><i
                                    class="bi bi-trash-fill"></i></button>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="row"> {{ $rooms->links() }}</div>

        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group my-4">
                <label for="file">Choose Room File</label>
                <input type="file" class="form-control" name="file" id="file">
            </div>
            <button type="submit" class="btn btn-dark mb-4">Submit</button>
        </form>
    </div>
@endsection
