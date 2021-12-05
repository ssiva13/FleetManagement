<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ ($car->id) ? route('cars.update',$car->id) : route('cars.store') }}" class="custom-validation" method="POST">
                    {{ csrf_field() }}
                    @if($car->id) @method('PUT') @else @method('POST') @endif
                    <div class="form-group row">
                        <label for="plate_number" class="col-sm-2 col-form-label">{{$car->getAttributeLabel('plate_number')}}</label>
                        <div class="col-sm-10">
                            <input name="plate_number" class="form-control max-alloptions" type="text" value="{{$car->plate_number}}"
                                   maxlength="12" id="plate_number"  onkeyup="this.value = this.value.toUpperCase();" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="make" class="col-sm-2 col-form-label">{{$car->getAttributeLabel('make') }}</label>
                        <div class="col-sm-10">
                            <select name="make" class="form-control select2" value="{{$car->make}}" id="make" data-has_children="1"
                                    data-api-endpoint="{{ route('lookup-values.get') }}" data-child-select-id="model">
                                <option value="">Select {{$car->getAttributeLabel('make') }}</option>
                                {!! \App\Helpers\FormsHelper::generateSelectOptions('CAR_MAKE') !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="model" class="col-sm-2 col-form-label">{{$car->getAttributeLabel('model')}}</label>
                        <div class="col-sm-10">
                            <select name="model" class="form-control select2" value="{{$car->model}}" id="model" disabled>
                                <option value="">Select {{$car->getAttributeLabel('model') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="transmission" class="col-sm-2 col-form-label">{{$car->getAttributeLabel('transmission')}}</label>
                        <div class="col-sm-10">
                            <select name="transmission" class="form-control select2" value="{{$car->transmission}}" id="transmission" >
                                <option value="">Select {{$car->getAttributeLabel('transmission') }}</option>
                                {!! \App\Helpers\FormsHelper::generateSelectOptions('TRANSMISSION') !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fuel" class="col-sm-2 col-form-label">{{$car->getAttributeLabel('fuel')}}</label>
                        <div class="col-sm-10">
                            <select name="fuel" class="form-control select2" value="{{$car->fuel}}" id="fuel">
                                <option value="">Select {{$car->getAttributeLabel('fuel') }}</option>
                                {!! \App\Helpers\FormsHelper::generateSelectOptions('FUEL') !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="year_of_manufacture" class="col-sm-2 col-form-label">{{$car->getAttributeLabel('year_of_manufacture')}}</label>
                        <div class="col-sm-10 input-group">
                            <input name="year_of_manufacture" class="form-control datepicker-year" type="text" value="{{$car->year_of_manufacture}}" id="year_of_manufacture" >
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="engine_size" class="col-sm-2 col-form-label">{{$car->getAttributeLabel('engine_size')}}</label>
                        <div class="col-sm-10">
                            <input name="engine_size" class="form-control range-slider" type="text" value="{{$car->engine_size}}" id="engine_size" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="color" class="col-sm-2 col-form-label">{{$car->getAttributeLabel('color')}}</label>
                        <div class="col-sm-10">
                            <select name="color" class="form-control select2" value="{{$car->color}}" id="color" >
                                <option value="">Select {{$car->getAttributeLabel('color') }}</option>
                                {!! \App\Helpers\FormsHelper::generateSelectOptions('COLOR') !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="owner" class="col-sm-2 col-form-label">{{$car->getAttributeLabel('owner')}}</label>
                        <div class="col-sm-10">
                            <select name="owner" class="form-control select2" value="{{$car->owner}}" id="owner" >
                                <option value="">Select {{$car->getAttributeLabel('owner') }}</option>
                                @foreach($owners as $ownerId => $owner)
                                    <option value="{{ $ownerId }}"> {{ $ownerId }} - {{ concatArrayElements($owner) }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-2">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 float-right form-submit">
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
                $(`#create-car`).hide()
            }
        });
    </script>
@endif
@section('footerScript')
    <script src="{{ URL::asset('/js/advanced-form.js')}}"></script>
@endsection