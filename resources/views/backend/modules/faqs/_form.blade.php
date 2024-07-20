<!--begin::Entry-->
<div class="d-flex flex-column-fluid" id="kt_form_1">
    <!--begin::Container-->
    <div class=" container ">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    @if($type == 'edit')
                        {{__('categories.edit_category') }} : {{ $faq->question }}
                    @else
                        {{__('categories.add_new')}}
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Question *</label>
                    <div class="col-lg-6">
                        {{ Form::text('question', null, ['placeholder' => 'Question','class' => ($errors->has('question')) ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('question') }}</div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-sm-12 text-right">Answer *</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        {{ Form::textarea('answer', null, ['placeholder' => 'Answer', 'class' => $errors->has('answer') ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('answer') }}</div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-2">
                        <button type="submit"
                                class="btn font-weight-bold btn-primary mr-2">{{__('sidebar.save')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
