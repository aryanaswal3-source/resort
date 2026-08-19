<?php

namespace App\Services;

class EmailService
{
    public function buildEmailHtml(array $options): string
    {
        $centerHeader = $options['centerHeader'] ?? false;
        $headerPadding = $centerHeader ? '35px 30px' : '25px 30px';
        $headerAlign = $centerHeader ? 'center' : 'left';
        $headerFontSize = $centerHeader ? '28px' : '22px';

        $headerLabelHtml = '';
        if (isset($options['headerLabel'])) {
            $headerLabelHtml = '<p style="color:#cc8c18; margin:6px 0 0; font-size:13px; letter-spacing:1px;">'
                . e($options['headerLabel']) . '</p>';
        }

        $greetingHtml = '';
        if (isset($options['greeting'])) {
            $greetingHtml = '<h2 style="color:#24416B; font-family: Georgia, serif; margin-top:0;">'
                . e($options['greeting']) . '</h2>';
        }

        $paragraphsHtml = '';
        if (isset($options['paragraphs'])) {
            foreach ($options['paragraphs'] as $para) {
                $paragraphsHtml .= '<p style="color:#555; font-size:15px; line-height:1.7;">'
                    . e($para) . '</p>';
            }
        }

        $quoteHtml = '';
        if (isset($options['quoteLabel']) && isset($options['quoteText'])) {
            $quoteHtml = '
                <div style="background-color:#f9f9f9; border-left:4px solid #cc8c18; padding:15px 20px; margin:25px 0;">
                    <p style="margin:0; color:#555; font-size:14px;"><strong>' . e($options['quoteLabel']) . '</strong></p>
                    <p style="margin:8px 0 0; color:#777; font-size:14px; font-style:italic;">' . nl2br(e($options['quoteText'])) . '</p>
                </div>';
        }

        $rowsHtml = '';
        if (isset($options['rows'])) {
            $rowsHtml = '<table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse; margin:15px 0;">';
            foreach ($options['rows'] as $label => $value) {
                $rowsHtml .= '
                    <tr>
                        <td style="width:150px; color:#24416B; font-weight:bold; font-size:14px; vertical-align:top;">' . e($label) . '</td>
                        <td style="color:#333; font-size:14px; vertical-align:top;">' . $value . '</td>
                    </tr>';
            }
            $rowsHtml .= '</table>';
        }

        $statusNoteHtml = '';
        if (isset($options['statusNote'])) {
            $statusNoteHtml = '<p style="color:#555; font-size:14px; line-height:1.7; margin-top:20px;">'
                . $options['statusNote'] . '</p>';
        }

        $ctaHtml = '';
        if (isset($options['ctaText']) && isset($options['ctaUrl'])) {
            $ctaHtml = '
                <div style="text-align:center; margin:35px 0;">
                    <a href="' . e($options['ctaUrl']) . '" style="background-color:#cc8c18; color:#ffffff; text-decoration:none; padding:14px 32px; border-radius:50px; font-weight:bold; font-size:14px; display:inline-block;">
                        ' . e($options['ctaText']) . '
                    </a>
                </div>';
        }

        $closingNoteHtml = '';
        if (isset($options['closingNote'])) {
            $closingNoteHtml = '<p style="color:#999; font-size:13px; line-height:1.6; margin-top:20px;">'
                . e($options['closingNote']) . '</p>';
        }

        $year = date('Y');

        return <<<HTML
        <!DOCTYPE html>
        <html>
        <head><meta charset="utf-8"><title>Sunset Vista Resort</title></head>
        <body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, sans-serif;">
            <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:30px 0;">
                <tr>
                    <td align="center">
                        <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden;">

                            <tr>
                                <td style="background-color:#24416B; padding:{$headerPadding}; text-align:{$headerAlign};">
                                    <h1 style="color:#ffffff; margin:0; font-family: Georgia, serif; font-size:{$headerFontSize};">
                                        Sunset Vista Resort
                                    </h1>
                                    {$headerLabelHtml}
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:35px 30px;">
                                    {$greetingHtml}
                                    {$paragraphsHtml}
                                    {$quoteHtml}
                                    {$rowsHtml}
                                    {$statusNoteHtml}
                                    {$ctaHtml}
                                    {$closingNoteHtml}
                                </td>
                            </tr>

                            <tr>
                                <td style="background-color:#f8f8f8; padding:18px 30px; text-align:center;">
                                    <p style="color:#999; font-size:12px; margin:0;">
                                        &copy; {$year} Sunset Vista Resort. All rights reserved.
                                    </p>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        HTML;
    }
}