@extends('layouts.main')
@section('content')
    <div class="titlebox">
        <h2 class="text-center my-auto">Available Rooms</h2>
    </div>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($rooms as $room)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Room image-->
                            <img class="card-img-top" src="{{ $room->img_url }}" alt="photo_of_room_{{ $room->id }}" />
                            <!-- Room details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Room type-->
                                    <h5 class="fw-bolder">{{ $room->room_type }}</h5>
                                    <!-- Product price-->
                                    {{ $room->price_per_night }}
                                    <div>Capacity: {{ $room->capacity }} people</div>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('create', $room->id) }}">BOOK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
