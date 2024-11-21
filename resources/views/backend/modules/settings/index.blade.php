@extends('backend.layouts.layout')
@section('title', __('settings.title'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('settings.title') }}</h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard.index') }}" class="text-muted">{{ __('home.title') }}</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('settings.index') }}" class="text-muted">{{ __('settings.title') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::model($settingsArray, ['route' => ['settings.store'], 'enctype' => 'multipart/form-data']) !!}
        <div class="d-flex flex-column-fluid" id="kt_form_1">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('settings.title') }}</h3>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab"
                                    href="#site-info">{{ __('Site Information') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#shape-section">{{ __('Shape Section') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#our-aim">{{ __('Our Aim Section') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#how-it-works">{{ __('How It Works') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab"
                                    href="#never-miss-update">{{ __('Never Miss Any
                                                                                                                                                                                                                                                        Update') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#toggle-sections-2">Toggle Sections</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#presedent-word-sections">President info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#about-sections">About info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#privacy-policy">Privacy policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#terms-and-conditions">terms and conditions</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-3">
                            <div id="site-info" class="tab-pane active">
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12 text-right">{{ __('Site Name') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('site_name', $settingsArray['site_name']['value'] ?? null, [
                                            'placeholder' => __('Site Name'),
                                            'class' => $errors->has('site_name') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('site_name') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Logo *</label>
                                    <div class="col-lg-6">
                                        <div class="image-input image-input-outline image-input-circle" id="kt_image_1">
                                            <div class="image-input-wrapper"
                                                style="background-image: url({{ $settingsArray['logo']['media_url'] ?? asset('/assets/media/logo-placeholder.png') }})">
                                            </div>
                                            <label
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="change" data-toggle="tooltip" title="Change logo">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <!-- Replace the HTML input with Laravel Form::file() method -->
                                                {{ Form::file('logo', [
                                                    'class' => 'd-none',
                                                    'accept' => '.png, .jpg,
                                                                                                                                                                                                                                                                                                                                            .jpeg',
                                                ]) }}
                                                <span data-original-title="Upload logo"
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow">
                                                    <i class="ki ki-bold-upload icon-xs text-muted"></i>
                                                </span>
                                            </label>
                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="cancel" data-toggle="tooltip" title="Cancel logo">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div id="shape-section" class="tab-pane">
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12 text-right">{{ __('Shape Section Title') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('shape_section_title', $settingsArray['shape_section_title']['value'] ?? null, [
                                            'placeholder' => __('Title'),
                                            'class' => $errors->has('shape_section_title') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('shape_section_title') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12 text-right">{{ __('Shape Section
                                                                                                                                                                                                                                                                                    Description') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea('shape_section_description', $settingsArray['shape_section_description']['value'] ?? null, [
                                            'placeholder' => __('Description'),
                                            'class' => $errors->has('shape_section_description') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('shape_section_description') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12 text-right">{{ __('Shape Section Title (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('shape_section_title_ar', $settingsArray['shape_section_title_ar']['value'] ?? null, [
                                            'placeholder' => __('Title (AR)'),
                                            'class' => $errors->has('shape_section_title_ar') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('shape_section_title_ar') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12 text-right">{{ __('Shape Section Description (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'shape_section_description_ar',
                                            $settingsArray['shape_section_description_ar']['value'] ?? null,
                                            [
                                                'placeholder' => __('Description (AR)'),
                                                'class' => $errors->has('shape_section_description_ar') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('shape_section_description_ar') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Shape Section Image
                                        *</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_image_2">
                                            <div class="image-input-wrapper"
                                                style="background-image: url({{ $settingsArray['shape_section_image']['media_url'] ?? asset('/assets/media/users/blank.png') }})">
                                            </div>
                                            <label
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="change" data-toggle="tooltip" title=""
                                                data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                {{ Form::file('shape_section_image', ['accept' => '.png, .jpg, .jpeg']) }}
                                            </label>
                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div id="our-aim" class="tab-pane">

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('OUR AIM Title') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('our_aim_title', $settingsArray['our_aim_title']['value'] ?? null, [
                                            'placeholder' => __('Title'),
                                            'class' => $errors->has('our_aim_title') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('our_aim_title') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('OUR AIM Description') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea('our_aim_description', $settingsArray['our_aim_description']['value'] ?? null, [
                                            'placeholder' => __('Description'),
                                            'class' => $errors->has('our_aim_description')
                                                ? 'form-control
                                                                                                                                                                                                                                                                                    is-invalid'
                                                : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('our_aim_description') }}</div>
                                    </div>
                                </div>

                                <div id="main-majors-description" class="tab-pane">
                                    <div class="form-group row">
                                        <label
                                            class="col-form-label col-lg-3 col-sm-12">{{ __('Main Majors Description') }}</label>
                                        <div class="col-lg-7 col-md-9 col-sm-12">
                                            {{ Form::textarea('main_majors_description', $settingsArray['main_majors_description']['value'] ?? null, [
                                                'placeholder' => __('Description'),
                                                'class' => $errors->has('main_majors_description') ? 'form-control is-invalid' : 'form-control',
                                            ]) }}
                                            <div class="invalid-feedback">{{ $errors->first('main_majors_description') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="online-courses-description" class="tab-pane">
                                    <div class="form-group row">
                                        <label
                                            class="col-form-label col-lg-3 col-sm-12">{{ __('Online Courses Description') }}</label>
                                        <div class="col-lg-7 col-md-9 col-sm-12">
                                            {{ Form::textarea('online_courses_description', $settingsArray['online_courses_description']['value'] ?? null, [
                                                'placeholder' => __('Description'),
                                                'class' => $errors->has('online_courses_description') ? 'form-control is-invalid' : 'form-control',
                                            ]) }}
                                            <div class="invalid-feedback">
                                                {{ $errors->first('online_courses_description') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="masterclass" class="tab-pane">
                                    <div class="form-group row">
                                        <label
                                            class="col-form-label col-lg-3 col-sm-12">{{ __('Masterclass Description') }}</label>
                                        <div class="col-lg-7 col-md-9 col-sm-12">
                                            <textarea name="masterclass_description" id="" cols="30" rows="10"
                                                value="{{ $settingsArray['masterclass_description'] ? $settingsArray['masterclass_description']['value'] : null }}"
                                                class="form-control"></textarea>
                                            <div class="invalid-feedback">{{ $errors->first('masterclass_description') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('OUR AIM Title (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('our_aim_title_ar', $settingsArray['our_aim_title_ar']['value'] ?? null, [
                                            'placeholder' => __('Title (AR)'),
                                            'class' => $errors->has('our_aim_title_ar') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('our_aim_title_ar') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('OUR AIM Description (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea('our_aim_description_ar', $settingsArray['our_aim_description_ar']['value'] ?? null, [
                                            'placeholder' => __('Description (AR)'),
                                            'class' => $errors->has('our_aim_description_ar') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('our_aim_description_ar') }}</div>
                                    </div>
                                </div>

                                <div id="main-majors-description" class="tab-pane">
                                    <div class="form-group row">
                                        <label
                                            class="col-form-label col-lg-3 col-sm-12">{{ __('Main Majors Description (AR)') }}</label>
                                        <div class="col-lg-7 col-md-9 col-sm-12">
                                            {{ Form::textarea('main_majors_description_ar', $settingsArray['main_majors_description_ar']['value'] ?? null, [
                                                'placeholder' => __('Description (AR)'),
                                                'class' => $errors->has('main_majors_description_ar') ? 'form-control is-invalid' : 'form-control',
                                            ]) }}
                                            <div class="invalid-feedback">
                                                {{ $errors->first('main_majors_description_ar') }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div id="online-courses-description" class="tab-pane">
                                    <div class="form-group row">
                                        <label
                                            class="col-form-label col-lg-3 col-sm-12">{{ __('Online Courses Description (AR)') }}</label>
                                        <div class="col-lg-7 col-md-9 col-sm-12">
                                            {{ Form::textarea(
                                                'online_courses_description_ar',
                                                $settingsArray['online_courses_description_ar']['value'] ?? null,
                                                [
                                                    'placeholder' => __('Description (AR)'),
                                                    'class' => $errors->has('online_courses_description_ar') ? 'form-control is-invalid' : 'form-control',
                                                ],
                                            ) }}
                                            <div class="invalid-feedback">
                                                {{ $errors->first('online_courses_description_ar') }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div id="masterclass" class="tab-pane">
                                    <div class="form-group row">
                                        <label
                                            class="col-form-label col-lg-3 col-sm-12">{{ __('Masterclass Description (AR)') }}</label>
                                        <div class="col-lg-7 col-md-9 col-sm-12">
                                            <textarea name="masterclass_description_ar" cols="30" rows="10" class="form-control">{{ $settingsArray['masterclass_description_ar']['value'] ?? null }}</textarea>
                                            <div class="invalid-feedback">
                                                {{ $errors->first('masterclass_description_ar') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="how-it-works" class="tab-pane">
                                <!-- How It Works Title and Description -->
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('How It Works Title') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('how_it_works_title', $settingsArray['how_it_works_title']['value'] ?? null, [
                                            'placeholder' => __('Title'),
                                            'class' => $errors->has('how_it_works_title') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('how_it_works_title') }}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('How It Works Description') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea('how_it_works_description', $settingsArray['how_it_works_description']['value'] ?? null, [
                                            'placeholder' => __('Description'),
                                            'class' => $errors->has('how_it_works_description') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('how_it_works_description') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Step One -->
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('Step One Title') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('how_it_works_step_one_title', $settingsArray['how_it_works_step_one_title']['value'] ?? null, [
                                            'placeholder' => __('Step One Title'),
                                            'class' => $errors->has('how_it_works_step_one_title') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('how_it_works_step_one_title') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Step One Description') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'how_it_works_step_one_description',
                                            $settingsArray['how_it_works_step_one_description']['value'] ?? null,
                                            [
                                                'placeholder' => __('Step One Description'),
                                                'class' => $errors->has('how_it_works_step_one_description') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('how_it_works_step_one_description') }}</div>
                                    </div>
                                </div>

                                <!-- Step Two -->
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('Step Two Title') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('how_it_works_step_two_title', $settingsArray['how_it_works_step_two_title']['value'] ?? null, [
                                            'placeholder' => __('Step Two Title'),
                                            'class' => $errors->has('how_it_works_step_two_title') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('how_it_works_step_two_title') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Step Two Description') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'how_it_works_step_two_description',
                                            $settingsArray['how_it_works_step_two_description']['value'] ?? null,
                                            [
                                                'placeholder' => __('Step Two Description'),
                                                'class' => $errors->has('how_it_works_step_two_description') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('how_it_works_step_two_description') }}</div>
                                    </div>
                                </div>

                                <!-- Step Three -->
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('Step Three Title') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text(
                                            'how_it_works_step_three_title',
                                            $settingsArray['how_it_works_step_three_title']['value'] ?? null,
                                            [
                                                'placeholder' => __('Step Three Title'),
                                                'class' => $errors->has('how_it_works_step_three_title') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('how_it_works_step_three_title') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Step Three Description') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'how_it_works_step_three_description',
                                            $settingsArray['how_it_works_step_three_description']['value'] ?? null,
                                            [
                                                'placeholder' => __('Step Three Description'),
                                                'class' => $errors->has('how_it_works_step_three_description') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('how_it_works_step_three_description') }}</div>
                                    </div>
                                </div>

                                <!-- How It Works Title and Description (AR) -->
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('How It Works Title (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('how_it_works_title_ar', $settingsArray['how_it_works_title_ar']['value'] ?? null, [
                                            'placeholder' => __('Title (AR)'),
                                            'class' => $errors->has('how_it_works_title_ar') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('how_it_works_title_ar') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('How It Works Description (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'how_it_works_description_ar',
                                            $settingsArray['how_it_works_description_ar']['value'] ?? null,
                                            [
                                                'placeholder' => __('Description (AR)'),
                                                'class' => $errors->has('how_it_works_description_ar') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('how_it_works_description_ar') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Step One (AR) -->
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Step One Title (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text(
                                            'how_it_works_step_one_title_ar',
                                            $settingsArray['how_it_works_step_one_title_ar']['value'] ?? null,
                                            [
                                                'placeholder' => __('Step One Title (AR)'),
                                                'class' => $errors->has('how_it_works_step_one_title_ar') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('how_it_works_step_one_title_ar') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Step One Description (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'how_it_works_step_one_description_ar',
                                            $settingsArray['how_it_works_step_one_description_ar']['value'] ?? null,
                                            [
                                                'placeholder' => __('Step One Description (AR)'),
                                                'class' => $errors->has('how_it_works_step_one_description_ar') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('how_it_works_step_one_description_ar') }}</div>
                                    </div>
                                </div>

                                <!-- Step Two (AR) -->
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Step Two Title (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text(
                                            'how_it_works_step_two_title_ar',
                                            $settingsArray['how_it_works_step_two_title_ar']['value'] ?? null,
                                            [
                                                'placeholder' => __('Step Two Title (AR)'),
                                                'class' => $errors->has('how_it_works_step_two_title_ar') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('how_it_works_step_two_title_ar') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Step Two Description (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'how_it_works_step_two_description_ar',
                                            $settingsArray['how_it_works_step_two_description_ar']['value'] ?? null,
                                            [
                                                'placeholder' => __('Step Two Description (AR)'),
                                                'class' => $errors->has('how_it_works_step_two_description_ar') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('how_it_works_step_two_description_ar') }}</div>
                                    </div>
                                </div>

                                <!-- Step Three (AR) -->
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Step Three Title (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text(
                                            'how_it_works_step_three_title_ar',
                                            $settingsArray['how_it_works_step_three_title_ar']['value'] ?? null,
                                            [
                                                'placeholder' => __('Step Three Title (AR)'),
                                                'class' => $errors->has('how_it_works_step_three_title_ar') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('how_it_works_step_three_title_ar') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Step Three Description (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'how_it_works_step_three_description_ar',
                                            $settingsArray['how_it_works_step_three_description_ar']['value'] ?? null,
                                            [
                                                'placeholder' => __('Step Three Description (AR)'),
                                                'class' => $errors->has('how_it_works_step_three_description_ar') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('how_it_works_step_three_description_ar') }}</div>
                                    </div>
                                </div>

                            </div>



                            <div id="our-partners" class="tab-pane">

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Our Partners Image') }}</label>
                                    <div class="col-lg-1 col-md-9 col-sm-12">
                                        <div class="image-input image-input-outline" id="kt_image_3">
                                            <div class="image-input-wrapper"
                                                style="background-image: url({{ $settingsArray['partners_image']['media_url'] ?? asset('/assets/media/users/blank.png') }})">
                                            </div>
                                            <label
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="change" data-toggle="tooltip" title="Change Image">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                {{ Form::file('partners_image', ['accept' => '.png, .jpg, .jpeg']) }}
                                            </label>
                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="cancel" data-toggle="tooltip" title="Cancel Image">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div id="never-miss-update" class="tab-pane">
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Never Miss Any Update Title') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        <input type="text" name="never_miss_update_title" class="form-control"
                                            id="never_miss_update_title"
                                            value="{{ $settingsArray['never_miss_update_title'] ? $settingsArray['never_miss_update_title']['value'] : '' }}">
                                        <div class="invalid-feedback">{{ $errors->first('never_miss_update_title') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Never Miss Any Update
                                                                                                                                                                                                                                                                                    Description') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        <textarea name="never_miss_update_description" class="form-control" id="never_miss_update_description"
                                            value="{{ $settingsArray['never_miss_update_description'] ? $settingsArray['never_miss_update_description']['value'] : '' }}">
                                    </textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('never_miss_update_description') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Never Miss Any Update Title (AR) -->
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Never Miss Any Update Title (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        <input type="text" name="never_miss_update_title_ar" class="form-control"
                                            id="never_miss_update_title_ar"
                                            value="{{ isset($settingsArray['never_miss_update_title_ar']) ? $settingsArray['never_miss_update_title_ar']['value'] : '' }}">
                                        <div class="invalid-feedback">{{ $errors->first('never_miss_update_title_ar') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Never Miss Any Update Description (AR) -->
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('Never Miss Any Update Description (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        <textarea name="never_miss_update_description_ar" class="form-control" id="never_miss_update_description_ar">
            {{ isset($settingsArray['never_miss_update_description_ar']) ? $settingsArray['never_miss_update_description_ar']['value'] : '' }}
        </textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('never_miss_update_description_ar') }}</div>
                                    </div>
                                </div>

                            </div>

                            <div id="toggle-sections-2" class="tab-pane">
                                <div class="form-check">
                                    <input type="hidden" name="isShowHero" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowHero"
                                        id="flexCheckDefault1" value="1"
                                        {{ isset($settingsArray['isShowHero']) && $settingsArray['isShowHero']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault1">Show Hero section?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowOurMajor" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowOurMajor"
                                        id="flexCheckChecked2" value="1"
                                        {{ isset($settingsArray['isShowOurMajor']) && $settingsArray['isShowOurMajor']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked2">Show Our Majors?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowOurWorkShops" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowOurWorkShops"
                                        id="isShowOurWorkShops" value="1"
                                        {{ isset($settingsArray['isShowOurWorkShops']) && $settingsArray['isShowOurWorkShops']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="isShowOurWorkShops">Show Our Work Shops?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowPresedintSection" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowPresedintSection"
                                        id="flexCheckChecked22" value="1"
                                        {{ isset($settingsArray['isShowPresedintSection']) && $settingsArray['isShowPresedintSection']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked22">Show Presedint words?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowAbout" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowAbout"
                                        id="flexCheckChecked23" value="1"
                                        {{ isset($settingsArray['isShowAbout']) && $settingsArray['isShowAbout']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked23">Show About?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowOurAim" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowOurAim"
                                        id="flexCheckChecked3" value="1"
                                        {{ isset($settingsArray['isShowOurAim']) && $settingsArray['isShowOurAim']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked3">Show OUR AIM?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowFeaturedCourses" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowFeaturedCourses"
                                        id="flexCheckChecked4" value="1"
                                        {{ isset($settingsArray['isShowFeaturedCourses']) && $settingsArray['isShowFeaturedCourses']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked4">Show Featured Courses?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowHowItworks" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowHowItworks"
                                        id="flexCheckChecked5" value="1"
                                        {{ isset($settingsArray['isShowHowItworks']) && $settingsArray['isShowHowItworks']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked5">Show How It Works?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowStatistics" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowStatistics"
                                        id="flexCheckChecked6" value="1"
                                        {{ isset($settingsArray['isShowStatistics']) && $settingsArray['isShowStatistics']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked6">Show Statistics?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowTestemonials" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowTestemonials"
                                        id="flexCheckChecked6" value="1"
                                        {{ isset($settingsArray['isShowTestemonials']) && $settingsArray['isShowTestemonials']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked6">Show Testemonials?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowOurParteners" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowOurParteners"
                                        id="flexCheckChecked7" value="1"
                                        {{ isset($settingsArray['isShowOurParteners']) && $settingsArray['isShowOurParteners']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked7">Show Our Partners?</label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="isShowNeverMiss" value="0">
                                    <input class="form-check-input" type="checkbox" name="isShowNeverMiss"
                                        id="flexCheckChecked7" value="1"
                                        {{ isset($settingsArray['isShowNeverMiss']) && $settingsArray['isShowNeverMiss']['value'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked7">Show Never miss?</label>
                                </div>
                            </div>

                            <div id="presedent-word-sections" class="tab-pane">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">Persident Phonto *</label>
                                <div class="col-lg-6">
                                    <div class="image-input image-input-outline image-input-circle" id="kt_image_1">
                                        <div class="image-input-wrapper"
                                            style="background-image: url({{ $settingsArray['persident_img']['media_url'] ?? asset('/assets/media/persident_img-placeholder.png') }})">
                                        </div>
                                        <label
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="change" data-toggle="tooltip" title="Change persident_img">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <!-- Replace the HTML input with Laravel Form::file() method -->
                                            {{ Form::file('persident_img', [
                                                'class' => 'd-none',
                                                'accept' => '.png, .jpg,
                                                                                                                                                                                                                                                                                                                .jpeg',
                                            ]) }}
                                            <span data-original-title="Upload persident_img"
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow">
                                                <i class="ki ki-bold-upload icon-xs text-muted"></i>
                                            </span>
                                        </label>
                                        <span
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="cancel" data-toggle="tooltip" title="Cancel persident_img">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('President Name') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text(
                                            'presedent_name',
                                            isset($settingsArray['presedent_name']) && $settingsArray['presedent_name']['value']
                                                ? $settingsArray['presedent_name']['value']
                                                : null,
                                            [
                                                'placeholder' => 'President Name',
                                                'class' => $errors->has('presedent_name') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('presedent_name') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('President Name (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'presedent_word_full_ar',
                                            isset($settingsArray['presedent_word_full_ar']) && is_array($settingsArray['presedent_word_full_ar']) && isset($settingsArray['presedent_word_full_ar']['value'])
                                                ? $settingsArray['presedent_word_full_ar']['value']
                                                : null,
                                            [
                                                'placeholder' => 'President Full word (AR)',
                                                'class' => $errors->has('presedent_word_full_ar') ? 'form-control is-invalid' : 'form-control',
                                            ]
                                        ) }}

                                        <div class="invalid-feedback">
                                            {{ $errors->first('presedent_word_full_ar') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('President Position') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('presedent_position', $settingsArray['presedent_position']['value'] ?? null, [
                                            'placeholder' => 'President Position',
                                            'class' => $errors->has('presedent_position') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('presedent_position') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('President Position (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text('presedent_position_ar', $settingsArray['presedent_position_ar']['value'] ?? null, [
                                            'placeholder' => 'President Position (AR)',
                                            'class' => $errors->has('presedent_position_ar') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('presedent_position_ar') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('President Part word') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea('presedent_word_part', $settingsArray['presedent_word_part']['value'] ?? null, [
                                            'placeholder' => 'President Part word',
                                            'class' => $errors->has('presedent_word_part') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('presedent_word_part') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('President Part word (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea('presedent_word_part_ar', $settingsArray['presedent_word_part_ar']['value'] ?? null, [
                                            'placeholder' => 'President Part word (AR)',
                                            'class' => $errors->has('presedent_word_part_ar') ? 'form-control is-invalid' : 'form-control',
                                        ]) }}
                                        <div class="invalid-feedback">{{ $errors->first('presedent_word_part_ar') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('President Full word') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'presedent_word_full',
                                            isset($settingsArray['presedent_word_full']) && $settingsArray['presedent_word_full']['value']
                                                ? $settingsArray['presedent_word_full']['value']
                                                : null,
                                            [
                                                'placeholder' => 'President Full word',
                                                'class' => $errors->has('presedent_word_full') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('presedent_word_full') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12">{{ __('President Full word (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'presedent_word_full_ar',
                                            isset($settingsArray['presedent_word_full_ar']) && is_array($settingsArray['presedent_word_full_ar']) && isset($settingsArray['presedent_word_full_ar']['value'])
                                                ? $settingsArray['presedent_word_full_ar']['value']
                                                : null,
                                            [
                                                'placeholder' => 'President Full word (AR)',
                                                'class' => $errors->has('presedent_word_full_ar') ? 'form-control is-invalid' : 'form-control',
                                            ]
                                        ) }}

                                        <div class="invalid-feedback">
                                            {{ $errors->first('presedent_word_full_ar') }}
                                        </div>
                                                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div id="about-sections" class="tab-pane">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('UMA Vision') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'uma_vision',
                                            isset($settingsArray['uma_vision']) && $settingsArray['uma_vision']['value']
                                                ? $settingsArray['uma_vision']['value']
                                                : null,
                                            ['placeholder' => 'UMA Vision', 'class' => $errors->has('uma_vision') ? 'form-control is-invalid' : 'form-control'],
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('uma_vision') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('UMA Vision (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'uma_vision_ar',
                                            isset($settingsArray['uma_vision_ar']) && is_array($settingsArray['uma_vision_ar']) && isset($settingsArray['uma_vision_ar']['value'])
                                                ? $settingsArray['uma_vision_ar']['value']
                                                : null,
                                            [
                                                'placeholder' => 'UMA Vision (AR)',
                                                'class' => $errors->has('uma_vision_ar') ? 'form-control is-invalid' : 'form-control',
                                            ]
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('uma_vision_ar') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('UMA Mission') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'uma_mission',
                                            isset($settingsArray['uma_mission']) && $settingsArray['uma_mission']['value']
                                                ? $settingsArray['uma_mission']['value']
                                                : null,
                                            [
                                                'placeholder' => 'UMA Mission',
                                                'class' => $errors->has('uma_mission') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('uma_mission') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('UMA Mission (AR)') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::textarea(
                                            'uma_mission_ar',
                                            isset($settingsArray['uma_mission_ar']) && is_array($settingsArray['uma_mission_ar']) && isset($settingsArray['uma_mission_ar']['value'])
                                                ? $settingsArray['uma_mission_ar']['value']
                                                : null,
                                            [
                                                'placeholder' => 'UMA Mission (AR)',
                                                'class' => $errors->has('uma_mission_ar') ? 'form-control is-invalid' : 'form-control',
                                            ]
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('uma_mission_ar') }}</div>
                                    </div>
                                </div>

                                <!-- Social Links Section -->
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('Facebook Link') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text(
                                            'facebook_link',
                                            isset($settingsArray['facebook_link']) && $settingsArray['facebook_link']['value']
                                                ? $settingsArray['facebook_link']['value']
                                                : null,
                                            [
                                                'placeholder' => 'Facebook Link',
                                                'class' => $errors->has('facebook_link') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('facebook_link') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('Twitter Link') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text(
                                            'twitter_link',
                                            isset($settingsArray['twitter_link']) && $settingsArray['twitter_link']['value']
                                                ? $settingsArray['twitter_link']['value']
                                                : null,
                                            [
                                                'placeholder' => 'Twitter Link',
                                                'class' => $errors->has('twitter_link') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('twitter_link') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('linkedin Link') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text(
                                            'linkedin_link',
                                            isset($settingsArray['linkedin_link']) && is_array($settingsArray['linkedin_link']) && isset($settingsArray['linkedin_link']['value'])
                                                ? $settingsArray['linkedin_link']['value']
                                                : null,
                                            [
                                                'placeholder' => 'LinkedIn Link',
                                                'class' => $errors->has('linkedin_link') ? 'form-control is-invalid' : 'form-control',
                                            ]
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('linkedin_link') }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('Instagram Link') }}</label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        {{ Form::text(
                                            'instagram_link',
                                            isset($settingsArray['instagram_link']) && $settingsArray['instagram_link']['value']
                                                ? $settingsArray['instagram_link']['value']
                                                : null,
                                            [
                                                'placeholder' => 'Instagram Link',
                                                'class' => $errors->has('instagram_link') ? 'form-control is-invalid' : 'form-control',
                                            ],
                                        ) }}
                                        <div class="invalid-feedback">{{ $errors->first('instagram_link') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div id="privacy-policy" class="tab-pane">

                                <div class="form-group row">

                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('Privacy Policy') }}</label>

                                    <div class="col-lg-7 col-md-9 col-sm-12">

                                        {{ Form::textarea('privacy_policy', isset($settingsArray['privacy_policy']) && $settingsArray['privacy_policy']['value'] ? $settingsArray['privacy_policy']['value'] : null, ['placeholder' => 'Privacy Policy', 'class' => $errors->has('privacy_policy') ? 'form-control is-invalid' : 'form-control', 'id' => 'privacy_policy_editor']) }}

                                        <div class="invalid-feedback">{{ $errors->first('privacy_policy') }}</div>

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('Privacy Policy (AR)') }}</label>

                                    <div class="col-lg-7 col-md-9 col-sm-12">

                                        {{ Form::textarea(
                                            'privacy_policy_ar',
                                            isset($settingsArray['privacy_policy_ar']) && is_array($settingsArray['privacy_policy_ar']) && isset($settingsArray['privacy_policy_ar']['value'])
                                                ? $settingsArray['privacy_policy_ar']['value']
                                                : null,
                                            [
                                                'placeholder' => 'Privacy Policy (AR)',
                                                'class' => $errors->has('privacy_policy_ar') ? 'form-control is-invalid' : 'form-control',
                                                'id' => 'privacy_policy_ar_editor'
                                            ]
                                        ) }}

                                        <div class="invalid-feedback">{{ $errors->first('privacy_policy_ar') }}</div>

                                    </div>

                                </div>

                            </div>
                            <div id="terms-and-conditions" class="tab-pane">

                                <div class="form-group row">

                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('Terms and Conditions') }}</label>

                                    <div class="col-lg-7 col-md-9 col-sm-12">

                                        {{ Form::textarea('terms_and_conditions', isset($settingsArray['terms_and_conditions']) && isset($settingsArray['terms_and_conditions']['value']) ? $settingsArray['terms_and_conditions']['value'] : null, ['placeholder' => 'Terms and Conditions', 'class' => $errors->has('terms_and_conditions') ? 'form-control is-invalid' : 'form-control', 'id' => 'terms_and_conditions_editor']) }}

                                        <div class="invalid-feedback">{{ $errors->first('terms_and_conditions') }}</div>

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label class="col-form-label col-lg-3 col-sm-12">{{ __('Terms and Conditions (AR)') }}</label>

                                    <div class="col-lg-7 col-md-9 col-sm-12">

                                        {{ Form::textarea('terms_and_conditions_ar', isset($settingsArray['terms_and_conditions_ar']) && isset($settingsArray['terms_and_conditions_ar']['value']) ? $settingsArray['terms_and_conditions_ar']['value'] : null, ['placeholder' => 'Terms and Conditions (AR)', 'class' => $errors->has('terms_and_conditions_ar') ? 'form-control is-invalid' : 'form-control', 'id' => 'terms_and_conditions_ar_editor']) }}

                                        <div class="invalid-feedback">{{ $errors->first('terms_and_conditions_ar') }}</div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-2">
                                <button type="submit"
                                    class="btn font-weight-bold btn-primary mr-2">{{ __('sidebar.save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('Script')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('privacy_policy_editor');

CKEDITOR.replace('privacy_policy_ar_editor');

CKEDITOR.replace('terms_and_conditions_editor');

CKEDITOR.replace('terms_and_conditions_ar_editor');

CKEDITOR.replace('about_editor');

CKEDITOR.replace('about_ar_editor');
</script>
@endsection
