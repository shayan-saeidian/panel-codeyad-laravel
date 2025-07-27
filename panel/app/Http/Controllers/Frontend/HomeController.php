<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

//        $product=Product::query()->create([
//            'name'=>'moz'
//        ]);

//        $title=Tag::query()->create([
//            'title'=>'sabzi'
//        ]);
//        $products = Product::all();
        $tags = Tag::all();


        $product=Product::query()->find(1);
        $product->tags()->attach($tags[1]->id);
        dd($product->tags);
    }

}
