const { createApp, ref } = Vue;

createApp({
  data() {
    return {
        step: 1,
        loader: false,
        errors: []
    }
  },
  methods: {
    handleNext() {
        this.step = this.step < 3 ? this.step + 1 : this.step;
    },
    handlePrev() {
        this.step = this.step > 1 ? this.step - 1 : this.step;
    },
    handleSubmit() {
        this.loader = true;
        // Submit the form using JavaScript to show the loader properly
        this.$refs.form.submit();
    }
  },
}).mount('#apply_wrapper')
