@extends('layouts.app')

@section('content')
    <div class="container">
        @if($link)
            <div class="row">
                @if($link->name) <span class="col"> <b>Title:</b> <br>{{ $link->name }} </span>@endif
                <span class="col"> <b>Destination:</b> <br>{{ $link->link }} </span>
                <span class="col"> <b>Short link:</b>  <br>{{ $link->getShortLink() }}</span>
            </div>

            @if(!$link->statistic)
                <h2> There have been no clicks on the link yet </h2>
            @else
                <div class="mt-4">
                    <span class="rounded-2 text-info-emphasis fs-4 p-2 mb-2" > {{ count($link->statistic) }} link clicks </span>
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ip</th>
                        <th>locale</th>
                        <th>device</th>
                    </tr>
                    </thead>
                    @foreach($link->statistic as $stat)
                        <tr>
                            <th> {{ $stat->consumer_ip }} </th>
                            <th> {{ $stat->location }} </th>
                            <th> {{ $stat->device }} </th>
                        </tr>
                    @endforeach
                    </table>
                </div>
            @endif
        @endif
    </div>
@endsection
@include('partials.toast')
