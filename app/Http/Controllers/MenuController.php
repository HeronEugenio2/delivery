<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();

        return view('Manager.Menu.Index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Manager.Menu.Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $menuRequest)
    {
        try {
            $requestValidated = $menuRequest->validated();

            if ($requestValidated) {
                $data      = [
                    "title"   => $menuRequest->input('title'),
                    "content" => $menuRequest->input('content'),
                    "price"   => $menuRequest->input('price'),
                ];
                $menuSaved = Menu::create($requestValidated);
            }

            if ($menuSaved) {
                return redirect()->route('manager.menu.index')
                                 ->with('success', __('definitions.message.save.success'));
            } else {
                return redirect()->back()->with('error', __('definitions.message.save.error'));
            }
        } catch (Exception $ex) {
            report($ex);

            return redirect()->back()->with('error', __('definitions.message.save.error'));
        }
    }

    /**
     * Display the specified resource.
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $menu   = Menu::find($id);
            $delete = $menu->delete();
            if ($delete) {
                return redirect()->back()->with('success', 'deletado com sucesso!');
            } else {
                return redirect()->back()->with('error', 'erro ao deletar!');
            }
        } catch (Exception $ex) {
            report($ex);

            return redirect()->back()->with('error', __('definitions.message.save.error'));
        }
    }
}
