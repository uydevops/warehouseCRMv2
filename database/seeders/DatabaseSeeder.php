<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'developer@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        
        
        //fake 20 tane masa olustur içeri bahce teras 

        $tables = ['İçeri', 'Bahçe', 'Teras'];
        for($i = 1; $i <= 20; $i++) {
            \DB::table('tables')->insert([
                'name' => $tables[array_rand($tables)] . ' ' . $i,
                'capacity' => rand(2, 10),
            ]);
        }


      
        $positions = ['Garson', 'Aşçı', 'Kasiyer', 'Mutfak Görevlisi', 'Temizlik Görevlisi'];
        for($i = 1; $i <= 10; $i++) {
            \DB::table('employees')->insert([
                'name' => 'Çalışan ' . $i,
                'position' => $positions[array_rand($positions)],
                'salary' => rand(2000, 5000),
                'leave_days' => rand(0, 14),
                'annual_leave_days' => rand(0, 14),
            ]);
        }

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            \DB::table('invoices')->insert([
                'customer_id' => $faker->numberBetween(1, 100),
                'amount' => $faker->randomFloat(2, 10, 1000),
                'vat_rate' => 18,
                'vat_amount' => $faker->randomFloat(2, 2, 180),
                'status' => $faker->randomElement(['pending', 'paid', 'cancelled']),
                'due_date' => $faker->dateTimeBetween('now', '+1 month'),
                'order_id' => $faker->numberBetween(1, 100),
                'payment_method' => $faker->randomElement(['Kredi Kartı', 'Nakit', 'Banka Transferi']),
                'notes' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            //referance orders
            \DB::table('referance_order')->insert([
                'invoice_id' => $faker->numberBetween(1, 2),
            ]);


        }

        
    }
}
