<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ ($lookuplist->id) ? route('lookup-lists.update',$lookuplist->id) : route('lookup-lists.store') }}" class="custom-validation" method="POST">
                    {{ csrf_field() }}
                    @if($lookuplist->id) @method('PUT') @else @method('POST') @endif
                    <div class="form-group row">
                        <label for="type_name" class="col-sm-2 col-form-label">{{$lookuplist->getAttributeLabel('type_name')}}</label>
                        <div class="col-sm-10">
                            <input name="type_name" class="form-control max-alloptions" type="text" value="{{$lookuplist->type_name}}" maxlength="30"
                                   onkeyup="this.value = this.value.toUpperCase();" id="type_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_format" class="col-sm-2 col-form-label">{{$lookuplist->getAttributeLabel('name_format')}}</label>
                        <div class="col-sm-10">
                            <input name="name_format" class="form-control" type="text" value="{{$lookuplist->name_format}}" maxlength="20" id="name_format">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="data_type" class="col-sm-2 col-form-label">{{$lookuplist->getAttributeLabel('data_type')}}</label>
                        <div class="col-sm-10">
                            <select name="data_type" class="form-control select2" value="{{$lookuplist->data_type}}" id="data_type" required>
                                <option value="string"> String </option>
                                <option value="integer"> Integer </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="list-required" class="col-sm-2 col-form-label">{{$lookuplist->getAttributeLabel('required')}}</label>
                        <div class="col-sm-10">
                            <select name="required" class="form-control select2" value="{{$lookuplist->required}}" id="list-required" required>
                                <option value="1"> Yes </option>
                                <option value="0"> No </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-2">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 float-right" id="create-lookuplist">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if(isset($read))
    <script>
        $(function () {
            let inputs = $(`input[type="text"], textarea, select`);
            let readOnly = `{{ $read ?? '' }}`
            if(readOnly) {
                inputs.attr('readonly', 'readonly')
                    .attr('disabled', 'disabled')
                    .addClass('bg-soft-secondary');
                $(`#create-lookuplist`).hide()
            }
        });

    </script>
@endif