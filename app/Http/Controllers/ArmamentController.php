<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armament;
use Illuminate\Support\Facades\Auth;

class ArmamentController extends Controller
{
    public function store(Request $request) {
        if(Auth::check()){
        $armament = Armament::create($request->all());
        return response(['success' => true]);
        } else {
            return response('Unauthorized.');
        }
    }

    public function index(Request $request) {
        return Armament::with(array('spacecraft' => function($query) {
             $query->select('id','name');
             })
            )->get();
        }

    public function show($id) {
        return Armament::with(array('spacecraft' => function($query) {
             $query->select('id','name'); 
            }))->where('id','=',$id)->first();
        }

    public function update(Request $request, $id) {
        if(Auth::check()){
        $armament = Armament::findOrFail($id);
        $armament->update($request->all());

        return response(['success' => true]);
        } else {
            return response('Unauthorized.');
        }
    }

    public function delete(Request $request, $id) {
        if(Auth::check()){
        $armament = Armament::findOrFail($id);
        $armament->delete();

        return response(['success' => true]);
        }
    }
}
