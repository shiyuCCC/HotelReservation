@extends('layouts.main')
@section('content')
    <div class="container">
        <h2>Reservation Records</h2>
        @if (session('successMsg'))
            <div class="alert alert-success" role="alert">
                {{ session('successMsg') }}
            </div>
        @endif

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room id</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Email</th>
                    <th scope='col'>Phone</th>
                    <th scope="col">Number of people</th>
                    <th scope="col">Check in date</th>
                    <th scope="col">Check out date</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Edit</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <th scope="row">{{ $reservation->id }}</th>
                        <td>{{ $reservation->room_id }}</td>
                        <td>{{ $reservation->customer_name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>{{ $reservation->num_people }}</td>
                        <td>{{ $reservation->check_in_date }}</td>
                        <td>{{ $reservation->check_out_date }}</td>
                        <td>{{ $reservation->total_price }}</td>

                        {{-- <td><a class="btn btn-raised btn-primary btn-sm" href="{{ route('edit', $reservation->id) }}"><i
                                    class="bi bi-pencil-square"></i></a> || --}}

                        <td>
                            <form method="POST" id="delete-form-{{ $reservation->id }}"
                                action="{{ route('delete', $reservation->id) }}" style="display:none;">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <!-- equals <input type="hidden" name="_method" value="delete"> (Method spoofing) to work around the limitaions of HTML -->
                            </form>
                            <button onclick="confirmAndSubmit({{ $reservation->id }})"
                                class="btn btn-raised btn-danger btn-sm" href="{{ route('delete', $reservation->id) }}"><i
                                    class="bi bi-trash-fill"></i></button>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="row"> {{ $reservations->links() }}</div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmAndSubmit(id) {
            if (confirm('Are you sure to delete this data?')) {
                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();
            } else {
                event.preventDefault();
            }
        }
    </script>
@endsection
