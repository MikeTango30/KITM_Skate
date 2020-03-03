<?php

use App\OrderState;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_states')->delete();
        $states = file_get_contents(base_path('database/repositories/order-states.json'));
        $states = json_decode($states);
        foreach ($states as $state) {
            OrderState::create(array(
                "state" => $state));
        }
    }
}
