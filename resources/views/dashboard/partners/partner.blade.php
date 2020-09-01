@extends('dashboard.layouts.main')

@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Kerja Sama</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
       <div class="d-flex mt-10 justify-content-end">
        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Create</button>
       </div>
    </div>

    <div class="col-md-12 col-4 align-self-center">
        <div class="collapse" id="collapseExample" aria-expanded="false">
            <div >
                <form action="{{ route('partner.store') }}" class="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                                <br>
                                <h4 class="control-label">Tambah Data</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nama Instansi / Lembaga</label>
                                <input type="text" class="form-control" required name="name" value="{{ old('title') }}" placeholder="Masukkan Nama Instansi / Lembaga">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Logo Instansi / Lembaga</label>
                                <input type="file" id="input-file-now" name="img">
                            </div>
                        </div>
                        <!--/span-->
                        
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset"  class="btn btn-inverse">  Batal  </button>
                        </div>
                        <!--/span-->
                    </div>
                </form>
            </div>
        </div>
     </div>      
</div>



<h2 class="card-title">Kerja Sama</h2>
<hr>
<br>


@foreach($partner as $a)
<div class="card-group">
    <!-- Column -->
    <div class="card col-md-3 col-4 ">
        <div class="card-body text-center">
            <h4 class="text-center">{{ $a->name }}</h4>
            <div id="spark8"><img src="{{ $a->logo }}" alt=""></div>
            
        </div>
        
        <div class="box b-t text-center">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('partner.id', $a->uuid) }}">edit</a>
                <a class="dropdown-item" href="#">delete</a>
              </div>
        </div>
    </div>
</div>
@endforeach


@endsection