<!--begin::Entry-->
<div class="d-flex flex-column-fluid" id="kt_form_1">
    <!--begin::Container-->
    <div class=" container ">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    @if($type == 'edit')
                        Edit Data Of Testimonial : {{ $statistic->title }}
                    @else
                        {{__('categories.add_new')}}
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Title *</label>
                    <div class="col-lg-6">
                        {{ Form::text('title', null, ['placeholder' => 'Title','class' => ($errors->has('title')) ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Value *</label>
                    <div class="col-lg-6">
                        {{ Form::text('value', null, ['placeholder' => 'value','class' => ($errors->has('value')) ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('value') }}</div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn font-weight-bold btn-primary mr-2">{{__('sidebar.save')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
