<!DOCTYPE html>

<html lang="{{ App::getLocale() }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>

    <body style="margin:0; background: #F6F8FA;">
        <div style="padding: 0 0; font-family:arial,serif; line-height:30px; height:100%; width: 100%;">
            <div style="max-width: 700px; padding:50px 0; margin: 0 auto; font-size: 14px;">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                    <tr>
                        <td style="vertical-align: top; padding-bottom:30px;" align="center">
                            <a href="{{ route('home') }}" target="_blank">
                                <img src="{{ img_asset('logo', 'png') }}" alt="..." style="border:none;" height="45px"><br/>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                    <tr>
                        <td style="background:#4c84ff; padding:20px; color:#fff; text-align:center;">
                            <strong>
                                @yield('head')
                            </strong>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div style="padding: 40px; background: #fff;">
                    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                        <tbody>
                        @yield('body')
                        <tr>
                            <td style="text-align: right">
                                <strong>Merci</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
                    <p>&copy; 2019 {{ config('app.name') }}, @lang('general.right').</p>
                </div>
            </div>
        </div>
    </body>
</html>
