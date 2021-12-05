<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form action="{{ ($lookupvalue->id) ? route('lookup-values.update',$lookupvalue->id) : route('lookup-values.store') }}" class="custom-validation" method="POST">
                {{ csrf_field() }}
                @if($lookupvalue->id) @method('PUT') @else @method('POST') @endif
                <div class="form-group row d-none">
                    <label for="fk_lookup_list" class="col-sm-2 col-form-label d-none">{{$lookupvalue->getAttributeLabel('fk_lookup_list')}}</label>
                    <div class="col-sm-12">
                        <input name="fk_lookup_list" class="form-control max-alloptions" value="{{$lookupvalue->fk_lookup_list}}"
                               type="text" readonly="readonly" id="fk_lookup_list" required hidden>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="option_key" class="col-sm-2 col-form-label">{{$lookupvalue->getAttributeLabel('option_key')}}</label>
                    <div class="col-sm-10">
                        <input name="option_key" class="form-control max-alloptions" type="text" value="{{$lookupvalue->option_key}}"
                               maxlength="20" id="option_key" data-parsley-length="[1,20]" onkeyup="this.value = this.value.toUpperCase();" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="option_value" class="col-sm-2 col-form-label">{{$lookupvalue->getAttributeLabel('option_value')}}</label>
                    <div class="col-sm-10">
                        <input name="option_value" class="form-control max-alloptions" type="text" value="{{$lookupvalue->option_value}}"
                               maxlength="50" id="option_value" data-parsley-length="[1,50]" onkeyup="this.value = this.value.toUpperCase();" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="has_children" class="col-sm-2 col-form-label">{{$lookupvalue->getAttributeLabel('has_children')}}</label>
                    <div class="col-sm-10">
                        <select name="has_children" class="form-control select2" value="{{$lookupvalue->has_children}}" id="has_children" required>
                            <option>Select {{$lookupvalue->getAttributeLabel('has_children') }}</option>
                            <option value="1"> Yes </option>
                            <option value="0"> No </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fk_parent_value" class="col-sm-2 col-form-label">{{$lookupvalue->getAttributeLabel('fk_parent_value')}}</label>
                    <div class="col-sm-10">
                        <select name="fk_parent_value" class="form-control select2" value="{{$lookupvalue->fk_parent_value}}" id="fk_parent_value" required>
                            <option>Select {{$lookupvalue->getAttributeLabel('fk_parent_value') }}</option>
                            <option value="1"> CARS MAKE </option>
                            <option value="0"> No </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="value_status" class="col-sm-2 col-form-label">{{$lookupvalue->getAttributeLabel('has')}}</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control select2" value="{{$lookupvalue->status}}" id="value_status" required>
                            <option>Select {{$lookupvalue->getAttributeLabel('status') }}</option>
                            <option value="1"> Active </option>
                            <option value="0"> Inactive </option>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-0 mt-2">
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 float-right" id="create-lookupvalue">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
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
                $(`#create-lookupvalue`).hide()
            }
        });
    </script>
@endif