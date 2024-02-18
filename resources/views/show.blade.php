@extends('layouts.app')

@section('content')
    @include('navbar')
    <link rel="stylesheet" href="{{ asset('/assets/css/show.css') }}">
    
    <div class="section">
        <div class="colu">
            <div class="text-center">
                Total
                <h4>{{ $ticket->total_quota }}</h4>
                <i class="fa-solid fa-caret-down fa-xl"></i>
            </div>
            <div class="vertical-progress">
                <div class="progress-bar" role="progressbar" style="height: {{ ($ticket->remaining_quota / $ticket->total_quota) * 100 }}%;" aria-valuenow="{{ $ticket->remaining_quota }}" aria-valuemin="0" aria-valuemax="{{ $ticket->total_quota }}">
                    {{ $ticket->remaining_quota }}
                </div>
            </div>
        </div>
        <div class="ctainer">
            <form method="post" action="{{ route('transactions.purchase') }}" id="purchaseForm">
                @csrf
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                
                <div class="tr-det">
                    <h2>{{ $ticket->name }}</h2>
                    <strong>
                        <span id="id">#{{ $ticket->id }}</span>
                    </strong>
                </div>

                <p class="card-text">
                    Museum Lampung Ticket
                    <br>
                    Remaining Quota <b>{{ $ticket->remaining_quota }}</b>
                </p>

                <div class="rowe">
                    <div class="cols">
                        <b>Anak-Anak</b>
                        <label for="quantity_anak_anak">Rp.{{ $ticket->price_anak_anak }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary" onclick="decrement('quantity_anak_anak')"><i class="fa-solid fa-minus"></i></button>
                            </div>
                            <input type="text" class="form-control" id="quantity_anak_anak" name="quantity_anak_anak" value="0" readonly>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" onclick="increment('quantity_anak_anak')"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
    
                    <div class="cols">
                        <b>Mahasiswa</b>
                        <label for="quantity_mahasiswa">Rp.{{ $ticket->price_mahasiswa }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary" onclick="decrement('quantity_mahasiswa')"><i class="fa-solid fa-minus"></i></button>
                            </div>
                            <input type="text" class="form-control" id="quantity_mahasiswa" name="quantity_mahasiswa" value="0" readonly>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" onclick="increment('quantity_mahasiswa')"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cols">
                        <b>Dewasa</b>
                        <label for="quantity_dewasa">Rp.{{ $ticket->price_dewasa }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary" onclick="decrement('quantity_dewasa')"><i class="fa-solid fa-minus"></i></button>
                            </div>
                            <input type="text" class="form-control" id="quantity_dewasa" name="quantity_dewasa" value="0" readonly>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" onclick="increment('quantity_dewasa')"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="bottom-group">
                    <div class="form-group">
                        <label for="booking_date">Tanggal Booking</label>
                        <input type="date" class="form-control @error('booking_date') is-invalid @enderror" id="booking_date" name="booking_date" value="{{ old('booking_date') }}">
                        @error('booking_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="total-group">
                        <label for="total_amount">Total Bayar</label>
                        <input type="hidden" class="form-control" id="total_amount" name="total_amount" value="Rp.0.00" readonly>
                        <h3 id="total_amount_display">Rp.0.00</h3>
                    </div>
                    
                </div>


                <div class="tr-btm">
                    <span class="d-block border border-dark border-2  my-3"></span>
                    <strong>
                        <button type="button" class="btn btnbuy" onclick="submitPurchaseForm()">Buy Now</button>
                    </strong>
                </div>
            </form>
        </div>
    </div>
    
    

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function submitPurchaseForm() {
            if (checkQuantityGreaterThanZero()) {
                updateHiddenInputs();

                document.getElementById('purchaseForm').submit();
            } else {
                alert("Please select at least one quantity before proceeding to Buy Now.");
            }
        }

        function checkQuantityGreaterThanZero() {
            var quantityAnakAnak = parseInt(document.getElementById('quantity_anak_anak').value);
            var quantityMahasiswa = parseInt(document.getElementById('quantity_mahasiswa').value);
            var quantityDewasa = parseInt(document.getElementById('quantity_dewasa').value);
            var bookingDate = document.getElementById('booking_date').value;
            
            return quantityAnakAnak > 0 || quantityMahasiswa > 0 || quantityDewasa > 0 || bookingDate !== '';
        }

        function updateHiddenInputs() {
            var quantityAnakAnak = parseInt(document.getElementById('quantity_anak_anak').value);
            var quantityMahasiswa = parseInt(document.getElementById('quantity_mahasiswa').value);
            var quantityDewasa = parseInt(document.getElementById('quantity_dewasa').value);

            document.getElementById('quantity_anak_anak').value = quantityAnakAnak;
            document.getElementById('quantity_mahasiswa').value = quantityMahasiswa;
            document.getElementById('quantity_dewasa').value = quantityDewasa;
        }

        function increment(inputId) {
            var inputElement = document.getElementById(inputId);
            inputElement.value = parseInt(inputElement.value) + 1;
            updateTotalAmount();
        }

        function decrement(inputId) {
            var inputElement = document.getElementById(inputId);
            if (parseInt(inputElement.value) > 0) {
                inputElement.value = parseInt(inputElement.value) - 1;
                updateTotalAmount();
            }
        }

        function updateTotalAmount() {
            var quantityAnakAnak = parseInt(document.getElementById('quantity_anak_anak').value);
            var quantityMahasiswa = parseInt(document.getElementById('quantity_mahasiswa').value);
            var quantityDewasa = parseInt(document.getElementById('quantity_dewasa').value);

            var priceAnakAnak = parseFloat("{{ $ticket->price_anak_anak }}");
            var priceMahasiswa = parseFloat("{{ $ticket->price_mahasiswa }}");
            var priceDewasa = parseFloat("{{ $ticket->price_dewasa }}");

            $.ajax({
                url: "{{ route('ticket.calculateTotalAmount') }}",
                type: "POST",
                data: {
                    quantity_anak_anak: quantityAnakAnak,
                    quantity_mahasiswa: quantityMahasiswa,
                    quantity_dewasa: quantityDewasa,
                    price_anak_anak: priceAnakAnak,
                    price_mahasiswa: priceMahasiswa,
                    price_dewasa: priceDewasa,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    var formattedTotalAmount = "Rp." + response.totalAmount;
                    document.getElementById('quantity_anak_anak').value = quantityAnakAnak;
                    document.getElementById('quantity_mahasiswa').value = quantityMahasiswa;
                    document.getElementById('quantity_dewasa').value = quantityDewasa;             
                    document.getElementById('total_amount').value = formattedTotalAmount;
                    document.getElementById('total_amount_display').innerText = formattedTotalAmount;
                    
                    sessionStorage.setItem('totalAmount', response.totalAmount);
                    
                    console.log("Buy Now clicked! Data to be submitted:", {
                        quantity_anak_anak: quantityAnakAnak,
                        quantity_mahasiswa: quantityMahasiswa,
                        quantity_dewasa: quantityDewasa,
                        total_amount: response.totalAmount,
                    });
                    
                }
            });
        }
    </script>
@endsection
    