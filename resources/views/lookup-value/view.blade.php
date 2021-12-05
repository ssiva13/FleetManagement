@extends('layouts.master')
@section('title') Create Car @endsection
@section('headerCss')

@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        @component('common-components.breadcrumb')
            @slot('title') Create Car  @endslot
            @slot('li1') {{ env('APP_NAME') }}  @endslot
            @slot('li2') Cars  @endslot
            @slot('li3') Create  @endslot
            @slot('link1') {{ route('home') }}  @endslot
            @slot('link2') {{ route('cars.index') }}  @endslot
        @endcomponent
        @component('common-components.actions')
            @slot('dlinks')
                <a class="dropdown-item" href="{{ route('cars.index') }}">All Cars/Vehicles</a>
            @endslot
        @endcomponent
    </div>

@endsection
@section('footerScript')

@endsection