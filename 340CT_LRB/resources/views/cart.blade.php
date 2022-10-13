<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart UI</title>
    <link rel="stylesheet" href="<?php echo asset('css/cart.css')?>" type="text/css"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
</head>

<body>
   <div class='CartContainer'>
   	   <div class='Header'>
   	   	<h3 class='Heading'>Shopping Cart</h3>
		<a href="/">Back To Home</a>
   	   	<!-- <h5 class='Action'>Remove all</h5> -->
   	   </div>


		@php $grandTotal = 0; @endphp
		@php $subTotal = 0; @endphp
		@php $totalQuantity = 0; @endphp
		@php $shippingFee = 0; @endphp

		@foreach($carts as $cart)
			@php $books = DB::table('books')->where('ISBN_13', $cart->ISBN_13)->first(); @endphp
			@if($username = Auth::user()->username)

				@if($cart->username === $username)
					<?php $curisbn = $cart->ISBN_13; ?>
				<div class='Cart-Items'>
					<div class='image-box'>
							<img src="images/{{ $books->book_cover_img }}" height='175' width='125'/>
					</div>
					<div class='about'>
							<h1 class='title'>{{ $books->book_title }}</h1>
							<h3 class='subtitle'>{{ $books->book_description }}</h3>
							<br><br><br><br><br>
							<h3 class='subtitle'>Unit Price: {{ $books->retail_price }} $</h3>
					</div>

					<div class='counter'>

						<!-- Decrease Button -->
						@if($cart->book_quantity > 1)
						<form action = {{route("updateCart")}} method ='post' class='form-group' enctype='multipart/form-data'>
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
						<input type="hidden" class="form-control" name="username" value="{{Auth::user()->username}}">
                    	<input type="hidden" class="form-control" name="ISBN_13" value="{{$books->ISBN_13}}">
                    	<input type="hidden" class="form-control" name="book_quantity" value="{{ $cart->book_quantity }}">
						<input type="hidden" class="form-control" name="quantity" value=-1>
						<button type="submit">-</button>
						</form>
						@else
						<button type="submit" disabled>-</button>
						@endif


						<div class='count'>{{ $cart->book_quantity }}</div>

						@if($cart->book_quantity < $books->book_stock)
						<form action = {{route("updateCart")}} method ='post' class='form-group' enctype='multipart/form-data'>
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
						<input type="hidden" class="form-control" name="username" value="{{Auth::user()->username}}">
                    	<input type="hidden" class="form-control" name="ISBN_13" value="{{$books->ISBN_13}}">
                    	<input type="hidden" class="form-control" name="book_quantity" value="{{ $cart->book_quantity }}">
                    	<input type="hidden" class="form-control" name="quantity" value=1>
						<button type="submit">+</button>
						</form>
						@else
						<button type="submit" disabled>-</button>
						@endif
					</div>
					<div class='prices'>
						<!-- Display Unit Price -->
						
						@php $bookTotal = $cart->book_quantity * $books->retail_price; @endphp
							<div class='amount'>@php echo "$bookTotal"; @endphp $</div>
							<br/><br/><br/><br/><br/>
							<form action = "{{route('deleteCart')}}" method='GET' class='form-group' action='/' enctype='multipart/form-data'>
							<input type = 'hidden' name = '_token' value = '<?php echo csrf_token(); ?>'>
							<input type="hidden" class="form-control" name="username" value="{{Auth::user()->username}}">
							<input type ='hidden' name ='delete_isbn13' value="{{ $books->ISBN_13 }}">
							
							<button type='submit'>Remove</button>
							</form>
					</div>
				</div>

				@php $subTotal += $bookTotal; @endphp
				@php $totalQuantity += $cart->book_quantity; @endphp
 
				@endif
			@endif

		@endforeach

		@php $shippingFee += 3 + (($totalQuantity - 1) * 1); @endphp
		@php $grandTotal = $subTotal + $shippingFee; @endphp
    
	<hr>
	<br><br>

	<div class='checkout'>
	<div class='total'>
	<div>
		<div class='Subtotal'>Sub-Total</div>

		<?php 
		Session::put('totalPrice', $subTotal);
		Session::put('totalQuantity', $totalQuantity);
		?>

	</div>
	<div class='total-amount'>@php echo "$subTotal"; @endphp $</div>
	</div>

	<br>
	<div class='items'>@php echo "$totalQuantity"; @endphp items</div>
	<br>
	
	<a href="/order">
		<div><button class='button'>Checkout</button></div>
	</a>
</form>
</div>
</body>
</html>