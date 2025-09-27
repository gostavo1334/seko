<?php
namespace App\Http\Controllers;


use App\Models\ProcessImage;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;

class OurProController extends Controller
{
    public function index()
{
    $products = Product::all(); // Fetch all products from the database
    $processImages = ProcessImage::all(); // Fetch all process images from the database

    return view('ourproduct', compact('products', 'processImages'));



}
}
