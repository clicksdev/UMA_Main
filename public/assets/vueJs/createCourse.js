const { createApp, ref } = Vue;

createApp({
  data() {
    return {
        title: "",
        brief: "",
        overview: "",
        duration: 0,
        started_at: null,
        isReady: 1,
        image: null,
        currentLevelIndex: 0,
        objectives: [],
        questions: [],
        v_questions: [],
        current_objective_text: "",
        levels: [
            {
            }
        ],
        errors: []
    }
  },
  methods: {
    handleAddObjective() {
        if (this.current_objective_text) {
            this.objectives.push(this.current_objective_text)
            this.current_objective_text = ""
        }
    },
    handleAddQuestion() {
        if (this.current_question_text) {
            this.questions.push(this.current_question_text)
            this.current_question_text = ""
        }
    },
    handleAddQuestionv() {
        if (this.current_question_text_v) {
            this.v_questions.push(this.current_question_text_v)
            this.current_question_text_v = ""
        }
    },
    handleAddObjectiveLevel(index) {
        if (this.levels[index]['current_objective_text']) {
            if (!this.levels[index]["objectives"])
                this.levels[index]["objectives"] = []
            this.levels[index]["objectives"].push(this.levels[index]['current_objective_text'])
            this.levels[index]['current_objective_text'] = ""
        }
    },
    getUri(file) {
        return URL.createObjectURL(file)
    },
    getBackgroundImage(index) {
      if (this.levels[index] && this.levels[index].thumbnail && !this.levels[index].image) {
        return `${this.levels[index].thumbnail}`;
      } else if (this.levels[index] && this.levels[index].image) {
        return URL.createObjectURL(this.levels[index].image);
      } else {
        return `/assets/media/logo-placeholder.png`;
      }
    },
    handleRemoveObjective(index) {
        this.objectives.splice(index, 1)
    },
    handleRemoveQuestion(index) {
        this.questions.splice(index, 1)
    },
    handleRemoveQuestionv(index) {
        this.v_questions.splice(index, 1)
    },
    handleRemoveObjectiveFromLevel(index, i) {
        this.levels[index]["objectives"].splice(i, 1)
    },
    handleChangeCourseImage(e) {
        this.image = e.target.files[0]
    },
    handelChangeLevelImage(e) {
        this.levels[this.currentLevelIndex]["image"] = e.target.files[0]
    },
    handleAddLevel() {
        this.levels.push({})
    },
    handleRemoveLevel(index) {
        this.levels.splice(index, 1)
    },
    async add() {
        this.errors = []
        $('.loader').fadeIn().css('display', 'flex')
          try {
              const response = await axios.post(`/uma/admin/courses/store`, {
                  title: this.title,
                  brief: this.brief,
                  overview: this.overview,
                  duration: this.duration,
                  isReady: this.isReady,
                  started_at: this.started_at,
                  image: this.image,
                  objectives: this.objectives,
                  questions: this.questions,
                  v_questions: this.v_questions,
                  levels: this.levels
              },
              {
                  headers: {
                      'Content-Type': 'multipart/form-data'
                  }
              }
              );
              if (response.data.status) {
                window.location.href = "/uma/admin/courses"
              }
          } catch (error) {
            this.errors = error.response.data.errors
          }
      },
  },
}).mount('#course_wrapper')
