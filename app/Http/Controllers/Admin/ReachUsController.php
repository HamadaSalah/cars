<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReachUs;
use App\Traits\StoreImageTrait;
use Illuminate\Http\Request;

class ReachUsController extends Controller
{
    use StoreImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reachus = ReachUs::first();
        return view('Admin.ReachUs.edit', compact('reachus'));
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
            'head' =>  'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'email' => 'required',
        ]);




        $requestData = $request->except('_token', '_method');
        $requestData['f_img'] = $this->verifyAndStoreImage($request, 'f_img');
        $requestData['l_img'] = $this->verifyAndStoreImage($request, 'l_img');
        // dd($requestData);
        $wel = ReachUs::findOrFail(1);
        $wel->update([
            'head' =>  $request->head,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'email' => $request->email,
            'f_img' => $requestData['f_img'] ?? $wel->f_img,
            'l_img' => $requestData['l_img'] ?? $wel->l_img,
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
