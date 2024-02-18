@extends('layouts.app')

@section('content')
<style>
     .ticket-wrap {
	text-align: center;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.ticket {
	display: inline-block;
	margin: 0 auto;
	border: 2px solid #9facbc;
	font-feature-settings: "kern" 1;
	background: #fff;
}

.ticket__header {
	margin: 0;
	padding: 1.5em;
	background: #f4f5f6;
}

.ticket__co span,
.ticket__route span {
	display: block;
}

.ticket__co {
	display: inline-block;
	position: relative;
	padding-left: 5em;
	line-height: 1;
	color: #5e7186;
}

.ticket__co-icon {
	position: absolute;
	top: 50%;
	margin-top: -2em;
	left: 0;
	width: 4em;
	height: auto;
}

.ticket__co-name {
	font-size: 2rem;
	font-variation-settings: "wght" 500, "wdth" 75;
	letter-spacing: -.01em;
}
.ticket__co-name a{
    text-decoration: none;
    color: #1e2126;
}

.ticket__co-subname {
	font-variation-settings: "wght" 700;
	color: #506072;
}

.ticket__body {
	padding: 2rem 1.25em 1.25em;
}

.ticket__route {
	font-variation-settings: "wght" 300;
	font-size: 2em;
	line-height: 1.1;
}

.ticket__description {
	margin-top: .5em;
	font-variation-settings: "wght" 350;
	font-size: 1.125em;
	color: #506072;
    text-align: start;
}
.ticket__usn {
	margin-top: .5em;
	font-variation-settings: "wght" 350;
	font-size: 1.125em;
	color: #506072;
}

.ticket__timing {
	display: flex;
	align-items: center;
	margin-top: 1rem;
	padding: 1rem 0;
	border-top: 2px solid #9facbc;
	border-bottom: 2px solid #9facbc;
	text-align: left;
}

.ticket__timing p {
	margin: 0 1rem 0 0;
	padding-right: 1rem;
	border-right: 2px solid #9facbc;
	line-height: 1;
}

.ticket__timing p:last-child {
	margin: 0;
	padding: 0;
	border-right: 0;
}

.ticket__small-label {
	display: block;
	margin-bottom: .5em;
	font-variation-settings: "wght" 300;
	font-size: .875em;
	color: #506072;
}

.ticket__detail {
	font-variation-settings: "wght" 700;
	font-size: 1.25em;
	color: #424f5e;
}

.ticket__admit {
	margin-top: 2rem;
	font-size: 2.5em;
	font-variation-settings: "wght" 700, "wdth" 85;
	line-height: 1;
	color: #657990;
}

.ticket__fine-print {
	margin-top: 1rem;
	font-variation-settings: "wdth" 75;
	color: #666;
}

.ticket__barcode {
	margin-top: 1.25em;
	width: 299px;
	max-width: 100%;
}

@media (min-width: 36em) {
	.ticket-wrap {
		margin-bottom: 4em;
		text-align: center;
	}

	.ticket {
		margin: 0 auto;
		transform: rotate(6deg);
	}

	.ticket__header {
		margin: 0;
		padding: 2em;
	}

	.ticket__body {
		padding: 3rem 2em 2em;
	}

	.ticket__detail {
		font-size: 1.75em;
	}

	.ticket__admit {
		margin-top: 2rem;
	}
}

@supports (display: grid) {
	@media (min-width: 72em) {
		.ticket-info,
		.ticket-wrap {
			align-self: center;
		}

		.ticket-wrap {
			order: 2;
			margin-bottom: 0;
		}

		.ticket-info {
			order: 1;
		}
	}
}
</style>
    <div class="l-col-right ticket-wrap" aria-label="A fake boat ticket demonstrating mixing font weights and widths">
        <div class="ticket" aria-hidden="true">
            <div class="ticket__header">
                <div class="ticket__co">
                    <img class="ticket__co-icon" src="{{ asset('/assets/images/siger.png') }}" alt="">
                    <span class="ticket__co-name"><a href="{{ url('/') }}">Museum Lampung</a></span>
                    <span class="u-upper ticket__co-subname">Tradisional Museum</span>
                </div>
            </div>
            <div class="ticket__body">
                @if ($transaction->quantity_anak_anak > 0 || $transaction->quantity_mahasiswa > 0 || $transaction->quantity_dewasa > 0)
                    <p class="ticket__route">{{ $transaction->ticket->name }}</p>
                    <p class="ticket__usn"><strong>Pengunjung :</strong> {{ $transaction->user->name }}</p>
                    <p class="ticket__description">A four-hour tour of the Strait of Garamond</p>
                    @if ($transaction->quantity_anak_anak > 0)
                        <p class="ticket__description">
                            <strong>Anak-Anak :</strong> {{ $transaction->quantity_anak_anak }}
                        </p>
                    @endif

                    @if ($transaction->quantity_mahasiswa > 0)
                        <p class="ticket__description">
                            <strong>Mahasiswa :</strong> {{ $transaction->quantity_mahasiswa }}
                        </p>
                    @endif

                    @if ($transaction->quantity_dewasa > 0)
                        <p class="ticket__description">
                            <strong>Dewasa :</strong> {{ $transaction->quantity_dewasa }}
                        </p>
                    @endif
                    <div class="ticket__timing">
                        <p>
                            <span class="u-upper ticket__small-label">Event Date</span>
                            <span class="ticket__detail">{{ \Carbon\Carbon::parse($transaction->ticket->event_date)->format('d F') }}</span>
                        </p>
                        <p>
                            <span class="u-upper ticket__small-label">Expiry Date</span>
                            <span class="ticket__detail">{{ \Carbon\Carbon::parse($transaction->ticket->expiry_date)->format('d F') }}</span>
                        </p>
                        <p>
                            <span class="u-upper ticket__small-label">Booking Date</span>
                            <span class="ticket__detail">{{ \Carbon\Carbon::parse($transaction->booking_date)->format('d F') }}</span>
                        </p>
                    </div>
                @else
                    <p>No tickets purchased</p>
                @endif
                <p class="ticket__fine-print">Tiket harus diserahkan ke kasir saat hari kunjungan</p>
                <p class="u-upper ticket__admit"><strong>Rp.{{ number_format($transaction->total_amount, 2) }}</strong></p>
                @if ($transaction->barcode)
                    <img src="data:image/png;base64,{{ $transaction->barcode }}" alt="Barcode" class="img-fluid">
                @else
                    <p>No barcode available</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var transactionId = {{ $transaction->id ?? 'null' }};
            var statusKey = 'pdf_download_' + transactionId;

            var downloadStatus = sessionStorage.getItem(statusKey);

            if (!downloadStatus) {
                window.location.href = '/download-pdf/' + transactionId;
                sessionStorage.setItem(statusKey, true);
            }
        });
    </script>
@endsection
