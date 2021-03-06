<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpacecraftModel;
use App\Models\Armament;
use Illuminate\Support\Facades\Auth;

class SpacecraftController extends Controller
{
    
    public function store(Request $request) {
        if(Auth::check()){
        $spacecraft = SpacecraftModel::create($request->all());
        return response(['success' => true]);
        } else {
            return response('Unauthorized.');
        }
    }

    public function index(Request $request) {
        return SpacecraftModel::with(array('armaments' => function($query) {
             $query->select('spacecraft_id','title','qty'); 
            }))->get();
    }

    public function show($id) {
        return SpacecraftModel::with(array('armaments' => function($query) {
             $query->select('spacecraft_id','title','qty'); 
            }))->where('id','=',$id)->first();
    }

    public function update(Request $request, $id) {
        if(Auth::check()){
        $spacecraft = SpacecraftModel::findOrFail($id);
        $spacecraft->update($request->all());

        return response(['success' => true]);
        } else {
            return response('Unauthorized.');
        }
    }

    public function delete(Request $request, $id) {
        if(Auth::check()){
        $spacecraft = SpacecraftModel::findOrFail($id);
        $spacecraft->delete();

        return response(['success' => true]);
        }
    }
}
