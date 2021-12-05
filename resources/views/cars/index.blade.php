@extends('layouts.master')
@section('title') Cars @endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        @component('common-components.breadcrumb')
            @slot('title') Cars  @endslot
            @slot('li1') {{ env('APP_NAME') }}  @endslot
            @slot('li2') Cars  @endslot
            @slot('li3') Index  @endslot
            @slot('link1') {{ route('home') }}  @endslot
            @slot('link2') {{ route('cars.index') }}  @endslot
        @endcomponent
        @component('common-components.actions')
            @slot('dlinks')
                <a class="dropdown-item" href="{{ route('cars.create') }}">Create Car/Vehicle</a>
            @endslot
        @endcomponent
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-primary">Cars Table</h4>
                    <table id="cars-datatable" class="display table table-striped table-bordered dt-responsive"
                           data-table-source="{{ route('cars.all') }}" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Plate Number</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Transmission</th>
                            <th>Color</th>
                            <th>Owner</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footerScript')
    <!-- Datatable init js -->
    <script>
        $(document).ready(function() {
            let tableId = $('#cars-datatable');
            let table = tableId.DataTable({
                ajax: '{{ route('cars.all') }}',
                dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>rt<"row"<"col-sm-12 text-center"i><"col-sm-6"B><"col-sm-6"p>>',
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis'],
                columns: [
                    { data: '#', render:function () { return ''; }},
                    { data: 'plate_number', name: 'plate_number', orderable: true, searchable: true, },
                    { data: 'make', name: 'make', orderable: true, searchable: true, },
                    { data: 'model', name: 'model', orderable: true, searchable: true, },
                    { data: 'transmission', name: 'transmission', orderable: true, searchable: true, },
                    { data: 'color', name: 'color', orderable: true, searchable: true, },
                    { data: 'owner', name: 'owner', orderable: true, searchable: true,
                        render:function (data, type, item){
                            let last_name = (item.fk_car_owner.last_name) ?? '';
                            let middle_name = (item.fk_car_owner.middle_name) ?? '';
                            let first_name = (item.fk_car_owner.first_name) ?? '';
                            return first_name.concat(` ${middle_name}`.concat(` ${last_name}`));
                        }
                    },
                    { data: 'created_at', name: 'created_at',
                        render:function (data, type, item) {
                            return new Date(item.created_at).toLocaleDateString();
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false,
                        render:function (data, type, item) {
                            let url = "{{ route('cars.edit', ':id') }}";
                            let vUrl = "{{ route('cars.show', ':id') }}";
                            let dUrl = "{{ route('cars.delete', ':id') }}";
                            return `<div class="row text-center">
                                        <button title="Edit Car Details" value="${url.replace(':id', item.id)}" class="showModalButton btn btn-primary ml-2 mr-2"><i class=" mdi mdi-pencil-outline "></i> Edit</button>
                                        <button title="View Car Details" value="${vUrl.replace(':id', item.id)}" class="showModalButton btn btn-info ml-2 mr-2"><i class=" mdi mdi-eye-outline "></i> View</button>
                                        <a href="${dUrl.replace(':id', item.id)}" class="btn btn-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                    </div>`;
                        }
                    }
                ]
            });
            table.on( 'order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        });


        @if ($messages = Session::all())
            @foreach ($messages as $type => $message)
                @if(is_string($message))
                    renderToastmessage( 'Error', `{{$message}}`, `{{$type}}`);
                @endif
            @endforeach
        @endif


    </script>

@endsection