@extends('backend.layouts.layout')
@section('title','Courses')
@section('content')
@php
        $courses = \App\Models\Applicant::select('course')->distinct()->get();
        $retes = \App\Models\Applicant::select('rate')->distinct()->get();
        $countrys = \App\Models\Applicant::select('country')->distinct()->get();
@endphp
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Applicants
                        </h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard.index') }}" class="text-muted">{{__('home.title')}}</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('applicants.index') }}"
                                   class="text-muted">Applicants</a>
                            </li>

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->

            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
											<span class="card-icon">
												<i class="flaticon2-favourite text-primary"></i>
											</span>
                            <h3 class="card-label">Applicants</h3>
                        </div>
                    </div>


                    <div class="card-body">
                        <form id="exportForm" class="kt-form kt-form--fit mb-15" method="post"
                              action="{{ route('applicants.export') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-md-9 col-sm-12">
                                    <div class="input-group date">
                                        {!! Form::text('start_date', request()->start_date, ['id' => 'start_date', 'class' => 'form-control kt_datepicker_3_modal', 'readonly' => true, 'placeholder' => 'Start Date']) !!}
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-9 col-sm-12">
                                    <div class="input-group date">
                                        {!! Form::text('end_date', request()->end_date, ['id' => 'end_date', 'class' => 'form-control kt_datepicker_3_modal', 'readonly' => true, 'placeholder' => 'End Date']) !!}
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-9 col-sm-12">
                                    <select id="course_filter" class="form-control">
                                        <option value="">All Courses</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->course }}">{{ $course->course }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-9 col-sm-12">
                                    <select id="rete_filter" class="form-control">
                                        <option value="">Any retes</option>
                                        @foreach($retes as $rate)
                                            <option value="{{ $rate->rate }}">{{ $rate->rate }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-9 col-sm-12 mt-4">
                                    <select id="country_filter" class="form-control">
                                        <option value="">All countries</option>
                                        @foreach($countrys as $country)
                                            <option value="{{ $country->country }}">{{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-9 col-sm-12 mt-4">
                                        <select id="gender_filter" name="gender" id="gender" class="form-control">
                                        <option value="">Any Gender</option>
                                            <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Male</option>
                                            <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Female</option>
                                        </select>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <button onclick="preventDefault()" id="exportFormButton"
                                            class="btn btn-success btn-lg w-100">
                                        Export
                                        <i class="fas fa-file-export"></i>
                                    </button>
                                </div>
                            </div>
                        </form>


                        @if (\App\Models\Applicant::count() > 0)
                            <!--begin: Datatable-->
                            <table class="table table-bordered table-hover" id="myTable"
                                   style="margin-top: 13px !important">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Created at</th>
                                    <th>Rate</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                            <!--end: Datatable-->
                        @else
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <i data-feather="info" class="alert-icon"></i>
                                <span class="alert-text">{{__('sidebar.no_data_to_show')}}</span>
                            </div>
                        @endif

                    </div>

                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!-- Modal for adding rate -->
    <div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="rateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rateModalLabel">Add Rating</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="ratingForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="10" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Rating</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('Script')
    <script>
$(document).ready(function () {
    var table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 25,
        order: [],
        ajax: {
            url: "{{ route('applicants.datatable') }}",
            data: function (d) {
                d.start_date = $('#start_date').val();
                d.end_date = $('#end_date').val();
                d.course = $('#course_filter').val(); // Get the selected course
                d.gender = $('#gender_filter').val(); // Get the selected course
                d.rate = $('#rete_filter').val(); // Get the selected course
                d.country = $('#country_filter').val(); // Get the selected course
            }
        },
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'phone'},
            {data: 'email'},
            {data: 'course'},
            {data: 'created_at'},
            {data: 'rate'},
        ],
        order: [[5, 'desc']]
    });

    $('#start_date, #end_date, #course_filter, #gender_filter, #rete_filter, #country_filter').on('change', function () {
        table.draw(); // Redraw the table when filters change
    });
});
    </script>
@endsection
