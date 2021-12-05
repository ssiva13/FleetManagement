@extends('layouts.master')
@section('title') Update Car @endsection
@section('headerCss')
    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        @component('common-components.breadcrumb')
            @slot('title') Update Car  @endslot
            @slot('li1') {{ env('APP_NAME') }}  @endslot
            @slot('li2') Cars  @endslot
            @slot('li3') Update  @endslot
            @slot('link1') {{ route('home') }}  @endslot
            @slot('link2') {{ route('cars.index') }}  @endslot
        @endcomponent
        @component('common-components.actions')
            @slot('dlinks') @endslot
        @endcomponent
    </div>
    @include('cars._form')
@endsection
@section('footerScript')

@endsection