<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Received</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:30px 0;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden;">

                    <tr>
                        <td style="background-color:#24416B; padding:30px; text-align:center;">
                            <h1 style="color:#ffffff; margin:0; font-family: Georgia, serif; font-size:24px;">
                                Sunset Vista Resort
                            </h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:35px 30px;">
                            <h2 style="color:#24416B; font-family: Georgia, serif; margin-top:0;">
                                Hi {{ $booking->name }},
                            </h2>

                            <p style="color:#555; font-size:15px; line-height:1.7;">
                                Thank you for your booking request! Here's a summary of your reservation:
                            </p>

                            <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse; margin:20px 0;">
                                <tr>
                                    <td style="width:140px; color:#24416B; font-weight:bold; font-size:14px;">Room</td>
                                    <td style="color:#333; font-size:14px;">{{ $booking->service->title ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#24416B; font-weight:bold; font-size:14px;">Check In</td>
                                    <td style="color:#333; font-size:14px;">{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#24416B; font-weight:bold; font-size:14px;">Check Out</td>
                                    <td style="color:#333; font-size:14px;">{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#24416B; font-weight:bold; font-size:14px;">Total Amount</td>
                                    <td style="color:#333; font-size:14px; font-weight:bold;">₹{{ number_format($booking->total_amount, 0) }}</td>
                                </tr>
                            </table>

                            <p style="color:#555; font-size:14px; line-height:1.7;">
                                Your booking status is currently <strong style="color:#cc8c18;">Pending</strong>. Our team will confirm it shortly and reach out to you.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="background-color:#f8f8f8; padding:18px 30px; text-align:center;">
                            <p style="color:#999; font-size:12px; margin:0;">
                                &copy; {{ date('Y') }} Sunset Vista Resort. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>