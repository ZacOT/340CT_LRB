@include('header')

<link rel="stylesheet" href="<?php echo asset('css/addBook.css')?>" type="text/css"> 
<title>Check Book @yield('title')</title>

<h1 style="text-align: center;">Check Books</h1>

@if($errors->any())

<center>
<h4 style="color:Tomato;">{{$errors->first()}}</h4>
</center>

@endif

<center>
<form action = "{{route('findBook')}}" method="GET" class="form-group" action="/addBook" enctype="multipart/form-data">

<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

<input type="text" class="form-control" placeholder="ISBN_13" name="find_isbn">

<button type="submit" name='submitted' value ="addbook" class='registerbtn'>Find Book</button>

</form>

</center>

<?php
if(isset($_GET["submitted"])){ ?>

@foreach($results as $find)
<?php 

if($find != NULL ){
  echo" <h4> $find->ISBN_13 </h4> ";
}else{
  echo"
  <h4> this is amazing</h4>
  ";
}

 ?>

@endforeach

<?php 
 }
?>

<br><br>

<!-- 
<h1 style="text-align: center;">Add New Books</h1>

<form action = "{{route('insertBook')}}" method = "post" class="form-group" action="/addBook" enctype="multipart/form-data">

<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

  <center>

  <input type="text" class="form-control" placeholder="Book Title" name="book_title">

  <p><input type="text" class="form-control" placeholder="Book Author" name="book_author"></p>

  <p><input type="date" id="start" name="publication_date" value="2020-01-01"
       min="2020-01-01" max="2022-12-31"></p>

  <input type="text" class="form-control" placeholder="ISBN_13" name="ISBN_13">

  <input type="text" class="form-control" placeholder="Description" name="book_description">

  <br><h3>Trade Price: </h3>
  <input type="range" min="1" max="100" value="50" class="slider" id="trade_price" name='trade_price'>
  <h3>Value: <span id="trade_msg"></span></h3>

  <br><h3>Retail Price</h3>
  <input type="range" min="1" max="100" value="50" class="slider" id="retail_price" name='retail_price'>
  <h3>Value: <span id="retail_msg"></span></h3>

  <br><h3>Stock Quantity</h3>
  <input type="range" min="1" max="20" value="10" class="slider" id="book_stock" name='book_stock'>
  <h3>Value: <span id="stock_msg"></span></h3>

  <p><label for="img">Select image:</label>
  <input type="file" id="img" name="book_cover_img" accept="image/*"></p>

  <br><br>

  <button type="submit"  value = "add book" class='registerbtn'>Submit Add Book</button>

  <br><br>  <br><br>

</form> 

</center> -->

@include('footer')

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

  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';

  if(exist){
          alert(msg);
        }

</script>
