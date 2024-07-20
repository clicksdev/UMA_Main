const { createApp, ref } = Vue;

createApp({
  data() {
    return {
        step: 1,
        errors: []
    }
  },
  methods: {
    handleNext() {
        this.step = this.step < 3 ? this.step + 1 : this.step;
    },
    handlePrev() {
        this.step = this.step > 1 ? this.step - 1 : this.step;
    }
  },
}).mount('#apply_wrapper')
