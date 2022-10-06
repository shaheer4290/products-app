<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory;
use File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        ProductCategory::truncate();

        $json = File::get("database/data/products.json");
        $products = json_decode($json, true);
        
        if(!empty($products['products']) ) {
            foreach ($products['products'] as $product) {
                $category = $product['category'];
                $newCategory = ProductCategory::where('name', $category)->first();
                
                if(empty($newCategory)) {
                    $newCategory = new ProductCategory();
                    $newCategory->name = $product['category'];

                    if($product['category'] == 'boots') {
                        $newCategory->discount = 30;
                    }

                    $newCategory->save();
                }

                $newProduct = new Product();
                $newProduct->name = $product['name'];
                $newProduct->price = $product['price'];
                $newProduct->sku = $product['sku'];

                if($product['sku'] == "000003") {
                    $newProduct->discount = 15;
                }

                $newProduct->category_id = $newCategory->id;
                $newProduct->save();
            }
        }
    }
}
