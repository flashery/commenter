<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('posts')->insert(array(
            'title' => 'Test Post',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys 
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
         book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
         It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop 
         publishing software like Aldus PageMaker including versions of Lorem Ipsum'

        ));

        // \DB::table('comments')->insert([
        //     0 => [
        //         'post_id' => 1,
        //         'parent_comment_id' => 0,
        //         'username' => 'John Doe',
        //         'message' => 'Test Message',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        // ]);
    }
}
