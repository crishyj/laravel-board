<?php

use Illuminate\Database\Seeder;
use App\Models\Init;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Init::insert([
            [
                'status' => 'In a meeting.',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'order'=>0,
            ], 
            [
                'status' => 'I am on the phone.',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'order'=>1,
            ],
            [
                'status' => 'I am available.',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'order'=>2,
            ],
        ]
        );
    }
}
