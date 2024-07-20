@extends('backend.layouts.layout')
@section('title', 'عرض بيانات المتقدم')
@section('Style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5"> Show applicant data
                            : {{ $user->name }}</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Applicants</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Details</a>
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
    </div>
    <div class="d-flex flex-column-fluid mb-4" id="course_wrapper">
        <!--begin::Container-->
        <div class=" container ">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        {{__('categories.add_new')}}
                    </h3>
                </div>
                <div class="card-body">
                    <h2>Personal Info</h2>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Applicant Name *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->name}}" disabled >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Applicant Date of Brith *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->dob}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Applicant Gender *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->gender == 1 ? "Male" : "Female"}}" disabled>
                        </div>
                    </div>
                    <h2>Contact Info</h2>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Applicant Phone *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->phone}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Applicant Email *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->email}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Applicant Country *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->country}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Applicant Governante / Province *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->governante}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Applicant Address *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->address}}" disabled>
                        </div>
                    </div>
                    <h2>Educational background</h2>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Highest Qualification *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->qualification}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Institutions Attended *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->attended}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Year of Graduation *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->graduation}}" disabled>
                        </div>
                    </div>
                    <h2>More Info</h2>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Previous Education *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->prev_education}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Current / Most Recent Job Title *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->job}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Company / Organization Name *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->organization_name}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Duration of Employment *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->duration_of_employment}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Relevant Courses or subjects studied *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->subject_studied}}" disabled>
                        </div>
                    </div>
                    <h2>Answers</h2>
                    @foreach ($user->answers as $item)
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
                            <div class="col-lg-6">
                                <h3>{{ $item->question_txt }}</h3>
                                @if($item->hasMedia())
                                    <a href="{{ $item->getFirstMediaUrl() }}" download class="btn btn-success">Download Video</a>
                                @else
                                    {{ $item->answer }}
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Created at *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{{$user->created_at->format('Y-m-d')}}" disabled>
                        </div>
                    </div>
                    <form id="ratingForm">
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Applicant Rate *</label>
                            <div class="col-lg-6">
                                <input placeholder="Rate" class="form-control" name="rating" id="rating" type="number" value="{{$user->rate}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-2">
                                <button type="submit"
                                        class="btn font-weight-bold btn-primary mr-2">Save Rating</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("Script")
<script>
    $('#ratingForm').submit(function (e) {
    e.preventDefault();
    var applicantId = "{{$user->id}}";
    var rating = $('#rating').val();

    $.ajax({
        type: 'POST',
        url: "{{ route('applicants.updateRating') }}",
        data: {
            applicant_id: applicantId,
            rating: rating,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            window.location.href = "/admin/applicants"
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
</script>
@endsection
