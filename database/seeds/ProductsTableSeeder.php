<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            'informatica', 'deportes', 'comestibles', 'alimentacion', 'jugetes'
        ];

        $count = 0;
        $name = '';
        $description = '';
        $price = 0;
        while ($count != 50) {
            $num = rand(0, count($categorias));
            switch ($num) {
                case 0:
                    $value = rand(0, 9);
                    $nombres = [

                    ];
                    break;
                case 1:
                    break;
                case 2:
                    break;
                case 3:
                    break;
                case 4:
                    break;
            }

            DB::table('products')->insert([
                'name'          => $name,
                'category'      => $categorias[$num],
                'description'   => $description,
                'quantity'      => rand(0, 20),
                'price'         => $price,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now(),
            ]);
            $count ++;
        }
    }
}
