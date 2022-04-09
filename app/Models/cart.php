<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class cart extends Model
{
    use HasFactory;

    public $table = 'carts';

    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function product()
    {
        return $this->hasmany(Product::class, 'id', 'product_id');
    }
}
