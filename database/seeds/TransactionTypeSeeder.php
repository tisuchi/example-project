<?php

use App\TransactionType;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Credit', 'Debit'];

        foreach ($types as $type){
            factory(TransactionType::class)->create([
                'title' => $type
            ]);
        }
    }
}
