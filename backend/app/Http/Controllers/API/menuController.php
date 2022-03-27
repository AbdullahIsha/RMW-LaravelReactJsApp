<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class menuController extends Controller
{
    public function store(Request $req){
        $menu = new Menu;
        try {
            // $rename = $req->file('img')->getClientOriginalName();
            $menu->name = $req->name;
            $menu->category = $req->category;
            $menu->price = $req->price;
            $menu->description = $req->description;
            $menu->img = 'img/uploads/'.time().'.jpg';

            $menu->save();
            return  response()-> json([
                "message" => 'Item added to the menu table...',
            ]);
        }catch (\Exception $e) {
            return  response()-> json([
                "message" => $e->getMessage(),
            ]);
        }
    }
}
