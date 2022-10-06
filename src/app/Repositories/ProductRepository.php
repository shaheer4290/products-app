<?php
namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface 
{
	public function search($params)
    {
        $query = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id');

        if(!empty($params['category'])) {
            $category = $params['category'];
            $query->where('product_categories.name', 'like', '%'.$category.'%');
        }

        if(!empty($params['priceLessThan']) && is_numeric($params['priceLessThan'])) {
            $price = $params['priceLessThan'];
            $query->where('price', '<', $price);
        }

        return $query->paginate(5);
    }
}