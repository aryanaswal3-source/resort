<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>We Received Your Message</title>
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
                                Hi {{ $formData['name'] }},
                            </h2>

                            <p style="color:#555; font-size:15px; line-height:1.7;">
                                Thank you for reaching out to us. We've received your message and our team will get back to you within 24 hours.
                            </p>

                            <div style="background-color:#f9f9f9; border-left:4px solid #cc8c18; padding:15px 20px; margin:25px 0;">
                                <p style="margin:0; color:#555; font-size:14px;"><strong>Your message:</strong></p>
                                <p style="margin:8px 0 0; color:#777; font-size:14px; font-style:italic;">{{ $formData['message'] }}</p>
                            </div>

                            <p style="color:#999; font-size:13px;">
                                If your query is urgent, feel free to call us directly.
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