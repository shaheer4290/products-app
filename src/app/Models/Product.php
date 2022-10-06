<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const CURRENCY = "EUR";

    public function getDiscountPercentage(): ?int
    {
        $discountPercentage = null;

        if(!empty($this->discount) ) {
            $discountPercentage = $this->discount;
        }

        if(!empty($this->category->discount)) {
            if(!empty($discountPercentage) ) {
                $discountPercentage = ($this->category->discount > $discountPercentage)?$this->category->discount:$discountPercentage;
            } else {
                $discountPercentage = $this->category->discount;
            }
        }

        return $discountPercentage;
    }

    public function getDiscountAmount($discountPercentage): float|int
    {
        $discountAmount = 0;

        if(!empty($discountPercentage)) {
            $discountAmount = ($discountPercentage/100) * $this->price;
        }

        return $discountAmount;
    }

    public function getCurrency() {
        return self::CURRENCY;
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
