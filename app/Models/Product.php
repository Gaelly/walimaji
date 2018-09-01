<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{

    protected $table = 'products';

    protected $fillable = [
        'quantity', 'description', 'idRef', 'idActor'
    ];

    public static  $rules = [
        'quantity' => 'required|numeric',
        'description' => 'required|min:5|max:500',
        'idRef' => 'required|numeric',
        'idActor' => 'required|numeric',
    ];

    public static function count(){
        return DB::table('products')
            ->select(DB::raw('count(id) as nombreProduit'))
            ->get();
    }

    public static function getWithReference($id){
        return DB::table('products')
            ->join('product_refs', 'product_refs.id', '=', 'products.idRef')
            ->join('product_prices','product_prices.idProduct','=','products.id')
            ->select('products.*', 'product_refs.*','product_prices.*')
            ->where('products.idActor','=',$id)
            ->get()->toArray();
    }

    public static  function getAllProviderWithPrice(){
        return DB::select("select p.*, pr.priceWithTax, pr.priceWithoutTax 
                            FROM products p, product_prices pr
                            WHERE p.id = (SELECT id FROM product_prices WHERE idProduct = p.id ORDER BY id DESC LIMIT 1 ) 
                            AND p.idActor =(SELECT id from user_types where designation='provider')");
                }

    public static  function getAllProducerWithPrice(){
        return DB::select("select p.*, pr.priceWithTax, pr.priceWithoutTax 
                            FROM products p, product_prices pr
                            WHERE p.id = (SELECT id FROM product_prices WHERE idProduct = p.id ORDER BY id DESC LIMIT 1 ) 
                            AND p.idActor =(SELECT id from user_types where designation='producer')");
    }

    public static  function getAllTraderWithPrice(){
        return DB::select("select p.*, pr.priceWithTax, pr.priceWithoutTax 
                            FROM products p, product_prices pr
                            WHERE p.id = (SELECT id FROM product_prices WHERE idProduct = p.id ORDER BY id DESC LIMIT 1 ) 
                            AND p.idActor =(SELECT id from user_types where designation='trader')");
    }

    public static  function getAllTransformerWithPrice(){
        return DB::select("select p.*, pr.priceWithTax, pr.priceWithoutTax 
                            FROM products p, product_prices pr
                            WHERE p.id = (SELECT id FROM product_prices WHERE idProduct = p.id ORDER BY id DESC LIMIT 1 ) 
                            AND p.idActor =(SELECT id from user_types where designation='transformer')");
    }

}