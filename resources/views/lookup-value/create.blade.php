@extends('layouts.master')
@section('title') Create Lookup Value @endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        @component('common-components.breadcrumb')
            @slot('title') Create Lookup Value  @endslot
            @slot('li1') {{ env('APP_NAME') }}  @endslot
            @slot('li2') Lookup Values  @endslot
            @slot('li3') Create  @endslot
            @slot('link1') {{ route('home') }}  @endslot
            @slot('link2') {{ route('cars.index') }}  @endslot
        @endcomponent
        @component('common-components.actions')
            @slot('dlinks')
                <a class="dropdown-item" href="{{ route('lookup-values.index') }}">All Lookup Values</a>
            @endslot
        @endcomponent
    </div>
    @include('lookup-value._form')
@endsection
