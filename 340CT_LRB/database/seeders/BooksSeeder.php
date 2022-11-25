<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'book_title' => 'My Mothers Kitchen',
            'book_author' => 'Emila Yusof',
            'publication_date' => '2020-06-24',
            'ISBN_13' => '9781566199090',
            'book_description' => 'Lorem ipsum dolor sit amet',
            'book_cover_img' => 'book1.jpg',
            'trade_price' => '16',
            'retail_price' => '30',
            'book_stock' => '20'
        ]);

        DB::table('books')->insert([
            'book_title' => 'Im Calm',
            'book_author' => 'Jayneen Sanders',
            'publication_date' => '2022-01-03',
            'ISBN_13' => '9781566199091',
            'book_description' => 'Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes',
            'book_cover_img' => 'book2.jpg',
            'trade_price' => '12',
            'retail_price' => '18',
            'book_stock' => '20'
        ]);

        DB::table('books')->insert([
            'book_title' => 'Baby Shark',
            'book_author' => 'pinkfong',
            'publication_date' => '2021-05-30',
            'ISBN_13' => '9781566199092',
            'book_description' => 'Quisque rutrum. Aenean imperdiet',
            'book_cover_img' => 'book3.jpg',
            'trade_price' => '19',
            'retail_price' => '25',
            'book_stock' => '20'
        ]);

        DB::table('books')->insert([
            'book_title' => 'Lets Go On A Mommy Date',
            'book_author' => 'Karen Kingsbury',
            'publication_date' => '2021-10-03',
            'ISBN_13' => '9781566199093',
            'book_description' => 'Aenean vulputate eleifend tellus',
            'book_cover_img' => 'book4.jpg',
            'trade_price' => '18 ',
            'retail_price' => '26',
            'book_stock' => '20'
        ]);

        DB::table('books')->insert([
            'book_title' => 'Let Go Of Jealousy',
            'book_author' => 'Gill Hasson',
            'publication_date' => '2019-01-03',
            'ISBN_13' => '9781566199094',
            'book_description' => 'Sed consequat, leo eget bibendum sodales, augue velit cursus nunc',
            'book_cover_img' => 'book5.jpg',
            'trade_price' => '30',
            'retail_price' => '35',
            'book_stock' => '20'
        ]);

        DB::table('books')->insert([
            'book_title' => 'Ruby Finds A Worry',
            'book_author' => 'Tom Percival',
            'publication_date' => '2020-02-20',
            'ISBN_13' => '9781566199095',
            'book_description' => 'Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue',
            'book_cover_img' => 'book6.jpg',
            'trade_price' => '30',
            'retail_price' => '35',
            'book_stock' => '20'
        ]);

        DB::table('books')->insert([
            'book_title' => 'Tomorrow Most Likely',
            'book_author' => 'Dave Eggers',
            'publication_date' => '2022-01-19',
            'ISBN_13' => '9781566199096',
            'book_description' => 'Curabitur ullamcorper ultricies nis',
            'book_cover_img' => 'book7.jpg',
            'trade_price' => '56',
            'retail_price' => '67',
            'book_stock' => '20'
        ]);

        DB::table('books')->insert([
            'book_title' => 'The Cat In The Hat',
            'book_author' => 'Dr. Seuss',
            'publication_date' => '2018-04-30',
            'ISBN_13' => '9781566199097',
            'book_description' => 'Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero',
            'book_cover_img' => 'book8.jpg',
            'trade_price' => '45',
            'retail_price' => '70',
            'book_stock' => '20'
        ]);

        DB::table('books')->insert([
            'book_title' => 'In Your Own Backyard',
            'book_author' => 'Loren Towen',
            'publication_date' => '2018-06-08',
            'ISBN_13' => '9781566199098',
            'book_description' => 'Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus',
            'book_cover_img' => 'book9.jpg',
            'trade_price' => '45',
            'retail_price' => '68',
            'book_stock' => '20'
        ]);

        DB::table('books')->insert([
            'book_title' => 'Oete The Cat',
            'book_author' => 'Eric Litwin',
            'publication_date' => '2018-03-10',
            'ISBN_13' => '9781566199099',
            'book_description' => 'Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi',
            'book_cover_img' => 'book10.jpg',
            'trade_price' => '35',
            'retail_price' => '56',
            'book_stock' => '20'
        ]);
    }
}
