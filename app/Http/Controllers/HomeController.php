<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Skill;
use App\DataDokumen;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Data::orderBy('created_at', 'desc')->get();
        
         return view('display')->with(compact('datas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = Data::create([
            'name' => request('name'),
            'gender' => request('gender'),
            'dateFrom' => request('from'),
            'dateTo' => request('to')
        ]);
        foreach(request('skill') as $key => $val){
            $skill = Skill::create([
                
                    'dataid' => $data->id,
                    'skill' => $val
                
            ]);
        }
        if($request->file('dokumen')){
            foreach($request->file('dokumen') as $val){
            
                $filename = $val->getClientOriginalName();
                $val->storeAs('public/upload', $filename);
                
                $dok = DataDokumen::create([
    
                    'dataid' => $data->id,
                    'fileName' => $filename
    
                ]);
            }
        }
        
        return redirect(route('home.index'))->with('success', 'Form Saved');
        
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
        //
    }
}
