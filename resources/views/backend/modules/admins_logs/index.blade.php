@extends('backend.layouts.layout')
@section('title','Admin Action Logs')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Admin Action Logs</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('dashboard.index') }}" class="text-muted">{{__('home.title')}}</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted">Admin Logs</a>
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
                            <i class="flaticon2-file text-primary"></i>
                        </span>
                        <h3 class="card-label">Admin Action Logs</h3>
                    </div>
                </div>

                @php
                    $logs = \App\Models\HistoryLog::paginate(20);
                @endphp

                <div class="card-body">
                    @if ($logs->count() > 0)
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover" id="logsTable"
                               style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>Admin Name</th>
                                <th>Action</th>
                                <th>Table Name</th>
                                <th>Changes</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                <tr>
                                    <td>
                                        {{ $log->admin->name}}
                                    </td>
                                    <td>{{ $log->action }}</td>
                                    <td>
                                        {{ $log->table_name }}
                                    </td>
                                    <td>
                                        {{ $log->changes }}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($log->created_at)->format('l, jS F Y h:i A') }}
                                    </td>
                                </tr>
                                @endforeach
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

                <div style="margin-left: 4rem">
                    {{ $logs->links() }}
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
@endsection
