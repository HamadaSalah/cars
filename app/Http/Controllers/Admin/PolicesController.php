<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Polices;
use App\Traits\StoreImageTrait;
use Illuminate\Http\Request;

class PolicesController extends Controller
{
    use StoreImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $police = Polices::first();
        return view('Admin.Police.edit', compact('police'));
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
            'f_p' => 'required',
            'second_p' => 'required',
            'third_p' => 'required',
            'parent_h' => 'required',
            'parent_p' => 'required',
        ]);

        
        
        
        
        
        
        
        
        
         
        $requestData = $request->except('_token', '_method');
        $requestData['head_img'] = $this->verifyAndStoreImage($request, 'head_img');
        $requestData['f_p_img'] = $this->verifyAndStoreImage($request, 'f_p_img');
        $requestData['third_p_img'] = $this->verifyAndStoreImage($request, 'third_p_img');
        $requestData['parent_img'] = $this->verifyAndStoreImage($request, 'parent_img');
        // dd($requestData);
        $wel = Polices::findOrFail(1);
        $wel->update([
            'head' =>  $request->head,
            'f_p' => $request->f_p,
            'second_p' => $request->second_p,
            'third_p' => $request->third_p,
            'parent_h' => $request->parent_h,        
            'parent_p' => $requestData['parent_p'] ?? $wel->parent_p,
            'head_img' => $requestData['head_img'] ?? $wel->head_img,
            'f_p_img' => $requestData['f_p_img'] ?? $wel->f_p_img,
            'third_p_img' => $requestData['third_p_img'] ?? $wel->third_p_img,
            'parent_img' => $requestData['parent_img'] ?? $wel->parent_img
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
