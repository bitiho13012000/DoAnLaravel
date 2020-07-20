<?php
use App\Models\Product;
use App\Models\Order;

function count_item_product(){
    return $product_cnt = Product::where('status','=',1)->count();
}



?>
