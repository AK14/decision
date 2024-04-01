@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-end">
            <button class="btn btn-primary col-3 " data-bs-toggle="modal" data-bs-target="#linkModal"> Create link
            </button>
        </div>

        @if($links)
            @foreach($links as $link)
                <div class="card ">
                    <div class="card-header p-2">
                        <div class="card-title h4">{{$link->name}}</div>
                    </div>
                    <div class="card-body row">
                        <div class="col-12 d-md-flex flex-wrap align-content-start">
                            <span class="fw-bold me-2" >Destination</span>
                            <div> {{ $link->link }} </div>
                        </div>
                        <div class="col-12 d-md-flex flex-wrap text-wrap">
                            <span class="fw-bold me-2"> Short link </span>
                            <div> {{ $link->short_link }} </div>
                            <a href="#" class="copy-link" > <i class="bi bi-copy mx-2"></i> </a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start p-2">
                        <a href="/link/{{ $link->id }}" class="mx-2 link-dark"> <i class="bi bi-bar-chart"></i>
                            Statistic </a>
                        <div class="mx-2"><i
                                    class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($link->created_at)->toFormattedDateString() }}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
@include('partials.linkModal')
@include('partials.toast')
