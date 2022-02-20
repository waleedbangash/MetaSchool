<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Grocery;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JamesMills\LaravelTimezone\Facades\Timezone;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GroceryController extends Controller
{

    public function index()
    {


        return view('dashboard.user.index');
    }
    public function createGrocery()
    {
        return view('dashboard.user.create-grocery');
    }
    public function storeGrocery(Request $request){

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
        ]);

       Grocery::create([
           'title'=>$request->title,
           'description'=>$request->description,
           'deadline'=>$request->deadline,
           'user_id'=>Auth::user()->id,
       ]);
        return redirect()->route('grocery.createGrocery')->with('success', 'Succefully Inserted');
    }
    public function showGrocery(){
        $grocery=Grocery::all();



    return view('dashboard.user.show-grocery',get_defined_vars());
    }

}
