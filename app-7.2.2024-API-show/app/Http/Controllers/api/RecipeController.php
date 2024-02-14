<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::get()->toJson(JSON_PRETTY_PRINT);
        return response($recipes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recipe = new Recipe;
        $recipe->name = $request->name;
        $recipe->cookingprocedure = $request->cookingprocedure;
        if ($recipe->save()){
            return response()->json([
                "message"=>"Recipe record created!"
            ], 201);
        }
        return response()->json([
            "message"=>"Could not create recipe!"
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(Recipe::where('id', $id)->exists()){
            $student = Recipe::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json([
                "message"=>"Recipe not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Recipe::where('id', $id)->exists()){
        
            $recipe = Recipe::find($id);
            $recipe->name = is_null($request->name) ? $recipe->name : $request->name;
            $recipe->cookingprocedure = is_null($request->cookingprocedure) ? $recipe->cookingprocedure : $request->cookingprocedure;
            $recipe->save();
            return response()->json([
                "message" => "Recipe records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message"=>"Recipe not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Recipe::where('id', $id)->exists()){

            $recipe = Recipe::find($id);
            $recipe->delete();

            return response()->json([
                "message" => "Recipe records deleted"
              ], 200);
        } else {
            return response()->json([
                "message"=>"Recipe not found"
            ], 404);
        }
    }
}
