<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController
{

    public function index(){
        $countries = Country::all();
        return view('admin.countries.index', [
            'countries' => $countries
        ]);
    }

    public function create(){
        return view('admin.countries.create');
    }
    public function storage(Request $request){
        Country::create($request->all());
    }
    public function edit(Request $request, $id){
        $country = Country::findOrFail($id);
        return view('admin.countries.edit', compact('country'));
    }
    public function update(Request $request, $id){
        $country = Country::findOrFail($id);
        $country->fill($request->all());
        $country->save();
    }
    public function delete($id){
        $country = Country::find($id);
        $country->deleteOrFail();
    }



}
