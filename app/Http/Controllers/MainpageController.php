<?php

namespace App\Http\Controllers;

use App\Models\Mainpage;
use Illuminate\Http\Request;

class MainpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mainpages.mainpage');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mainpage  $mainpage
     * @return \Illuminate\Http\Response
     */
    public function show(Mainpage $mainpage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mainpage  $mainpage
     * @return \Illuminate\Http\Response
     */
    public function edit(Mainpage $mainpage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mainpage  $mainpage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mainpage $mainpage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mainpage  $mainpage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mainpage $mainpage)
    {
        //
    }
}
