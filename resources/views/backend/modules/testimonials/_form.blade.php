<!--begin::Entry-->
<div class="d-flex flex-column-fluid" id="kt_form_1">
    <!--begin::Container-->
    <div class=" container ">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    @if($type == 'edit')
                        {{__('categories.edit_category') }} : {{ $testimonial->title }}
                    @else
                        {{__('categories.add_new')}}
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <!-- English Username -->
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Username *</label>
                    <div class="col-lg-6">
                        {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => ($errors->has('username')) ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                    </div>
                </div>

                <!-- Arabic Username -->
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">اسم المستخدم بالعربية *</label>
                    <div class="col-lg-6">
                        {{ Form::text('username_ar', null, ['placeholder' => 'اسم المستخدم بالعربية', 'class' => ($errors->has('username_ar')) ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('username_ar') }}</div>
                    </div>
                </div>

                <!-- English Program Name -->
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Program Name *</label>
                    <div class="col-lg-6">
                        {{ Form::text('major_name', null, ['placeholder' => 'Major Name', 'class' => ($errors->has('major_name')) ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('major_name') }}</div>
                    </div>
                </div>

                <!-- Arabic Program Name -->
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">اسم البرنامج بالعربية *</label>
                    <div class="col-lg-6">
                        {{ Form::text('major_name_ar', null, ['placeholder' => 'اسم البرنامج بالعربية', 'class' => ($errors->has('major_name_ar')) ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('major_name_ar') }}</div>
                    </div>
                </div>

                <!-- English Title -->
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Title *</label>
                    <div class="col-lg-6">
                        {{ Form::text('title', null, ['placeholder' => 'Title', 'class' => ($errors->has('title')) ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    </div>
                </div>

                <!-- Arabic Title -->
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">العنوان بالعربية *</label>
                    <div class="col-lg-6">
                        {{ Form::text('title_ar', null, ['placeholder' => 'العنوان بالعربية', 'class' => ($errors->has('title_ar')) ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('title_ar') }}</div>
                    </div>
                </div>

                <!-- English Description -->
                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-sm-12 text-right">Description *</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        {{ Form::textarea('description', null, ['placeholder' => 'Description', 'class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    </div>
                </div>

                <!-- Arabic Description -->
                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-sm-12 text-right">الوصف بالعربية *</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        {{ Form::textarea('description_ar', null, ['placeholder' => 'الوصف بالعربية', 'class' => $errors->has('description_ar') ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('description_ar') }}</div>
                    </div>
                </div>

                <!-- Image Input -->
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Image *</label>
                    <div class="col-lg-6">
                        <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                            <div class="image-input-wrapper"
                                 style="background-image: url({{ $type == 'edit' && $testimonial->hasMedia() ? $testimonial->getFirstMediaUrl() : asset('/assets/media/logo-placeholder.png') }})">
                            </div>

                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                   data-action="change" data-toggle="tooltip" title=""
                                   data-original-title="Change avatar">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                {{ Form::file('image', ['accept' => '.png, .jpg, .jpeg']) }}
                            </label>

                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                  data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                        </div>
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
