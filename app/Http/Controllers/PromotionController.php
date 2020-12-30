<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Module;
use App\Student;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $promotions = Promotion::all();
        $search = $request -> get("search");

        if (!(empty($search))) {
            $promotions = Promotion::where('name', 'like', '%' . $search . '%')
            ->get();
        }

        return view('promotions.index', ['promotions' => $promotions, 'search' => $search] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promotions = Promotion::all();
        $modules = Module::all();

        return view('promotions.create', ['promotions' => $promotions, 'modules' => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promotion = new Promotion();
        $promotion->name = $request->name;
        $promotion->speciality = $request->speciality;
        $promotion->save();
        $promotion->modules()->attach($request->modules);

        return redirect(route("promotions.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        return view("promotions.show", ["promotion"=>$promotion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        $modules = Module::all();
        return view("promotions.edit", ["promotion" => $promotion, "modules" => $modules]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $promotion->name = $request->name;
        $promotion->speciality = $request->speciality;
        $promotion->modules()->detach();
        $promotion->save();
        $promotion->modules()->attach($request->modules);


        return redirect(route("promotions.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect(route("promotions.index"));
    }
}
