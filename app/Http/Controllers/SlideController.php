<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Storage;
use DB;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        
        return view('dashboard.slide.slide', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slide.create');
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
            'title',
            'subtitle',
            'subtitles',
            'img',
        ]);
        $img = $request->img;
        $new_img = time().$img->getClientOriginalName();

        DB::beginTransaction();
        
        try {

            $slide = Slide::create([
                'title'=>$request->title,
                'subtitle'=>$request->subtitle,
                'subtitles'=>$request->subtitles,
                'img'=>'public/storage/img-slide/'. $new_img,
            ]);

            $img->move('public/storage/img-slide/', $new_img);

            DB::commit();
            return redirect('home/slide')->with('success', 'Data Berhasil Ditambahkan');
                
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
        $slide = Slide::where('uuid', $id)->first();
        
        return view('dashboard.slide.edit', compact('slide'));
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
       $this ->validate($request, [
        'title',
        'subtitle',
        'subtitles',
        'img',
       ]);
       
       $slide = Slide::where('uuid', $id);
       DB::beginTransaction();

       try {
           if($request->has('img')) {
               $img = $request->img;
               $new_img = time().$img->getClientOriginalName();
               $img->move('public/storage/img-slide/', $new_img);

               $data = [
                   'title' => $request->title,
                   'subtitle' => $request->subtitle,
                   'subtitles' => $request->subtitles,
                   'img' => 'public/storage/img-slide/'.$new_img,
               ];
           }

           else {
               $data = [
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'subtitles' => $request->subtitles,
               ];
           }

           $slide->update($data);
           DB::commit();
           return redirect('/home/slide')->with('success', 'Berhasil Merubah Data');

       } catch (\Exception $e) {
           DB::rollBack();
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
