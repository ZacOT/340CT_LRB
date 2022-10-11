@include('header')

<title>Login @yield('title')</title>


<body>
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css"> 
    
    <br><br>

    <h1 style="text-align:center;">Login Page</h1>
    @if (session('status'))
        <p style="text-align:center;">{{ session('status') }}</p>
    @endif
    <div class="container">
        <!--Login Form-->
        <div>
            <form action="{{ route('login') }}" method="post" class="form-group"> 
                @csrf
                    <input type="text" name="username" placeholder="Username" id="username" required\>
                    @error('username')
                    <div class="error">
                        {{ $message }}
                    </div>
                    @enderror
                    <br>
                    <input type="text" name="password" placeholder="Password" id="password" required\>
                    @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                     @enderror
                     <br>
                    <button type="submit" name="login_submit" class='registerbtn'>Login</button><br><br>

                    <a href="register">Sign Up here</a>
            </form>
        </div>
    </div>
</body>
@include('footer')
