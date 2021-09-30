<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::orderBy('created_at','DESC')->get();
    }

    public function store(Request $request){
        $newItem = new Item;
        $newItem->name = $request->item["name"];
        $newItem->save();

        return $newItem;

        /*
        Item::create([
            'name'=>$request->name,
            'completed'=>$request->completed,
            'completed_at'=>$request->completed_at,
        ]);
        */
    }

    public function update(Request $request, $id){
        $existingItem = Item::find($id);

        if($existingItem){
            $existingItem->completed = $request->item['completed'] ? true : false;
            $existingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $existingItem->save();
            return $existingItem;
        }

        return "item not found";
    }

    public function destroy($id)
    {
        $existingItem = Item::find( $id );

        if($existingItem){
            $existingItem->delete();
            return "Item successfully deleted.";
        }
        return "Item not found.";
    }


}
