<?php

use Illuminate\Database\Seeder;

class OredersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = App\User::customers()->get();
        foreach($customers as $customer) {
            $customer->orders()->saveMany(factory(App\Order::class, 5))->create(['user_id'=>$customer->id]);
        }
        // //create 10 users
        // factory(App\User::class, 10)->create()->each(function ($user) {
        //     //create 5 posts for each user
        //     factory(App\Order::class, 5)->create(['user_id'=>$user->id]);
        // });
    }
}
