<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabinStoreRequest;
use App\Models\Cabin;
use Illuminate\Http\Request;
use App\Models\CabinCollection;
use App\Models\CabinResource;

class CabinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //return "hello world";

        $sort = $request->input('sort', 'name');
        $type = $request->input('type','asc');

        $validSort = ["name","cabinlevel_id","capacity"];
        $validtype = ["asc","desc"];

        if (!in_array($sort,$validSort)   ) {
            $message = "Invalid sort field: $sort";
            return response()->
            json(['error' => $message], 400);
        }
        if ( !in_array($type,$validtype)  ) {
            $message = "Invalid sort field: $type";
            return response()->
            json(['error' => $message], 400);
        }

        /*

        if ($sort != "name" & $sort != "cabinlevel_id" & $sort != "capacity" ) {

            $message = "Invalid sort field: $sort";
            return response()->
            json(['error' => $message], 400);
        } */

        //dd($sort, $type);

        $cabins = Cabin::orderBy($sort,$type)->get();
        return response()->json(['data' => $cabins], 200);
            /* ->json([new CabinCollection ($cabin)], 200); */ 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CabinStoreRequest $request)
    {
        //
        $cabin = Cabin::create($request->all());

        return response()->
            json(['data' => $cabin], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabin $cabin)
    {
        
        return response ()
        ->json(['data' => new CabinResource($cabin)],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cabin $cabin)
    {
        $cabin->update($request->all());
        return response ()->json(['data' => $cabin],200);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabin $cabin)
    {

        $cabin->delete();
        return response()->
        json(null, 204);

    }
}