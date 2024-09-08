const { createApp, ref } = Vue;

createApp({
data() {
    return {
    step: 1,
    loader: false,
    errors: [],
    }
},
methods: {
    handleNext() {
    if (this.validateStep()) {
        this.step = this.step < 3 ? this.step + 1 : this.step;
        setTimeout(() => {
        window.scroll(0, 0);
        }, 200);
    }
    },
    handlePrev() {
    this.step = this.step > 1 ? this.step - 1 : this.step;
    setTimeout(() => {
        window.scroll(0, 0);
    }, 200);
    },
    handleSubmit() {
    this.loader = true;
    // Submit the form using JavaScript to show the loader properly
    this.$refs.form.submit();
    },
    validateStep() {
    this.errors = [];

    // Validation for Step 1
    if (this.step === 1) {
        if (!this.$refs.form.name.value) {
        this.errors.push("Full Name is required");
        }
        if (!this.$refs.form.dob.value) {
        this.errors.push("Date of Birth is required");
        }
        if (!this.$refs.form.phone.value) {
        this.errors.push("Phone Number is required");
        }
        if (!this.$refs.form.email.value) {
        this.errors.push("Email is required");
        }
        if (!this.$refs.form.country.value) {
        this.errors.push("Country is required");
        }
        if (!this.$refs.form.governante.value) {
        this.errors.push("Governate / Province is required");
        }
        if (!this.$refs.form.address.value) {
        this.errors.push("Address is required");
        }
        if (!this.$refs.form.qualification.value) {
        this.errors.push("Highest Qualification is required");
        }
        if (!this.$refs.form.attended.value) {
        this.errors.push("Institutions Attended is required");
        }
        if (!this.$refs.form.graduation.value) {
        this.errors.push("Year of Graduation is required");
        }
    }

    // Validation for Step 2
    if (this.step === 2) {
        if (!this.$refs.form.prev_education.value) {
        this.errors.push("Previous Education is required");
        }
        if (!this.$refs.form.job.value) {
        this.errors.push("Job Title is required");
        }
        if (!this.$refs.form.organization_name.value) {
        this.errors.push("Company / Organization Name is required");
        }
        if (!this.$refs.form.duration_of_employment.value) {
        this.errors.push("Duration of Employment is required");
        }
    }

    // Show errors and prevent moving to the next step if any error exists
    if (this.errors.length > 0) {
        alert(this.errors[0]);
        return false;
    }
    return true;
    }
},
}).mount('#apply_wrapper')
