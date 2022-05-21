<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateConverterRequest;
use App\Models\Converter;
use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function index(){
        $response = \Illuminate\Support\Facades\Http::withOptions(['verify' => false])->get('https://www.nbrb.by/api/exrates/rates?periodicity=0')->collect();
        $items = $response->map(function (array $item) {
            $newItem = new \stdClass();
            $newItem->item_Cur = $item['Cur_Abbreviation'];
            $newItem->item_Rate = $item['Cur_OfficialRate'];
            $newItem->item_Scale = $item['Cur_Scale'];
            $newItem->item_Date = date("jS F, Y", strtotime($item['Date']));
            $newItem->item_Calc = round(($item['Cur_OfficialRate'] / $item['Cur_Scale']),2);
            return $newItem;
        });

        return view('admin.converter.index',[
      'items'=>$items
  ]);
    }

public function update(UpdateConverterRequest $request){
$convert = ($request->amount / $request->from) ;
return back()->with([
   'conversion'=> 'За '. $request->amount. ' BY ' . 'Вы купите ' . $convert
]);
}
}

