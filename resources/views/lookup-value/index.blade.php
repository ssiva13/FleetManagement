@extends('layouts.master')
@section('title') Lookup Values @endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        @component('common-components.breadcrumb')
            @slot('title') Lookup Values  @endslot
            @slot('li1') {{ env('APP_NAME') }}  @endslot
            @slot('li2') Lookup Values  @endslot
            @slot('li3') Index  @endslot
            @slot('link1') {{ route('home') }}  @endslot
            @slot('link2') {{ route('lookup-values.index') }}  @endslot
        @endcomponent
        @component('common-components.actions')
            @slot('dlinks')
                <a class="dropdown-item" href="{{ route('lookup-lists.index') }}">All Lookup Lists</a>
            @endslot
        @endcomponent
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-primary">Lookup Values Table</h4>
                    <table id="lvalues-datatable" class="display table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Lookup Type</th>
                            <th>Option Key</th>
                            <th>Option Value</th>
                            <th>Status</th>
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
            let table = $('#lvalues-datatable').DataTable({
                ajax: '{{ route('lookup-values.all') }}',
                dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>rt<"row"<"col-sm-12 text-center"i><"col-sm-6"B><"col-sm-6"p>>',
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis'],
                columns: [
                    { data: '#', render:function () { return ''; }},
                    { data: 'fk_lookup_list.type_name', name: 'fk_lookup_list.type_name', orderable: true, searchable: true},
                    { data: 'option_key', name: 'option_key', orderable: true, searchable: true, },
                    { data: 'option_value', name: 'option_value', orderable: true, searchable: true, },
                    { data: 'status', name: 'status', orderable: true, searchable: true,
                        render:function (data, type, item){
                            return item.status === {{ \App\LookupValue::ACTIVE }} ? 'ACTIVE' : 'INACTIVE';
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false,
                        render:function (data, type, item) {
                            let url = "{{ route('lookup-values.edit', ':id') }}";
                            let vUrl = "{{ route('lookup-values.show', ':id') }}";
                            let dUrl = "{{ route('lookup-values.delete', ':id') }}";
                            return `<div class="row text-center">
                                        <button title="Edit Lookup Value" value="${url.replace(':id', item.id)}" class="showModalButton btn btn-primary ml-2 mr-2"><i class=" mdi mdi-pencil-outline "></i> Edit</button>
                                        <button title="View Lookup Value" value="${vUrl.replace(':id', item.id)}" class="showModalButton btn btn-info ml-2 mr-2"><i class=" mdi mdi-eye-outline "></i> View</button>
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
    </script>

@endsection