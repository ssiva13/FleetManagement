@extends('layouts.master')
@section('title') Lookup List @endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        @component('common-components.breadcrumb')
            @slot('title') Lookup List  @endslot
            @slot('li1') {{ env('APP_NAME') }}  @endslot
            @slot('li2') Lookup List  @endslot
            @slot('li3') Index  @endslot
            @slot('link1') {{ route('home') }}  @endslot
            @slot('link2') {{ route('lookup-lists.index') }}  @endslot
        @endcomponent
        @component('common-components.actions')
            @slot('dlinks')
                <a class="dropdown-item" href="{{ route('lookup-lists.create') }}">Create Lookup List</a>
                <a class="dropdown-item" href="{{ route('lookup-values.index') }}">View All Lookup Values</a>
            @endslot
        @endcomponent
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-primary">Lookup List Table</h4>
                    <table id="lookuplist-datatable" class="display table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Lookup Type</th>
                            <th>Name Format</th>
                            <th>Data Type</th>
                            <th>Lookup Values</th>
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
            let table = $('#lookuplist-datatable').DataTable({
                ajax: '{{ route('lookup-lists.all') }}',
                dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>rt<"row"<"col-sm-12 text-center"i><"col-sm-6"B><"col-sm-6"p>>',
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis'],
                columns: [
                    { data: '#', render:function () { return ''; }},
                    { data: 'type_name', name: 'type_name', orderable: true, searchable: true, },
                    { data: 'name_format', name: 'name_format', orderable: true, searchable: true, },
                    { data: 'data_type', name: 'data_type', orderable: true, searchable: true, },
                    { data: 'fk_lookup_value', name: 'fk_lookup_value', orderable: false, searchable: false,
                        render:function (data, type, item) {
                            return dynamicAxiosCall(item, `{{ route('lookup-values.create', ':id') }}`, `{{ route('lookup-values.show', ':id') }}`);
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false,
                        render:function (data, type, item) {
                            let url = "{{ route('lookup-lists.edit', ':id') }}";
                            let vUrl = "{{ route('lookup-lists.show', ':id') }}";
                            let dUrl = "{{ route('lookup-lists.delete', ':id') }}";
                            return `<div class="row text-center">
                                        <button title="Edit Lookup List" value="${url.replace(':id', item.id)}" class="showModalButton btn btn-primary ml-2 mr-2"><i class=" mdi mdi-pencil-outline "></i> Edit</button>
                                        <button title="View Lookup List" value="${vUrl.replace(':id', item.id)}" class="showModalButton btn btn-info ml-2 mr-2"><i class=" mdi mdi-eye-outline "></i> View</button>
                                        <a href="${dUrl.replace(':id', item.id)}" class="btn btn-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                    </div>`;
                        }
                    }
                ]
            });
            table.on( 'order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerText = i+1;
                } );
            } ).draw();
        });

        function dynamicAxiosCall(lookupList,createUrl,optionUrl) {
            let lookupvalues = lookupList.fk_lookup_value;
            let badgesDiv = `<div class="values-badges">`;
            let allBadges = ``;
            let closeBadgesDiv = `<span title="Add ${lookupList.type_name} Values" value="${createUrl.replace(':id', lookupList.id)}" class="showModalButton badge badge-success p-2"><i class="fas fa-plus"></i></span></div>`;
            lookupvalues.forEach(lookupvalue => {
                let badge = `<span class="badge badge-primary p-2 mr-2 showModalButton" value="${optionUrl.replace(':id', lookupvalue.id)}" title="View Lookup Value ${lookupvalue.option_value}" >
                                        <span>${lookupvalue.option_key}</span> - <span>${lookupvalue.option_value}</span>
                                    </span>`;
                allBadges = allBadges.concat(badge)
            });
            return badgesDiv.concat(allBadges.concat(closeBadgesDiv))
        }
    </script>

@endsection