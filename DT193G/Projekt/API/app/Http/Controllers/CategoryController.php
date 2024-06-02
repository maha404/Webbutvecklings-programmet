<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // GET
    public function index() {
        $category = Category::all(); // Gets all the categories in the database

        if(!$category->isNotEmpty()) { // Checks if the database is empty or not
            return response()->json([
                'Databasen är tom!'
            ], 204);
        } else {
            return $category;
        }
    }

    // POST 
    public function store(Request $request) {
        $request->validate([
            'category_name' => 'required|min:4' // Category_name is required and has to be at least 4 characters long
        ], $messages = [
            'required' => ':attribute måste fyllas i'
        ]);

        Return Category::create($request->all()); // Creates a new category
    }

    // GET specific
    public function show($id) {
        $category = Category::find($id); // Gets a specific category by id

        if($category != null) { // if the id does not exists an error will be displayed
            $category->find($id);
            return $category;
        } else {
            return response()->json([
                'Kategorin hittades inte!'
            ], 404);
        }
    }

    // PUT
    public function update(Request $request, $id) {
        $category = Category::find($id); // Gets a specific category by the id number

        $request->validate([
            'category_name' => 'required|min:4' // Category_name is required and has to be at least 4 characters long
        ], $messages = [
            'required' => ':attribute måste fyllas i!'
        ]);

        $category->update($request->all()); // Updates the category in the database
        return $category;
    }

    // DELETE
    public function destroy($id) {
        $category = Category::destroy($id);// Gets a specific category by the id number
        if($category != null) { // if the id does not exists an error will be displayed and if it does it will be deleted
            return response()->json([
                'Kategorin togs bort'
            ]);
        } else {
            return response()->json([
                'Kategorin hittades inte'
            ], 404);
        }
    }

}
