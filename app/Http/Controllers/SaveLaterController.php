<?php

namespace App\Http\Controllers;

use id;
use App\Models\SaveLater;
use Illuminate\Http\Request;
use Idemonbd\Notify\Facades\Notify;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Node\Query\AndExpr;

class SaveLaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        if (!Auth::user()) {
            Notify::error('Need Login first !', 'error');
            return redirect()->route('login');
        }
        SaveLater::create($request->all() + [
            'user_id' => Auth::id(),
        ]);
        Notify::success('Product save in your profile', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaveLater  $saveLater
     * @return \Illuminate\Http\Response
     */
    public function show(SaveLater $saveLater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaveLater  $saveLater
     * @return \Illuminate\Http\Response
     */
    public function edit(SaveLater $saveLater)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaveLater  $saveLater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaveLater $saveLater)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaveLater  $saveLater
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaveLater $saveLater)
    {
        //
    }
}
