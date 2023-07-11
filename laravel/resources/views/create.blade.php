@extends('layouts.main')
@section('content')

    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif



        <h2 class="text-center">Book Room Page</h2>

        @if (session('weather'))
            <div class="alert alert-info" role="alert">
                {{ session('weather') }}
            </div>
        @endif

        <!-- Check weather form-->
        <form action="{{ route('checkweather') }}" method="GET">
            {{-- @csrf --}}
            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"-->
            <input type="text" id="city" name="city" class="form-control mb-1" placeholder="Enter city name">
            <button class="btn btn-dark my-3 " type="submit">Check Weather</button>


        </form>
        <form class="text-center border border-light p-5" action="{{ route('store') }}" method="POST"
            onsubmit="return validateForm()">

            {{ csrf_field() }}

            <!-- alert -->
            <div id="alerts"></div>
            <!-- room info -->

            <div class="card card-horiz mb-5 align-items-center mx-auto" style="width: 30rem;">
                <img src="{{ $room->img_url }}" class="card-img-top" alt="room photo of the id:{{ $room->id }}">
                <div class="card-body">
                    <h5 class="card-title">Room type: {{ $room->room_type }}</h5>
                    <p class="card-text">Capacity: {{ $room->capacity }}<br> Price per night: ${{ $room->price_per_night }}
                    </p>

                </div>
            </div>

            <!--Booking panel -->
            <div class="row mb-4">
                <div class="col-6">
                    <!-- hidden room id-->
                    <input type="hidden" id="hiddenroomid" name="roomid" value="{{ $room->id }}">
                    <!-- customer name -->
                    <input type="text" id="defaultRegisterFormName" class="form-control" name="customername"
                        placeholder="Customer name">
                </div>
                <div class="col-6">
                    <!--Number of people -->
                    <label for="numpeople">Choose number of people:</label>
                    <select name="numpeople" id="numpeople">
                        @for ($i = 1; $i <= $room->capacity; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>


                </div>
            </div>

            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email"
                placeholder="E-mail">

            <!--Check_in_date-->
            <input type="date" id="defaultRegisterInDate" class="form-control mb-4" name="checkindate"
                placeholder="Check in date">

            <!--Check_out_date-->
            <input type="date" id="defaultRegisterOutDate" class="form-control mb-4" name="checkoutdate"
                placeholder="Check out date" onchange="calculateTotal()">

            <!-- Hidden total price-->
            <input type="hidden" id="hiddenTotal" name="totalprice">
            <!-- Total -->
            <div class="row">
                <p id="subtotal"class="float-end mb-3 align-items-right"></p><br>
            </div>

            <!-- Add data button-->
            <button class="btn btn-dark my-4 btn-block" type="submit">Confirm</button>


        </form>


    </div>



@endsection

<script>
    function calculateTotal() {
        // get the dates and convert to miliseconds
        let checkInDate = new Date(document.getElementById('defaultRegisterInDate').value);
        let checkOutDate = new Date(document.getElementById('defaultRegisterOutDate').value);

        //calculate the difference in miliseconds
        let difference = checkOutDate - checkInDate;

        let days = difference / (1000 * 60 * 60 * 24);
        let pricePerNight = {{ $room->price_per_night }};
        let subtotal = days * pricePerNight;

        let gst = subtotal * 0.05;
        let qst = subtotal * 0.0975;
        let total = subtotal + gst + qst;

        document.getElementById('hiddenTotal').value = total;
        document.getElementById('subtotal').innerHTML = 'SubTotal: $' + subtotal + "<br>GST: $" + gst + "<br>QST: $" +
            qst + "<br>Total: $" + total;
    }

    function validateForm() {
        var customername = document.forms[0]["customername"].value;
        var numpeople = document.forms[0]["numpeople"].value;
        var email = document.forms[0]["email"].value;
        var checkindate = document.forms[0]["checkindate"].value;
        var checkoutdate = document.forms[0]["checkoutdate"].value;

        // Get alerts div
        var alerts = document.getElementById("alerts");

        // Clear previous alerts
        alerts.innerHTML = "";

        // Check if any field is empty
        if (customername == "" || numpeople == "" || email == "" || checkindate == "" || checkoutdate == "") {
            var alert = document.createElement("div");
            alert.className = "alert alert-danger";
            alert.textContent = "All fields must be filled out";
            alerts.appendChild(alert);
            return false;
        }

        // Check if email is valid
        var emailRegex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
        if (!emailRegex.test(email)) {
            var alert = document.createElement("div");
            alert.className = "alert alert-danger";
            alert.textContent = "Email is not valid";
            alerts.appendChild(alert);
            return false;
        }

        // Check if dates are valid
        if (Date.parse(checkindate) >= Date.parse(checkoutdate)) {
            var alert = document.createElement("div");
            alert.className = "alert alert-danger";
            alert.textContent = "Check-out date must be after check-in date";
            alerts.appendChild(alert);
            return false;
        }

        // If everything is valid, allow form to be submitted
        return true;


    }
</script>
