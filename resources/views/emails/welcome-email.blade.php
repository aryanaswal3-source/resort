<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome to Sunset Vista Resort</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:30px 0;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background-color:#ffffff; border-radius:8px; overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background-color:#24416B; padding:35px 30px; text-align:center;">
                            <h1 style="color:#ffffff; margin:0; font-family: Georgia, serif; font-size:28px;">
                                Sunset Vista Resort
                            </h1>
                            <p style="color:#cc8c18; margin:8px 0 0; font-size:13px; letter-spacing:2px;">
                                RELAX • UNWIND • ENJOY
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:40px 30px;">

                            <h2 style="color:#24416B; font-family: Georgia, serif; margin-top:0;">
                                Welcome, {{ $userName }}! 🎉
                            </h2>

                            <p style="color:#555; font-size:15px; line-height:1.7;">
                                Thank you for creating an account with Sunset Vista Resort. We're thrilled to have you
                                join us!
                            </p>

                            <p style="color:#555; font-size:15px; line-height:1.7;">
                                You can now browse our rooms, explore our services, and book your perfect getaway with
                                just a few clicks.
                            </p>

                            <div style="text-align:center; margin:35px 0;">
                                <a href="{{ url('/') }}"
                                    style="background-color:#cc8c18; color:#ffffff; text-decoration:none; padding:14px 32px; border-radius:50px; font-weight:bold; font-size:14px; display:inline-block;">
                                    Explore Our Resort
                                </a>
                            </div>

                            <p style="color:#999; font-size:13px; line-height:1.6;">
                                If you have any questions, feel free to reach out to our support team anytime.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
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
