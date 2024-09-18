@extends('backend.layouts.layout')
@section('title','Courses')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Programs</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard.index') }}" class="text-muted">{{__('home.title')}}</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('courses.index') }}"
                                   class="text-muted">Programs</a>
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
                            <h3 class="card-label">Courses</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{route('courses.create')}}" class="btn btn-primary font-weight-bolder">
	<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
            viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" cx="9" cy="15" r="6"/>
        <path
            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span> {{__('categories.add_new')}}
                            </a>
                            <!--end::Button-->
                        </div>
                    </div>


                    <div class="card-body">
                        @if (\App\Models\Course::count() > 0)
                            <!--begin: Datatable-->
                            <table class="table table-bordered table-hover" id="myTable"
                                   style="margin-top: 13px !important">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Duration</th>
                                    <th>Started at</th>
                                    <th>Is Ready</th>
                                    <th>created at</th>
                                    <th>Actions</th>
                                    <th>Move to Top</th> <!-- New Column for "Move to Top" -->
                                    <th></th>
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
@endsection

@section('Script')
    <script>
        $(document).ready(function () {
            var ajaxUrl = "courses";

            var data = [
                {data: 'id'},
                {data: 'title'},
                {data: 'image'},
                {data: 'duration'},
                {data: 'started_at'},
                {data: 'isReady'},
                {data: 'created_at'},
                {data: 'actions'},
                {
                    data: 'id', // Move to Top column
                    render: function (data, type, row, meta) {
                        return '<a href="/admins/moveToTop/' + data + '" class="btn btn-sm btn-warning">Move to Top</a>';
                    }
                },
                {
                    data: 'id', // Move to Top column
                    render: function (data, type, row, meta) {
                        return `<a href="/admin/courses/toggle-show/${data}" class="btn btn-sm ${row.doesShow ? 'btn-success' : 'btn-danger'}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg></a>`;
                    }
                }
            ];
            _DataTableHandler(ajaxUrl, data);
        });
    </script>
@endsection
