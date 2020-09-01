@extends('dashboard.layouts.main')

@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">ServiceS</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
       <div class="d-flex mt-10 justify-content-end">
       <a href="{{ route('service.create') }}" class="btn btn-success">Create</a>
       </div>
    </div>
</div>
<h2 class="card-title">Service</h2>
<hr>
<br>
<div class="row">
    <div class="col-lg-12 col-xlg-9 col-md-12">
        <div class="card">
            <!-- Nav tabs -->
            
            @foreach($service as $a)
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                    <div class="card-body">
                        <div class="profiletimeline">   
                            <div class="sl-item">
                                <div class="sl-left"> <img src="{{ asset($a->icon) }}" alt="user" class="img-circle" style="background-color: #054173"> </div>
                                <div class="sl-right">
                                    <div> <a href="#" class="link">{{ $a->title }}</a> <span class="sl-date"></span>
                                        <div class="m-t-20 row">
                                            <div class="col-md-12 col-xs-12">
                                                <p> {{ $a->subtitle }}</p> <a href="{{ route('service.edit', $a->uuid) }}" class="btn btn-success">Edit</a></div>
                                        </div>
                                        <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">{{ $a->created_at }}</a> </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection