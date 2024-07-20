const { createApp, ref } = Vue;

createApp({
  data() {
    return {
        course: window.course,
        title: "",
        brief: "",
        overview: "",
        duration: 0,
        started_at: null,
        isReady: 1,
        image: null,
        objectives: window.objectives || [],
        questions: window.questions || [],
        v_questions: window.v_questions || [],
        current_objective_text: "",
        levels: window.levels || [],
        currentLevelIndex: 0,
        objectives_to_delete: [],
        levels_to_delete: [],
        errors: []
    }
  },
  created() {
    this.title = course.title || "";
    this.brief = course.brief || "";
    this.overview = course.overview || "";
    this.duration = course.duration || "";
    this.started_at = course.started_at || "";
    this.isReady = course.isReady || 0;
  },
  methods: {
    handleAddObjective() {
        if (this.current_objective_text) {
            this.objectives.push(this.current_objective_text)
            this.current_objective_text = ""
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
    handleRemoveObjective(index) {
        this.objectives_to_delete.push(this.objectives[index])
        this.objectives.splice(index, 1)
    },
    handleRemoveObjectiveFromLevel(index, i) {
        if (!this.levels[index]["objectives_to_delete"]) {
            this.levels[index]["objectives_to_delete"] = []
        }
        this.levels[index]["objectives_to_delete"].push(this.levels[index]["objectives"][i])

        this.levels[index]["objectives"].splice(i, 1)
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
    handleChangeCourseImage(e) {
        this.image = e.target.files[0]
    },
    handelChangeLevelImage(e) {
        this.levels[this.currentLevelIndex]["image"] = e.target.files[0]
    },
    handleAddLevel() {
        this.levels.push({})
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
    handleRemoveQuestionv(index) {
        this.v_questions.splice(index, 1)
    },
    handleRemoveQuestion(index) {
        this.questions.splice(index, 1)
    },
    handleRemoveLevel(index) {
        this.levels_to_delete.push(this.levels[index])
        this.levels.splice(index, 1)
    },
    async update() {
        this.errors = []
        $('.loader').fadeIn().css('display', 'flex')
          try {
              const response = await axios.post(`/uma/admin/courses/update`, {
                  id: this.course.id,
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
                  objectives_to_delete: this.objectives_to_delete,
                  levels: this.levels,
                  levels_to_delete: this.levels_to_delete
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
