<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpacecraftModel;
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
        return SpacecraftModel::all();
    }

    public function show($id) {
        return SpacecraftModel::find($id);
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
