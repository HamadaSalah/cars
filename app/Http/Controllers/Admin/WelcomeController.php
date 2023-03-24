<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Welcome;
use App\Traits\StoreImageTrait;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    use StoreImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $welcome = Welcome::first();
        return view('Admin.Welcome.edit', compact('welcome'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'open_in' =>  'required',
            'desc' => 'required',
            'his_desc' => 'required',
            'mis_desc' => 'required',
            'vis_desc' => 'required',
        ]);




        $requestData = $request->except('_token', '_method');
        $requestData['img'] = $this->verifyAndStoreImage($request, 'img');
        $requestData['his_img'] = $this->verifyAndStoreImage($request, 'his_img');
        $requestData['mis_img'] = $this->verifyAndStoreImage($request, 'mis_img');
        $requestData['vis_img'] = $this->verifyAndStoreImage($request, 'vis_img');
        // dd($requestData);
        $wel = Welcome::findOrFail(1);
        $wel->update([
            'open_in' =>  $request->open_in,
            'desc' => $request->desc,
            'his_desc' => $request->his_desc,
            'mis_desc' => $request->mis_desc,
            'vis_desc' => $request->vis_desc,        
            'img' => $requestData['img'] ?? $wel->img,
            'his_img' => $requestData['his_img'] ?? $wel->his_img,
            'mis_img' => $requestData['mis_img'] ?? $wel->mis_img,
            'vis_img' => $requestData['vis_img'] ?? $wel->vis_img
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
