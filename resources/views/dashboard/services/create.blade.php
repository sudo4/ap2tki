@extends('dashboard.layouts.main')

@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Slide</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </div>
</div>
<div class="row" id="validation">
    <div class="col-12">
        <div class="card wizard-content">
            <div class="card-body">
                <h4 class="card-title">Tambah Slide</h4>

                <form action="{{ route('service.store') }}" class="validation-wizard wizard-circle" method="post" enctype="multipart/form-data">
                    @csrf
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wfirstName2"> Judul </label>
                                    <input type="text" class="form-control" required name="title" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input-file-now">Upload Icon</label>
                                    <input type="file" id="input-file-now" name="logo" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Text</h5>
                                    <div class="controls">
                                        <textarea name="subtitle" id="textarea" class="form-control" required placeholder="Textarea text" value="{{old('subtitle')}}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" name="button">Simpan</button>                                </div>
                            </div>

                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
