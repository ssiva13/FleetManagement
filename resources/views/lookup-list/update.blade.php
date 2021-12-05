@extends('layouts.master')
@section('title') Update Lookup List @endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        @component('common-components.breadcrumb')
            @slot('title') Update Lookup List  @endslot
            @slot('li1') {{ env('APP_NAME') }}  @endslot
            @slot('li2') Lookup Lists  @endslot
            @slot('li3') Update  @endslot
            @slot('link1') {{ route('home') }}  @endslot
            @slot('link2') {{ route('lookup-lists.index') }}  @endslot
        @endcomponent
        @component('common-components.actions')
            @slot('dlinks') @endslot
        @endcomponent
    </div>
    @include('lookup-list._form')
@endsection
@section('footerScript')

@endsection