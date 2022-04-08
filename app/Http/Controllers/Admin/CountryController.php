<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCountryRequest;
use App\Models\Article;
use App\Models\Country;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CountryController
{

    public function index(){
        $country = Country::all();
        return view('admin.countries.index', [
            'countries' => $country
        ]);
    }

    public function create(){
        return view('admin.countries.create');
    }
    public function store(StoreCountryRequest $request){
//        $request->validate([
//            'name'=>'required|min:3|max:84',
//            'country_code'=>'min:2|max:8'
//        ]);
//        $this->validate($request,[
//            'name'=>'required|min:3|max:84',
//            'country_code'=>'min:2|max:8'
//        ]);
//        Validator::validate($request->all(),[
//
//            'name'=>'required|min:3|max:84',
//            'country_code'=>'min:2|max:8'
////
//        ]);
        Country::create($request->all());
    }
    public function edit(Country $country){
//        $country = Country::findOrFail($country);
        return view('admin.countries.edit', compact('country'));
    }
    public function update(Request $request, Country $country){
        $country->fill($request->all());
        $country->save();
    }
    public function destroy(Country $country){
        $country->delete();
    }



}
