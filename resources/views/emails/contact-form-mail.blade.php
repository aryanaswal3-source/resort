<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:30px 0;">
        <tr>
            <td align="center">



                <table width="600" cellpadding="0" cellspacing="0"
                    style="background-color:#ffffff; border-radius:8px; overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background-color:#24416B; padding:25px 30px;">
                            <h2 style="color:#ffffff; margin:0; font-family: Georgia, serif;">
                                Sunset Vista Resort
                            </h2>
                            <p style="color:#cc8c18; margin:5px 0 0; font-size:13px; letter-spacing:1px;">
                                NEW CONTACT FORM SUBMISSION
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px;">

                            <p style="color:#555; font-size:14px; margin-bottom:20px;">
                                You have received a new message from your website contact form.
                            </p>

                            <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;">
                                <tr>
                                    <td
                                        style="width:130px; color:#24416B; font-weight:bold; font-size:14px; vertical-align:top;">
                                        Name</td>
                                    <td style="color:#333; font-size:14px;">{{ $formData['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#24416B; font-weight:bold; font-size:14px; vertical-align:top;">
                                        Email</td>
                                    <td style="color:#333; font-size:14px;">{{ $formData['email'] }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#24416B; font-weight:bold; font-size:14px; vertical-align:top;">
                                        Phone</td>
                                    <td style="color:#333; font-size:14px;">{{ $formData['phone'] }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#24416B; font-weight:bold; font-size:14px; vertical-align:top;">
                                        Subject</td>
                                    <td style="color:#333; font-size:14px;">{{ $formData['subject'] }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#24416B; font-weight:bold; font-size:14px; vertical-align:top;">
                                        Message</td>
                                    <td style="color:#333; font-size:14px; line-height:1.6;">{{ $formData['message'] }}
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f8f8f8; padding:18px 30px; text-align:center;">
                            <p style="color:#999; font-size:12px; margin:0;">
                                This email was sent automatically from the Sunset Vista Resort website contact form.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
