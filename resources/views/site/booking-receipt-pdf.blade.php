<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Booking Receipt</title>

    <style>
        @page {
            margin: 20px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            background: #d89b32;
            color: #fff;
            padding: 15px;
        }

        .header table,
        .info,
        .stay,
        .price {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 7px;
        }

        .section {
            color: #b87912;
            font-size: 14px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            padding: 10px 0 5px;
        }

        .stay th {
            background: #f8f1e5;
        }

        .stay th,
        .stay td {
            border: 1px solid #ddd;
        }

        .price {
            width: 45%;
            margin-left: auto;
        }

        .total {
            background: #fff4dc;
            font-size: 15px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            border-top: 1px solid #ddd;
            margin-top: 20px;
            padding-top: 10px;
            font-size: 10px;
            color: #777;
        }

        .page {
            page-break-inside: avoid;
        }

        .next-page {
            page-break-after: always;
        }
    </style>
</head>

<body>

    @foreach ($bookings as $booking)
        @php
            $nights = $booking->check_in_date->diffInDays($booking->check_out_date);
            $subtotal = $booking->price * $nights;
        @endphp

        <div class="page">

            {{-- Header --}}
            <div class="header">

                <table>
                    <tr>
                        <td width="65%">
                            <strong style="font-size:20px;">
                                Sunset Vista Resort
                            </strong>

                            <br>

                            Luxury Hospitality • Dehradun
                        </td>

                        <td width="35%" align="right">
                            <strong style="font-size:16px;">
                                BOOKING RECEIPT
                            </strong>

                            <br>

                            Booking #{{ $booking->id }}
                        </td>
                    </tr>
                </table>

            </div>


            {{-- Booking Info --}}
            <table class="info">

                <tr>
                    <td>
                        <small>Booking Date</small><br>
                        <strong>
                            {{ $booking->created_at->format('d M Y') }}
                        </strong>
                    </td>

                    <td align="right">
                        <small>Status</small><br>

                        <strong>
                            {{ strtoupper($booking->status) }}
                        </strong>
                    </td>
                </tr>

            </table>


            {{-- Customer --}}
            <div class="section">
                Customer Information
            </div>

            <table class="info">

                <tr>

                    <td>
                        <small>Name</small><br>
                        <strong>{{ $booking->name }}</strong>
                    </td>

                    <td>
                        <small>Email</small><br>
                        <strong>{{ $booking->email }}</strong>
                    </td>

                    <td>
                        <small>Phone</small><br>
                        <strong>{{ $booking->phone }}</strong>
                    </td>

                </tr>

            </table>


            {{-- Stay --}}
            <div class="section">
                Stay Details
            </div>

            <table class="stay">

                <tr>
                    <th>Room</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Guests</th>
                    <th>Nights</th>
                </tr>

                <tr>

                    <td>
                        {{ $booking->service->title ?? 'Room Booking' }}
                    </td>

                    <td>
                        {{ $booking->check_in_date->format('d M Y') }}
                    </td>

                    <td>
                        {{ $booking->check_out_date->format('d M Y') }}
                    </td>

                    <td>
                        {{ $booking->adults }} Adults<br>
                        {{ $booking->children }} Children
                    </td>

                    <td>
                        {{ $nights }}
                    </td>

                </tr>

            </table>


            {{-- Payment --}}
            <div class="section">
                Payment Summary
            </div>

            <table class="price">

                <tr>
                    <td>Room Price</td>
                    <td align="right">
                        ₹{{ number_format($booking->price, 2) }}
                    </td>
                </tr>

                <tr>
                    <td>Room × {{ $nights }} Nights</td>
                    <td align="right">
                        ₹{{ number_format($subtotal, 2) }}
                    </td>
                </tr>

                <tr>
                    <td>GST (18%)</td>
                    <td align="right">
                        ₹{{ number_format($booking->gst_amount, 2) }}
                    </td>
                </tr>

                <tr class="total">

                    <td>
                        Grand Total
                    </td>

                    <td align="right">
                        ₹{{ number_format($booking->total_amount, 2) }}
                    </td>

                </tr>

            </table>


            {{-- Special Request --}}
            @if ($booking->message)
                <div class="section">
                    Special Request
                </div>

                <p>
                    {{ $booking->message }}
                </p>
            @endif


            {{-- Footer --}}
            <div class="footer">

                <strong>
                    Thank you for choosing Sunset Vista Resort!
                </strong>

                <br>

                This is a computer-generated booking receipt.

            </div>

        </div>

        @if (!$loop->last)
            <div class="next-page"></div>
        @endif
    @endforeach

</body>

</html>
