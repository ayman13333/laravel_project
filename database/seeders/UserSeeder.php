<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for users table
        DB::table('users')->insert(
            [
                array(
                    'name'=>'admin',
                    'email'=>'admin@ifo.com',
                    'password'=>Hash::make('12345admin'),
                    'rule_id'=>1,
                ),
                array(
                    'name'=>'user',
                    'email'=>'user@info.com',
                    'password'=>Hash::make('12345user'),
                    'rule_id'=>0,
                ),
            ]
            );
            //for courses table
            DB::table('courses')->insert(
                [
                    array(
                        'course_name'=>'كورس العلاج بالطاقة الحيوية',
                        'price_online'=>'100',
                        'price_offline'=>'500',
                        'course_picture'=>'1653587230.jpg',
                        'course_rar'=>'1653587159.rar',
                    ),
                    array(
                        'course_name'=>'كورس التسويق',
                        'price_online'=>'100',
                        'price_offline'=>'500',
                        'course_picture'=>'1653626539.jpg',
                        'course_rar'=>'1653626430.rar',
                    ),
                ]
                );
                //for books table
                DB::table('books')->insert(
                    [
                        array(
                            'name'=>'bio energy therapy book',
                            'picture'=>'1651966528.jpeg',
                            'book_pdf'=>'1651966528.pdf',
                        ),
                        array(
                            'name'=>'كتاب العلاج بالطاقة الحيوية',
                            'picture'=>'1651966577.jpeg',
                            'book_pdf'=>'1651966577.pdf',
                        ),
                        array(
                            'name'=>'كتاب تسويق الكتروني',
                            'picture'=>'1651966613.jpeg',
                            'book_pdf'=>'1651966613.pdf',
                        ),
                        array(
                            'name'=>'خرائط القران الكريم',
                            'picture'=>'1652495894.jpeg',
                            'book_pdf'=>'1652495894.pdf',
                        ),
                    ]
                );
            //for clients table
            DB::table('clients')->insert(
                [
                    array(
                        'username'=>'ayman',
                        'phone'=>'01095189506',
                        'email'=>'ayman.mohamed15595@gmail.com',
                        'address'=>'null',
                        'type'=>'outsideEgypt',
                        'book_name'=>'كتاب العلاج بالطاقة الحيوية',
                        'booked'=>1,
                    ),
                    array(
                        'username'=>'mido',
                        'phone'=>'123456789',
                        'email'=>'user@info.com',
                        'address'=>'null',
                        'type'=>'pdf',
                        'book_name'=>'خرائط القران الكريم',
                        'booked'=>0,
                    ),
                ]
                );
    }
}
