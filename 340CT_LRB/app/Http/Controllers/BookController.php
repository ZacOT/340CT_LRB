<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    public function printBook(){
        $books = DB::table('books')->get();
        return view('welcome',compact('books'));
    }

    public function printOne(){
        DB::table('books')->get(); 
        return view('welcome');
    }

    public function findBook(){
        $isbn_13 = $_GET['find_isbn'];

        $isbn_length = strlen($isbn_13);

        if(($isbn_length != 13) || (preg_match("/^\d+$/", $isbn_13) == 0)){
            return redirect('addBook')->withErrors(['msg' => 'Please Enter a valid ISBN_13, Only 13 Integer is allowed.']);;
        }

        if($isbn_length == 13){
        $results = DB::select('select * from books where ISBN_13 = ?', [$isbn_13]);

        if($results == NULL){
            return view('insertBook')->with('isbn_13',$isbn_13);
        }else{
            $update = DB::table('books')->where('isbn_13', $isbn_13)->get();
            return view('updateBook',compact('update'));
        }
    }
     
    }

    public function updateBook(Request $request){
        $book_title = $request->input('book_title');
        $book_author = $request->input('book_author');
        $publication_date = $request->input('publication_date');
        $isbn_13 = $request->input('ISBN_13');
        $book_description = $request->input('book_description');
        $book_cover_img = $request->input('book_cover_img');
        $trade_price = $request->input('trade_price');
        $retail_price = $request->input('retail_price');
        $book_stock = $request->input('book_stock');

        $this->validate($request, [
        'book_title' => 'required|max:255',
        'book_author' => 'required|max:35',
        'ISBN_13' => 'required',
        'book_description' => 'required',
        'book_cover_img' => 'required',
        'trade_price' => 'required',
        'retail_price' => 'required',
        'book_stock' => 'required',


        ]);

        $imageName = $request->book_cover_img->getClientOriginalName();
         
        $request->book_cover_img->move(public_path('images'), $imageName);

        $data=array(
            "book_title"=>$book_title,
            "book_author"=>$book_author,
            "publication_date"=>$publication_date,
            "ISBN_13"=>$isbn_13,
            "book_description"=>$book_description, 
            "trade_price"=>$trade_price,
            "retail_price"=>$retail_price,
            "book_stock"=>$book_stock,
            "book_cover_img"=>$imageName);

        DB::table('books')->where('isbn_13', $isbn_13)->update($data);
            
        return redirect('/')->with('alert', 'Book added and updated successfully! ');

            }
  
    public function insert(Request $request){
        $book_title = $request->input('book_title');
        $book_author = $request->input('book_author');
        $publication_date = $request->input('publication_date');
        $isbn_13 = $request->input('ISBN_13');
        $book_description = $request->input('book_description');
        $book_cover_img = $request->input('book_cover_img');
        $trade_price = $request->input('trade_price');
        $retail_price = $request->input('retail_price');
        $book_stock = $request->input('book_stock');

        $this->validate($request, [
            'book_title' => 'required|max:255',
            'book_author' => 'required|max:35',
            'ISBN_13' => 'required',
            'book_description' => 'required',
            'book_cover_img' => 'required',
            'trade_price' => 'required',
            'retail_price' => 'required',
            'book_stock' => 'required',
            ]);

            $fileName = null;
            if($request->hasFile('book_cover_img')){
            $photoFile = $request->file('book_cover_img');
            $fileName = $photoFile->getClientOriginalName();
            $request->book_cover_img->move(public_path('images'), $fileName);
            //Storage::putFileAs('images',$photoFile, $fileName);
        }
           // $imageName = $request->book_cover_img->getClientOriginalName();
           // $request->book_cover_img->move(public_path('images'), $imageName);
    

        $data=array(
            "book_title"=>$book_title,
            "book_author"=>$book_author,
            "publication_date"=>$publication_date,
            "ISBN_13"=>$isbn_13,
            "book_description"=>$book_description, 
            "trade_price"=>$trade_price,
            "retail_price"=>$retail_price,
            "book_stock"=>$book_stock,
            "book_cover_img"=>$fileName);

        DB::table('books')->insert($data);
            
        return redirect('/')->with('alert', 'Book added and updated successfully! ');

            }

    public function deleteBook(){
        $isbn_13 = $_GET['delete_isbn13'];

        DB::table('books')->where('ISBN_13',[$isbn_13])->delete(); 
        return redirect('/')->with('alert', 'Book deleted successfully! ');
    }
}
