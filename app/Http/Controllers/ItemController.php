<?php
namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list()
    {
        // Itemモデルから全件取得する。
        $items = Item::all();
        // responseヘルパのjsonメソッドを利用してreturnする。
        return response()->json($items);
    }

    public function create(Request $request)
    {
        $item = new Item();
        $item->fill($request->all())->save();

        return response()->json($item);
    }

    public function token()
    {
        return csrf_field();
        //YSKlpTlurbrR3c026bxtG4jvYWeLpiFVX2XNgdmz
    }

    public function index() {
        return view("item.index");
    }
}