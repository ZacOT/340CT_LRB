@include('header')

<link rel="stylesheet" href="<?php echo asset('css/addBook.css')?>" type="text/css"> 

<title>Update Book @yield('title')</title>

@foreach($update as $book)

<h1 style="text-align: center;">Update Books</h1>

<form action = "{{route('updateBook')}}" method = "post" class="form-group" action="/addBook" enctype="multipart/form-data">

<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

<!-- Delete Existing image from the local machine -->
    <?php 
            $image_path = "images/$book->book_cover_img";  // Value is not URL but directory file path
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            
    ?>

  <center>

  @error('book_title')
    <div class="error">
        {{ $message }}
    </div>
  @enderror

  <input type="text" class="form-control" placeholder="Book Title" name="book_title" value=" {{ $book->book_title }} ">

  @error('book_description')
    <div class="error">
        {{ $message }}
    </div>
  @enderror

  <p><input type="text" class="form-control" placeholder="Book Author" name="book_author" value=" {{ $book->book_author }} "></p>

  <p><input type="date" id="start" name="publication_date" value="{{ $book->publication_date }}"
       min="2020-01-01" max="2022-12-31"></p>

  <input type="text" class="form-control" placeholder="ISBN_13" name="ISBN_13" value=" {{ $book->ISBN_13}} " readonly>
  
  @error('book_description')
    <div class="error">
        {{ $message }}
    </div>
  @enderror

  <input type="text" class="form-control" placeholder="Description" name="book_description" value=" {{ $book->book_description }} ">


  <br><h3>Trade Price: </h3>
  <input type="range" min="1" max="100" value="{{ $book->trade_price }}" class="slider" id="trade_price" name='trade_price'>
  <h3>Value: <span id="trade_msg"></span></h3>

  <br><h3>Retail Price</h3>
  <input type="range" min="1" max="100" value="{{ $book->retail_price }}" class="slider" id="retail_price" name='retail_price'>
  <h3>Value: <span id="retail_msg"></span></h3>

  <br><h3>Stock Quantity</h3>
  <input type="range" min="1" max="20" value="{{ $book->book_stock }}" class="slider" id="book_stock" name='book_stock'>
  <h3>Value: <span id="stock_msg"></span></h3>

  @error('book_cover_img')
    <div class="error">
        {{ $message }}
    </div>
  @enderror

  <br>

  <h3><label for="img">Update New image:</label>
  
  <input type="file" id="img" name="book_cover_img" accept="image/*" value="{{ $book->book_cover_img }}"></h3>

  <br><br>

  <button type="submit"  value = "add book" class='registerbtn'>Update Book</button>

  <br><br>  <br><br>

</form> 


@endforeach

<script>
var trade_slider = document.getElementById("trade_price");
var trade_output = document.getElementById("trade_msg");
trade_output.innerHTML = trade_price.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
trade_slider.oninput = function() {
  trade_output.innerHTML = this.value;
}

var retail_slider = document.getElementById("retail_price");
var retail_output = document.getElementById("retail_msg");
retail_output.innerHTML = retail_slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
retail_slider.oninput = function() {
  retail_output.innerHTML = this.value;
}

var stock_slider = document.getElementById("book_stock");
var stock_output = document.getElementById("stock_msg");
stock_output.innerHTML = stock_slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
stock_slider.oninput = function() {
  stock_output.innerHTML = this.value;
}
</script>

@include('footer')
