@extends('dashboard.layouts.main')

@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Slide</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
       <div class="d-flex mt-10 justify-content-end">
       <a href="{{ route('slide.create') }}" class="btn btn-success">Create</a>
       </div>
    </div>
</div>
<h2 class="card-title">Slide</h2>
<hr>
<br>
<div class="row">
 @foreach($slide as $slide)
  <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card blog-widget">
          <div class="card-body">
          <div class="blog-image"><img src="{{ asset($slide->img) }}" alt="img" class="img-responsive"/></div>
                <h4 class="m-t-20 m-b-20 text-center">
                    {{ $slide->title }}
                </h4>
                <p class="m-t-20 m-b-20 text-center">
                    {{ $slide->subtitle }}
                </p>
                <p class="m-t-20 m-b-20 text-center">
                    {{ $slide->subtitles }}
                </p>
              <div class="d-flex">
                    <a href="{{ route('slide.edit', $slide->uuid) }}" class="btn btn-block btn-success">Edit</a>
              </div>
          </div>
      </div>
  </div>
  @endforeach
</div>

@endsection
