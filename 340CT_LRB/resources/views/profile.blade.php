 @include('header')

    <body>
        <br><br>
        <table style="border: 1px solid; width: fixed; margin-left: auto; margin-right: auto;">
        <tr>
            <th style="text-align: center;" colspan=2>Welcome, {{ Auth::user()->username }} to your profile page!</th>
        </tr>

        <tr>
            <td style="text-align: center;" width='500px' colspan=2><img src='/images/icon_profile.png'  height='65' width='65'></td>
        </tr>

        <tr>
            <td style="text-align: center;">Name: {{ Auth::user()->name }}</td>
        </tr>

        <tr>
            <td style="text-align: center;">Email: {{ Auth::user()->email }}</td>
        </tr>

        <tr>
            <td style="text-align: center;">Address: {{ Auth::user()->address }}</td>
        </tr>

        <tr>
            <td style='text-align: center;'><a href="{{ route('editAddress') }}"><button type='submit' class='button' name='change_email'>Update Address</button></a></td>";
        </tr>

        </table>

    </body>

    @include('footer')

</html>