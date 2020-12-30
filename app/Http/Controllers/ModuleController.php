<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Module;
use App\Student;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modules = Module::all();
        $search = $request -> get("search");

        if (!(empty($search))) {
            $modules = Module::where('name', 'like', '%' . $search . '%')
            ->get();
        }

        return view('modules.index', ['modules' => $modules] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        $promotions = Promotion::all();
        return view('modules.create', ['modules' => $modules, 'promotions' => $promotions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = new Module();
        $module->name = $request->name;
        $module->description = $request->description;
        $module->save();
        $module->promotions()->attach($request->promotion_id);

        return redirect(route("modules.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        $promotions = Promotion::all();
        return view("modules.show", ["module"=>$module, "promotions"=>$promotions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        $promotions = Promotion::all();
        return view("modules.edit", ["module" => $module, "promotions" => $promotions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $module->name = $request->name;
        $module->description = $request->description;
        $module->promotions()->detach();
        $module->push();
        $module->promotions()->attach($request->promotion_id);

        return redirect(route("modules.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect(route("modules.index"));
    }
}
