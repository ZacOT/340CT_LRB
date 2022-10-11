<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="<?php echo asset('css/register.css')?>" type="text/css"> 
      
    <!-- Header -->

    @include('header')

    <br/><br/>

    <!-- Content Section -->

    <h1 align='center'>Register</h1>

    <div class='container'>
        <form action = "{{route('insertUser')}}" method = "post" class="form-group" action="/register" enctype="multipart/form-data" align='center'>

            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

            <input type="text" class="form-control" placeholder="Username" name="username">

            @error('username')
                    <div class="error">
                        {{ $message }}
                    </div>
            @enderror

            <br>
            <input type="password" class="form-control" placeholder="Password" name="password">

            @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
            @enderror

            <br>
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">

            @error('password_confirmation')
                    <div class="error">
                        {{ $message }}
                    </div>
            @enderror

            <input type="hidden" class="form-control" name="role" value="1">

            <br>
            <input type="text" class="form-control" placeholder="Name" name="name">

            @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
            @enderror

            <br>
            <input type="text" class="form-control" placeholder="Email" name="email">

            @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
            @enderror

            <input type="hidden" class="form-control" name="role" value="1">

            <br>
            <input type="text" class="form-control" placeholder="Address" name="address">

            @error('address')
                    <div class="error">
                        {{ $message }}
                    </div>
            @enderror

            <p>By creating an account you agree to our <a href='#'>Terms & Privacy</a>.</p>
            <button type='submit' class='registerbtn'>Register</button>
        </div>

        <div class='container signin'>
            <p>Already have an account? <a href='login'>Sign in</a>.</p>
        </div>
            
        </form>
    </div>

    @include('footer')

</html>