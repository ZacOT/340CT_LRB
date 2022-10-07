<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="<?php echo asset('css/homepage.css')?>" type="text/css"> 
<link rel="icon" href="{!! asset('images/book_logo.png') !!}"/>

<head>
    <!-- Header -->

    <div class="wrapper row1">
        <p style="text-align: center;"> &nbsp;&nbsp;&nbsp;&nbsp; Spend more and save more! With the new launch event under the New Back To School Promotion!</p>
    </div>

    <table border='0' width="100%"><tr><td width="80%" style="padding-left: 20%;">

    <center>
        <header id="header" class="clear">
            <table border="0" width="876px">
                <tr>
                    <td align="center">
                        <a href="/"><img src='images/book_logo.png' height='80' width='80'></a>
                    </td>

                    <td>
                        <h1>Online Book Store </h1>
                    </td>

                    <?php 
                        if(Auth::user() != NULL){
                            $role = Auth::user()->role;
                            if($role == 1){ ?>
                                
                                <td  align='center'>
                                <p><b>Total Price: {{ Session::get('totalPrice') }} $
                                </b></p>
                                </td>

                                <td align='center'>
                                <a href='cart'><img src='images/cart_logo.png' height='40' width='40'></a> &nbsp;
                                <span class='badge badge-warning' id='lblCartCount'> {{ Session::get('totalQuantity') }} </span>
                                </td>
                                <?php
                                }
                            }
                            ?>
                </tr>
            </table>

</td>
<td>
                <?php 

                    if(Auth::user()){
                    $username = Auth::user()->username;

                    echo" 
                    <center>
                    <h3> Welcome Back, $username
                    <a href='profile'><img src='images/icon_profile.png'></a>
                    </center>
                    ";}
                    ?> 

                </td></tr></table>


        </header>

        <center>
        <div class="wrapper row1">
            <header id="header1" class="clear" >
                 <div id="hgroup">
                <nav>
                        
                        <ul>
                        <?php 
                        if(Auth::user() != NULL){
                            $role = Auth::user()->role;
                            if($role == 0){
                                echo" <li><a href='/'>Stock Level</a></li> "; 
                                echo" <li><a href='addBook'>Add Stock</a></li> "; 
                                echo" <li><a href='orderlist'>Order List</a></li> "; 

                            }else{
                                echo" <li><a href='/'>Home</a></li> ";
                            }
                        }else{
                                echo" <li><a href='/'>Home</a></li> ";
                            }
                        ?>

                        <?php 
                        if(Auth::user() != NULL){
                            $role = Auth::user()->role;
                            if($role == 1){
                                echo" <li><a href='/orderhistory'>Purchase History</a></li> "; }
                            }
                        ?>

                        <?php 
                        if(Auth::user() != NULL){
                            $role = Auth::user()->role;
                            if($role == 0){
                                echo" <li><a href='admin'>Admin Page</a></li> "; }
                            }
                        ?>

                        
                        <?php 
                        if(Auth::user() == NULL){
                        echo"  <li><a href='register'>Register</a></li>";
                        echo" <li><a href='login'>Login</a></li> "; }
                        ?>

                        <?php 
                        if(Auth::user() != NULL){
                        echo" <li class='last'><a href='logout'>Logout</a></li> ";}
                     
                        ?>

                        </ul>
                </nav>
              </div>
            </header>
        </div>
        </td>

        <td>        
</center>
</head>