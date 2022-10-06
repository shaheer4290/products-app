<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public $preserveKeys = true;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $discountPercentage = $this->getDiscountPercentage();
        $discountAmount = $this->getDiscountAmount($discountPercentage);
        $finalAmount = ($discountAmount > 0)?($this->price - $discountAmount):$this->price;

        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'category' => $this->category->name,
            'price' => [
                'original' => $this->price,
                'final' => $finalAmount,
                'discount' => !empty($discountPercentage)?$discountPercentage.'%':NULL,
                'currency' => $this->getCurrency()
            ]
        ];
    }
}
