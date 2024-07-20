<!--begin::Entry-->
<div class="d-flex flex-column-fluid" id="kt_form_1">
    <!--begin::Container-->
    <div class="container">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">
                    @if ($type == 'edit')
                        Edit Admin Data: {{ $admin->name }}
                    @else
                        Add New Admin
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Admin Name *</label>
                    <div class="col-lg-6">
                        {{ Form::text('name', null, ['placeholder' => 'Admin Name *', 'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Email *</label>
                    <div class="col-lg-6">
                        {{ Form::email('email', null, ['placeholder' => 'Email *', 'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Password *</label>
                    <div class="col-lg-6">
                        {{ Form::password('password', ['placeholder' => 'Password *', 'class' => 'form-control']) }}
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn font-weight-bold btn-primary mr-2">Save Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
