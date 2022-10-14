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
   	   	<h3 class='Heading'>View Order History</h3>
		<a href="/orderhistory">Back to Order History</a>
   	   </div>


		@php $grandTotal = 0; @endphp
		@php $totalQuantity = 0; @endphp

		@foreach($orders as $order)

            @foreach($orderitems->where('order_id', $order->order_id) as $orderitem)

                @php 
                    $curisbn = $orderitem->ISBN_13; 
                    $curqty = $orderitem->orderitem_quantity;
                @endphp

                @foreach($books->where('ISBN_13', $curisbn) as $book)

                    @if($username = Auth::user()->username)
                        <div class='Cart-Items'>
                            <div class='image-box'>
                                    <img src="images/{{ $book->book_cover_img }}" height='175' width='125'/>
                            </div>
                            <div class='about'>
                                    <h1 class='title'>{{ $book->book_title }}</h1>
                                    <h3 class='subtitle'>{{ $book->book_description }}</h3>
                            </div>
                            <div class='counter'>
                                    <div class='count'>{{ $curqty }}</div>
                            </div>
                        </div>
                        
                        @php $totalQuantity += $curqty; @endphp
                    @endif
            
                @endforeach
			@endforeach
        @endforeach
	<hr>
	<br><br>

	<div class='checkout'>
	<div class='total'>
			<div>
				<div class='Subtotal'>Sub-Total</div>
				<div class='items'>@php echo "$totalQuantity"; @endphp items</div>
			</div>
            @php $subTotal = $order->subtotal; @endphp
		<div class='total-amount'>@php echo "$subTotal"; @endphp</div>
	
	</div>
</body>
</html> 