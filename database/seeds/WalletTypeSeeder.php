<?php

use App\WalletType;
use Illuminate\Database\Seeder;

class WalletTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Credit Card', 'Debit Card', 'Cash'];

        foreach ($types as $type){
            factory(WalletType::class)->create([
                'title' => $type
            ]);
        }
    }
}
