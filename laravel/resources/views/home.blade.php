@extends('layouts.main')
@section('content')
    <div class="bg-image" aria-label="Hotel image as a background">
        <div class="container d-flex align-items-center justify-content-center vh-100">
            <div>
                <div class="row">
                    <h1 class="col-12 mb-5 text-center"> Wander Hotel </h1>
                </div>

                <form action="{{ route('checkroom') }}" method="GET">
                    @csrf
                    <div class="row d-flex align-items-center ">
                        <div class="col-12 col-md-4 ">
                            <div class="datepicker-toggle">
                                <span class="datepicker-toggle-button"></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <label class="labelfont">From:</label>
                                <input type="date" class="datepicker-input" name="startdate">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="datepicker-toggle">
                                <span class="datepicker-toggle-button"></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <label class="labelfont">To:</label>
                                <input type="date" class="datepicker-input" name="enddate">
                            </div>
                        </div>
                        <div class="col-12 col-md-4 pt-4">
                            <button class="btn btn-dark" type="submit" id="checkavailability">Check availability</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
