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
        if (this.step == 3) {
            this.loader = true;
        }
    },
    handlePrev() {
        this.step = this.step > 1 ? this.step - 1 : this.step;
    }
  },
}).mount('#apply_wrapper')
