<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalenderEvent;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calenders = CalenderEvent::paginate(20);
        return view('Admin.Calender.index', compact('calenders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Calender.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'start' => 'required',
            'category' => 'required',
            'type' => 'required',
        ]);  
        $color = '' ; 
        if($request->type == 'Assessment') {
            $color = '#a337d4';
        }
        else if($request->type == 'Holiday') {
            $color = '#f22221';
        }
        else if($request->type == 'Event') {
            $color = '#f2711e';
        }
        else if($request->type == 'Meeting') {
            $color = '#2187da';
        }
        else if($request->type == 'Trips') {
            $color = '#24c396';
        }
        CalenderEvent::create([
            'start' => $request->start,
            'end' => $request->start,
            'display' => 'background',
            'color' => $color,
            'category' => $request->category,
            'type' => $request->type,
        ]);
        return redirect()->route('admin.calender.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cal = CalenderEvent::findOrFail($id);
        $cal->delete();
        return redirect()->back()->with('success', 'deleted successfully');

    }
}
