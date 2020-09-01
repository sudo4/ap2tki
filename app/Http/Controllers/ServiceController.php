<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        return view('dashboard.services.service', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = Service::all();
        return view('dashboard.services.create', compact('service'));
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
                'icon',
                'title',
                'subtitle',
                
            ]);
            $icon = $request->icon;
            $new_icon = time().$icon->getClientOriginalName();
    
            DB::beginTransaction();
            
            try {
    
                $service = Service::create([
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'icon'=>'public/storage/icon/'. $new_icon,
                ]);
    
                $icon->move('public/storage/icon/', $new_icon);
    
                DB::commit();
                return redirect('home/service')->with('success', 'Data Berhasil Ditambahkan');
                    
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
        $service = Service::where('uuid', $id)->first();
        return view('dashboard.services.edit', compact('service'));
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
        $this->validate($request, [
            'icon',
            'title',
            'subtitle',
        ]);

        $service = Service::where('uuid', $id);

        DB::beginTransaction();

        try {
            if($request->has('icon')) {
                $icon = $request->icon;
                $new_icon = time().$icon->getClientOriginalName();
                $icon->move('public/storage/icon/', $new_icon);

                $data = [
                    'icon' => 'public/storage/icon/'.$new_icon,
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,

                ];
            }
            else {
                $data = [
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                ];
            }

            $service->update($data);
            DB::commit();
            return redirect('/home/service')->with('success', 'Berhasil Merubah Data');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Sistem');

        }
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
