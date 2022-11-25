@include('header')

<body>
    </br></br></br></br>
    <table style="width: 15%; border: 1px solid; margin-left: auto; margin-right: auto;">
    <form action="{{ route('updateAddress') }}" method="POST" id="updateAddress">
    @csrf
        <tr style="outline: thin"><th style="font-size: 20px;">UPDATE ADDRESS</th></tr>
        <tr><td><b></br></br>Current Address:</b></td></tr>
        <tr><td>{{ Auth::user()->address; }}</td></tr>
        <tr><td></br><b>New Address:</b></td></tr>
        <tr><td><input type="text" name='address' size="50"></input></td></tr>
        <tr><td style="color:red; text-align:center;">@error('address'){{ $message }}@enderror</td></tr>

        <tr><td style="text-align: right;"><button type='submit' class='button'>Update Address</button></td></tr>   
    </form>
    </table>
</body>

@include('footer')