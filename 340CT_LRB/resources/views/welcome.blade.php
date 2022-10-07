@include('header')

<title>Homepage @yield('title')</title>

<html>
<!-- Content Section -->

<h1 style="text-align: center;">Books</h1>
<br />

<!-- <div class="wrapper-bookrow"> -->
<?php $counter = 0; ?>
<div class='wrapper-bookrow'>

    @foreach($books as $book)

    <div class='wrapper-book'>
        <center>
            <img src=images/{{$book->book_cover_img}} height='250' width='150'></a>
            <h4> {{ $book->book_title }} </h4>

            <?php
            if (Auth::user()) {
                $role = Auth::user()->role;

                if ($role == 1) {
                    if ($book->book_stock > 0) {
                        echo " <h4>Retail Price: $book->retail_price $ </h4> "; ?>

                        <form action={{route("insertCart")}} method='post' class='form-group' enctype='multipart/form-data' align='center'>
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                            <input type="hidden" class="form-control" name="username" value="{{Auth::user()->username}}">
                            <input type="hidden" class="form-control" name="ISBN_13" value="{{$book->ISBN_13}}">
                            <input type="hidden" class="form-control" name="book_quantity" value=1>

                            <button type="submit">Add To Cart</button>
                        </form>
                    <?php } else {
                        echo " <h4>Retail Price: $book->retail_price $ </h4> ";
                        echo "<button type='submit' disabled>Out of Stock</button>";
                    } ?>
                <?php
                }


                if ($role == 0) {
                    echo " <h4>ISBN_13: $book->ISBN_13 </h4> ";
                    echo " <h4>Stock Quantity: $book->book_stock </h4> ";
                ?>

                    <form action="{{route('deleteBook')}}" method='GET' class='form-group' action='/' enctype='multipart/form-data'>
                        <input type='hidden' name='_token' value='<?php echo csrf_token(); ?>'>
                        <input type='hidden' name='delete_isbn13' value="{{ $book->ISBN_13 }}">

                <?php echo "
                        <button type='submit'>Delete Book</button>
                        </form>
                        <br />
                      ";
                }
            }



                ?>

        </center>
    </div>
    <?php

    $counter++; ?>
    @endforeach
</div>



<!-- </div> -->

</html>

@include('footer')

<script>
    var msg = '{{Session::get('
    alert ')}}';
    var exist = '{{Session::has('
    alert ')}}';
    if (exist) {
        alert(msg);
    }
</script>