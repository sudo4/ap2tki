<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = Partner::all();
        return view('dashboard.partners.partner', compact('partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partner = Partner::all();
        return view('dashboard.partners.create', compact('partner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'logo',
            'name',
        ]);
        $logo = $request->logo;
        $new_logo = time().$logo->getClientOriginalName();

        DB::beginTransaction();
        
        try {

            $partner = Partner::create([
                'icon'=>'public/storage/logo/'. $new_logo,
                'name'=>$request->name,
            ]);

            $logo->move('public/storage/logo/', $new_logo);

            DB::commit();
            return redirect('home/partner')->with('success', 'Data Berhasil Ditambahkan');
                
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Sistam');

        }
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
