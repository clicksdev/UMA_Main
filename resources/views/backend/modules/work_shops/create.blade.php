@extends('backend.layouts.layout')
@section('title', 'Add New')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Add New</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard.index') }}" class="text-muted">{{ __('home.title') }}</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('work_shops.index') }}" class="text-muted">Work Shops</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                    <a href="" class="text-muted">Add New</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Entry-->
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid mb-4" id="course_wrapper">
        <!--begin::Container-->
        <div class=" container ">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        Add New
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Title *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title" class="form-control" name="title" type="text" v-model="title">
                            <div class="invalid-feedback" :style="{ display: this.errors['title'] ? 'block' : null }">
                                @{{ this.errors["title"] ? this.errors["title"][0] : '' }}
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="course_type" id="course_type" value="work_shop" >

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Title (AR) *</label>
                        <div class="col-lg-6">
                            <input placeholder="Title (AR)" class="form-control" name="title_ar" type="text"
                                v-model="title_ar">
                            <div class="invalid-feedback" :style="{ display: this.errors['title_ar'] ? 'block' : null }">
                                @{{ this.errors["title_ar"] ? this.errors["title_ar"][0] : '' }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Patches *</label>
                        <div class="col-lg-6">
                          <div v-for="(patch, index) in patches" :key="index" class="patch-item mb-3 d-flex align-items-end">
                            <div class="mr-2">
                              <label class="mr-2">Start Date</label>
                              <input
                                type="date"
                                v-model="patch.start_at"
                                class="form-control form-control-sm mr-2"
                              />
                            </div>
                            <div class="mr-2">
                              <label class="mr-2">End Date</label>
                              <input
                                type="date"
                                v-model="patch.end_at"
                                class="form-control form-control-sm mr-2"
                              />
                            </div>
                            <button
                              @click="removePatch(index)"
                              class="btn btn-danger btn-sm"
                            >
                              Remove
                            </button>
                          </div>

                          <button
                            @click="addPatch"
                            class="btn btn-primary mt-2"
                          >
                            Add Patch
                          </button>
                        </div>
                      </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Brief</label>
                        <div class="col-lg-6">
                            <input placeholder="Brief" class="form-control" name="brief" type="text" v-model="brief">
                            <div class="invalid-feedback" :style="{ display: this.errors['brief'] ? 'block' : null }">
                                @{{ this.errors["brief"] ? this.errors["brief"][0] : '' }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Brief (AR)</label>
                        <div class="col-lg-6">
                            <input placeholder="Brief (AR)" class="form-control" name="brief_ar" type="text"
                                v-model="brief_ar">
                            <div class="invalid-feedback" :style="{ display: this.errors['brief_ar'] ? 'block' : null }">
                                @{{ this.errors["brief_ar"] ? this.errors["brief_ar"][0] : '' }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Overview *</label>
                        <div class="col-lg-6">
                            <textarea placeholder="Overview" class="form-control" name="overview" v-model="overview"></textarea>
                            <div class="invalid-feedback" :style="{ display: this.errors['overview'] ? 'block' : null }">
                                @{{ this.errors["overview"] ? this.errors["overview"][0] : '' }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Overview (AR) *</label>
                        <div class="col-lg-6">
                            <textarea placeholder="Overview (AR)" class="form-control" name="overview_ar" v-model="overview_ar"></textarea>
                            <div class="invalid-feedback" :style="{ display: this.errors['overview_ar'] ? 'block' : null }">
                                @{{ this.errors["overview_ar"] ? this.errors["overview_ar"][0] : '' }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Duration *</label>
                        <div class="col-lg-6">
                            <input placeholder="Duration in hours" class="form-control" name="duration" type="number"
                                v-model="duration">
                            <div class="invalid-feedback" :style="{ display: this.errors['duration'] ? 'block' : null }">
                                @{{ this.errors["duration"] ? this.errors["duration"][0] : '' }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Started at</label>
                        <div class="col-lg-6">
                            <input placeholder="Started at" class="form-control" name="started_at" type="date"
                                v-model="started_at">
                            <div class="invalid-feedback"
                                :style="{ display: this.errors['started_at'] ? 'block' : null }">@{{ this.errors["started_at"] ? this.errors["started_at"][0] : '' }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Availability</label>
                        <div class="col-lg-6">
                            <select name="availability" id="availability" class="form-control" v-model="isReady">
                                <option :value="1">Abilable</option>
                                <option :value="0">Coming Soon</option>
                            </select>
                            <div class="invalid-feedback" :style="{ display: this.errors['isReady'] ? 'block' : null }">
                                @{{ this.errors["isReady"] ? this.errors["isReady"][0] : '' }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Objectives</label>
                        <div class="col-lg-6">
                            <div class="d-flex" style="gap: 8px">
                                <input type="text" name="course_objectives" id="course_objectives"
                                    class="form-control" v-model="current_objective_text"
                                    @keyup.enter="handleAddObjective" placeholder="Objective (En)">
                                <input type="text" name="course_objectives" id="course_objectives" placeholder="Objective (AR)"
                                    class="form-control" v-model="current_objective_text_ar"
                                    @keyup.enter="handleAddObjective">
                                <button class="btn btn-secondary" @click="handleAddObjective">Add</button>
                            </div>
                            <div class="objectives w-100 mt-3"
                                style="display: flex; gap: 8px; white-space: nowrap; flex-wrap: wrap">
                                <span v-for="obj, index in objectives" :key="obj.id" class="text-secondary"
                                    style="font-size: 16px">
                                    @{{ obj.en }} <br>@{{ obj.ar }} <button class="text-danger"
                                        style="background: transparent;border: none"
                                        @click="handleRemoveObjective(index)">x</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Questions</label>
                        <div class="col-lg-6">
                            <div style="gap: 8px; display: flex; flex-direction: column">
                                <input type="text" name="course_questions" placeholder="question"
                                    id="course_questions" class="form-control" v-model="current_question_text"
                                    @keyup.enter="handleAddQuestion">
                                <input type="text" name="course_questions_ar" placeholder="question (AR)"
                                    id="course_questions_ar" class="form-control" v-model="current_question_text_ar"
                                    @keyup.enter="handleAddQuestion">
                                <input type="text" name="note" id="course_questions" placeholder="note"
                                    class="form-control" v-model="current_note_text">
                                <input type="text" name="note" id="course_questions" placeholder="note (AR)"
                                    class="form-control" v-model="current_note_text_ar">
                                <select name="type" id="type" class="form-control" v-model="current_type">
                                    <option value="1">Text</option>
                                    <option value="2">File</option>
                                    <option value="3">Video</option>
                                    <option value="4">MCQ</option>
                                </select>
                                <button class="btn btn-secondary" @click="handleAddQuestion">Add</button>
                            </div>

                            <!-- Conditionally display options input fields if MCQ is selected -->
                            <div v-if="current_type == 4" class="mt-3">
                                <div v-for="(option, index) in current_options" :key="index"
                                    class="d-flex align-items-center mb-2" style="gap: 8px">
                                    <input type="text" class="form-control" placeholder="Option text"
                                        v-model="current_options[index]['en']">
                                    <input type="text" class="form-control" placeholder="Option text (AR)"
                                        v-model="current_options[index]['ar']">
                                    <button class="btn btn-danger" @click="removeOption(index)">Remove</button>
                                </div>
                                <button class="btn btn-primary mt-2" @click="addOption">Add Option</button>
                            </div>

                            <div class="questions w-100 mt-3" style="display: flex; gap: 8px; flex-wrap: wrap">
                                <span v-for="(obj, index) in questions" :key="obj.id" class="text-secondary"
                                    style="font-size: 16px">
                                    @{{ obj.question }} <br /> @{{ obj.question_ar }} <button class="text-danger"
                                        style="background: transparent;border: none"
                                        @click="handleRemoveQuestion(index)">x</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Image *</label>
                        <div class="col-lg-6">
                            <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                <div class="image-input-wrapper"
                                    style="background-image: url({{ asset('/assets/media/logo-placeholder.png') }})">
                                    <img :src="image ? getUri(image) : ''" v-if="image" alt=""
                                        style="width: 100%;height: 100%;object-fit: cover;border-radius: 50%;">
                                </div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title=""
                                    data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input accept=".png, .jpg, .jpeg" name="image" id="course_image" type="file"
                                        @change="handleChangeCourseImage">
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback" :style="{ display: this.errors['image'] ? 'block' : null }">
                                @{{ this.errors["image"] ? this.errors["image"][0] : '' }}</div>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <h2>Levels</h2>
                        <button class="btn btn-success" @click="handleAddLevel">Add Level</button>
                    </div>

                    <div v-for="level, index in levels" :key="index">
                        <div class="form-group row mt-2">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Title</label>
                            <div class="col-lg-6">
                                <input placeholder="Level title" class="form-control" name="title" type="text"
                                    v-model="levels[index]['title']">
                                {{-- <div class="invalid-feedback" :style="{ display: this.errors['started_at'] ? 'block' : null }" >@{{ this.errors["started_at"] ? this.errors["started_at"][0] : '' }}</div> --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Title (AR)</label>
                            <div class="col-lg-6">
                                <input placeholder="Level title (AR)" class="form-control" name="title_ar"
                                    type="text" v-model="levels[index]['title_ar']">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Overview</label>
                            <div class="col-lg-6">
                                <input placeholder="Level overview" class="form-control" name="overview" type="text"
                                    v-model="levels[index]['overview']">
                                {{-- <div class="invalid-feedback" :style="{ display: this.errors['started_at'] ? 'block' : null }" >@{{ this.errors["started_at"] ? this.errors["started_at"][0] : '' }}</div> --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Overview (AR)</label>
                            <div class="col-lg-6">
                                <input placeholder="Level overview (AR)" class="form-control" name="overview_ar"
                                    type="text" v-model="levels[index]['overview_ar']">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Duration</label>
                            <div class="col-lg-6">
                                <input placeholder="Level duration" class="form-control" name="duration" type="number"
                                    v-model="levels[index]['duration']">
                                {{-- <div class="invalid-feedback" :style="{ display: this.errors['started_at'] ? 'block' : null }" >@{{ this.errors["started_at"] ? this.errors["started_at"][0] : '' }}</div> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Sessions</label>
                            <div class="col-lg-6">
                                <input placeholder="Number of sessions" class="form-control" name="sessions"
                                    type="number" v-model="levels[index]['num_sessions']">
                                {{-- <div class="invalid-feedback" :style="{ display: this.errors['started_at'] ? 'block' : null }" >@{{ this.errors["started_at"] ? this.errors["started_at"][0] : '' }}</div> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Objectives</label>
                            <div class="col-lg-6">
                                <div class="d-flex" style="gap: 8px">
                                    <input type="text" name="course_objectives" id="course_objectives"
                                        class="form-control" v-model="levels[index]['current_objective_text']" placeholder="Objective (EN)"
                                        @keyup.enter="handleAddObjectiveLevel(index)">
                                    <input type="text" name="course_objectives" id="course_objectives"
                                        class="form-control" v-model="levels[index]['current_objective_text_ar']" placeholder="Objective (AR)"
                                        @keyup.enter="handleAddObjectiveLevel(index)">
                                    <button class="btn btn-secondary" @click="handleAddObjectiveLevel(index)">Add</button>
                                </div>
                                <div class="objectives w-100 mt-3"
                                    style="display: flex; gap: 8px; white-space: nowrap; flex-wrap: wrap">
                                    <span
                                        v-for="obj, i in (levels[index] && levels[index]['objectives'] ? levels[index]['objectives'] : [])"
                                        :key="obj.id" class="text-secondary" style="font-size: 16px">
                                        @{{ obj.en }} <br> @{{ obj.ar }} <button class="text-danger"
                                            style="background: transparent;border: none"
                                            @click="handleRemoveObjectiveFromLevel(index, i)">x</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Image *</label>
                            <div class="col-lg-6">
                                <div class="image-input image-input-outline image-input-circle" id="kt_image_3"
                                    @click="this.currentLevelIndex = index">
                                    <div class="image-input-wrapper">
                                        <img :src="levels[index].image ? getUri(levels[index].image) : getBackgroundImage(index)"
                                            alt=""
                                            style="width: 100%;height: 100%;object-fit: cover;border-radius: 50%;">
                                    </div>

                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        @click="this.currentLevelIndex = index" data-action="change"
                                        data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input accept=".png, .jpg, .jpeg" id="course_image"
                                            type="file"@change="handelChangeLevelImage">
                                    </label>

                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                {{-- <div class="invalid-feedback" :style="{ display: this.errors['image'] ? 'block' : null }" >@{{ this.errors["image"] ? this.errors["image"][0] : '' }}</div> --}}
                            </div>
                        </div>
                        <div class="form-group row" v-if="index != 0">
                            <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-danger" @click="handleRemoveLevel(index)">Remove level</button>
                            </div>
                        </div>
                        <hr v-if="index + 1 < levels.length">
                    </div>
                    <div class="pl-5">
                        <div>
                            <!-- Radio buttons for FAQ Type -->
                            <div class="form-group">
                                <label>Choose FAQ Type</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="faqDefault" value="1"
                                            v-model="faqType" />
                                        <label class="form-check-label" for="faqDefault">Default</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="faqCustom" value="2"
                                            v-model="faqType" />
                                        <label class="form-check-label" for="faqCustom">Custom</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Custom FAQ module visible when faqType is '2' -->
                            <div v-if="faqType == 2">
                                <h3>Custom FAQ</h3>
                                <button class="btn btn-primary mb-3" @click="addFaq">Add Question</button>

                                <!-- Loop through custom FAQs -->
                                <div v-for="(faq, index) in faqs" :key="index" class="mb-3">
                                    <div class="form-group">
                                        <label>Question @{{ index + 1 }}</label>
                                        <input type="text" class="form-control" v-model="faq.question"
                                            placeholder="Enter your question" />
                                    </div>
                                    <div class="form-group">
                                        <label>Answer</label>
                                        <textarea class="form-control" v-model="faq.answer" rows="3" placeholder="Enter the answer"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Question (AR) @{{ index + 1 }}</label>
                                        <input type="text" class="form-control" v-model="faq.question_ar"
                                            placeholder="Enter your question in Arabic" />
                                    </div>
                                    <div class="form-group">
                                        <label>Answer (AR)</label>
                                        <textarea class="form-control" v-model="faq.answer_ar" rows="3" placeholder="Enter the answer in arabic"></textarea>
                                    </div>

                                    <!-- Remove FAQ button -->
                                    <button class="btn btn-danger" @click="removeFaq(index)">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2">
                            <button @click="add"
                                class="btn font-weight-bold btn-primary mr-2">{{ __('sidebar.save') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Script')
    <script src="{{ asset('assets/libs/axios.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.js') }}"></script>
    <script src="{{ asset('assets/libs/vue.js') }}"></script>
    <script src="{{ asset('assets/vueJs/createCourse.js') }}?v={{time()}}"></script>
@endsection
