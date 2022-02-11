<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function goToCreateMenu()
    {
        return view('create_menu');
    }

    public function goToEditMenu()
    {
        return view('edit_menu');
    }

    public function goToDeleteMenu()
    {
        return view('delete_menu');
    }

    public function goToRequestClosed()
    {
        return view('request_closed');
    }

    public static function seenItem(string $type)
    {
        $items = Menu::where('product_type', $type)->get();

        return $items;
    }

    public function saveItem(Request $request)
    {

        if ($request->product_name == null) {
            dump("Nome do item não pode ser vazio. Por favor, repita o processo o inserindo. Redirecionando à tela de criação...");
            sleep(7);
            return redirect()->route('menu_creater');
        }

        if ($request->product_price == null) {
            dump("Preço do item não pode ser vazio. Por favor, repita o processo o inserindo. Redirecionando à tela de criação...");
            sleep(7);
            return redirect()->route('menu_creater');
        }

        if ($request->product_type == null) {
            dump("Tipo do item não pode ser vazio. Por favor, repita o processo o inserindo. Redirecionando à tela de criação...");
            sleep(7);
            return redirect()->route('menu_creater');
        }

        $item = Menu::create($request->all());

        $item->save();

        return redirect()->route('menu_creater');
    }

    public function updateItem(Request $request, int $id)
    {
        $item = Menu::findOrFail($id);

        $newItem = $request;

        if ($newItem->product_name == null) {
            $newItem->product_name = $item->product_name;
        }

        if ($newItem->product_price == null) {
            $newItem->product_price = $item->product_price;
        }

        if ($newItem->product_type == null) {
            $newItem->product_type = $item->product_type;
        }

        $item->update([
            'product_name' => $newItem->product_name,
            'product_price' => $newItem->product_price,
            'product_type' => $newItem->product_type
        ]);

        return redirect()->route('menu_edit');
    }

    public function deleteItem(int $id)
    {
        $item = Menu::findOrFail($id);
        $item->delete();

        return redirect()->route('menu_delete');
    }

}
