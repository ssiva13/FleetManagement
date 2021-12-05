@extends('layouts.master')
@section('title') Create Lookup List @endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        @component('common-components.breadcrumb')
            @slot('title') Create Lookup List  @endslot
            @slot('li1') {{ env('APP_NAME') }}  @endslot
            @slot('li2') Lookup Lists  @endslot
            @slot('li3') Create  @endslot
            @slot('link1') {{ route('home') }}  @endslot
            @slot('link2') {{ route('lookup-lists.index') }}  @endslot
        @endcomponent
        @component('common-components.actions')
            @slot('dlinks')
                <a class="dropdown-item" href="{{ route('lookup-lists.index') }}">All Lookup Lists</a>
            @endslot
        @endcomponent
    </div>
    @include('lookup-list._form')
@endsection
