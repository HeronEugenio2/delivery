<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->email == 'hrs.eugenio@gmail.com') {
            $menus  = Menu::all();
            $orders = Order::with('user', 'menu')->get();

            return view('Manager.Order.Index', compact('menus', 'orders'));
        } else {
            $menus  = Menu::where('active_flag', 1)->get();
            $orders = Order::with('user', 'menu')->get();

            return view('Painel.Order.Index', compact('menus', 'orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param OrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderRequest $request)
    {
        $data = [
            'qtd'     => $request->input('qtd'),
            'menu_id' => $request->input('menuId'),
            'user_id' => $request->input('userId'),
            'price'   => $request->input('priceOrder'),
        ];

        Order::create($data);

        return redirect()->back()->with('success', 'inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $order  = Order::find($id);
        $delete = $order->delete();

        return redirect()->back()->with('success', 'deletado com sucesso!');
    }
}
