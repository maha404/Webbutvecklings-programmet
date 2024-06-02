<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    //GET all data from both tables product and category. 
    public function index() {
        // Join to get both product and the category id and categoryname
        $products = DB::table('categories')->join('products', 'products.category_id', "=", 'categories.id')->get();
        
        if($products->count() > 0 ) { // If the database returns something it will return the data
            return $products;
        } else { // Else it will display an error message and code 
            return response()->json([
                'Databasen är tom!'
            ], 204);
        }
    }

    // GET - search result
    public function getSearch($search) {
        // Checks if the $search value is in the database column of 'name' in products table
        $result = DB::table('products')
                ->where('name', 'LIKE', "%$search%")
                ->get();
        
        return $result; // Returns all the data that matches the $search in the database
    }

    // POST 
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:5', // Name has to be filled in and be at least 5 characters long
            'category_id' => 'required',  // Category_id has to be filled in
            'product_type' => 'required|min:5', // Product_type needs to be filled in and be at least 5 character
            'product_description' => ['required', 'min:10', 'max:200'], // Product_description needs to be filled in, be at least 10 characters and maximum 200 characters
            'quantity' => ['required', 'numeric', 'between:1,100'],// Quantity needs to be filled in, be an numeric value and be between 1-100
        ], $messages = [
            'required' => ':attribute måste fyllas i!',
            'status' => 422
        ]);

        Return Product::create($request->all());
    }

    // GET - specific product
    public function show($id) {
        $product = Product::find($id); // Gets a specific product by the id number
        // If the id does not exist in the database there will be an error message displayed
        if($product != null) { 
            $product->find($id);
            return $product;
        } else {
            return response()->json([
                'Produkten hittades inte!'
            ], 404);
        }
    }

    // PUT
    public function update(Request $request, $id) {
        $product = Product::find($id); // Finds a product by id

        if($product != null) { // If the id does exist in the database it will check so that the fileds are filled in correctly
                $request->validate([
                'name' => 'required|min:5', // Name has to be filled in and be at least 5 characters long
                'category_id' => 'required', // Category_id has to be filled in
                'product_type' => 'required|min:5', // Product_type needs to be filled in and be at least 5 character
                'product_description' => ['required', 'min:10', 'max:200'], // Product_description needs to be filled in, be at least 10 characters and maximum 200 characters
                'quantity' => ['required', 'numeric', 'between:1,100'] // Quantity needs to be filled in, be an numeric value and be between 1-100
            ], $messages = [
                'required' => ':attribute måste fyllas i!',
            ]);

            $product->update($request->all()); // Updates the product
            return $product;
        } else {
            return response()->json([ // If any of the fileds above is missing an error will be sent
                'Produkten kunde inte uppdateras!'
            ], 404);
        }
        
    }

    // DELETE
    public function destroy($id) {
        $product = Product::destroy($id); // Finds the product with id
        if($product != null) { // If the id exists it will delete
            return response()->json([
                'Produkten togs bort!'
            ], 204);
            Product::destroy($id);
        } else { // If the id does not exists an error will be displayed
            return response()->json([
                'Produkten hittades inte!'
            ], 404);
        }
    }
}
