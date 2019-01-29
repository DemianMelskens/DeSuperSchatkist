<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Standard
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Car '.$i,
                'slug' => 'car-'.$i,
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, 1:' . [10, 12, 18, 24, 32][array_rand([10, 12, 18, 24, 32])],
                'price' => rand(10, 245),
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/dummy/car-'.$i.'.jpg',
                'images' => '["products\/dummy\/car-2.jpg","products\/dummy\/car-3.jpg","products\/dummy\/car-4.jpg"]',
            ])->categories()->attach(1);
        }

        // Select random entries to be featured
        Product::whereIn('id', [1, 3, 6, 12, 15, 22, 26, 29])->update(['featured' => true]);
        Product::whereIn('id', [1, 3, 6, 12, 15, 22, 26, 29])->update(['discounted' => true]);
    }
}
