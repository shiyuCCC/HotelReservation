@extends('layouts.main')
@section('content')
    <div class="bg-image">
        <div class="container d-flex align-items-center justify-content-center vh-100">
            <div>
                <div class="row">
                    <h1 class="col-6 mx-auto mb-5"> Wander Hotel </h1>
                </div>

                <form>
                    <div class="row">
                        <div class="col-3 ">
                            <div class="datepicker-toggle">
                                <span class="datepicker-toggle-button"></span>
                            </div>
                            <label>From: </label>
                            <input type="date" class="datepicker-input" name="startdate">
                        </div>
                        <div class="col-3 ">
                            <div class="datepicker-toggle">
                                <span class="datepicker-toggle-button"></span>
                            </div>
                            <label>To: </label>
                            <input type="date" class="datepicker-input" name="enddate">
                        </div>
                        <div class="col-4 pt-3">
                            <button class="btn btn-dark" id="checkavailabilty">Check availibility</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
