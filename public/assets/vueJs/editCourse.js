const { createApp, ref } = Vue;

createApp({
  data() {
    return {
        course: window.course,
        title: "",
        brief: "",
        title_ar: "",
        brief_ar: "",
        overview_ar: "",
        overview: "",
        duration: 0,
        started_at: null,
        isReady: 1,
        patch: 1,
        image: null,
        objectives: window.objectives || [],
        questions: window.questions || [],
        v_questions: window.v_questions || [],
        current_objective_text: "",
        current_objective_text_ar: "",
        levels: window.levels || [],
        currentLevelIndex: 0,
        objectives_to_delete: [],
        current_type: 1,
        current_note_text: "",
        current_options: [],
        levels_to_delete: [],
        errors: [],
        faqType: 1, // Default FAQ type is 1 (Default)
        faqs: window.faq_questions || [], // Array to hold custom FAQs
    }
  },
  created() {
    this.title = course.title || "";
    this.brief = course.brief || "";
    this.overview = course.overview || "";
    this.title_ar = course.title_ar || "";
    this.brief_ar = course.brief_ar || "";
    this.overview_ar = course.overview_ar || "";
    this.duration = course.duration || "";
    this.started_at = course.started_at || "";
    this.isReady = course.isReady || 0;
    this.patch = course.patch || 1;
    this.faqType = course.faq_type || 1;
  },
  methods: {
    handleAddObjective() {
        if (this.current_objective_text) {
            this.objectives.push(
                {
                    "en": this.current_objective_text,
                    "ar": this.current_objective_text_ar,
                }
            )
            this.current_objective_text = ""
            this.current_objective_text_ar = ""
        }
    },
    // Add a new empty FAQ
            addFaq() {
                this.faqs.push({ question: '', answer: '', question_ar: '', answer_ar: "" });
            },
            // Remove an FAQ by index
            removeFaq(index) {
                this.faqs.splice(index, 1);
            },
            handleAddObjectiveLevel(index) {
                if (this.levels[index]['current_objective_text'] && this.levels[index]['current_objective_text_ar']) {
                    if (!this.levels[index]["objectives"])
                        this.levels[index]["objectives"] = []
                    this.levels[index]["objectives"].push(
                        {
                            en: this.levels[index]['current_objective_text'],
                            ar: this.levels[index]['current_objective_text_ar']
                        }
                    )
                    this.levels[index]['current_objective_text'] = ""
                    this.levels[index]['current_objective_text_ar'] = ""
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
        if (this.current_question_text && this.current_note_text && this.current_type && this.current_question_text_ar) {
            this.questions.push({
                question: this.current_question_text,
                question_ar: this.current_question_text_ar,
                note: this.current_note_text,
                note_ar: this.current_note_text_ar,
                type: this.current_type,
                options: this.current_options,
            })
            this.current_question_text = ""
            this.current_question_text_ar = ""
            this.current_note_text = ""
            this.current_note_text_ar = ""
            this.current_type = ""
            this.current_options = []

        }
    },
    addOption() {
        this.current_options.push({
            en: '',
            ar: ''
        });
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
              const response = await axios.post(`/admin/courses/update`, {
                  id: this.course.id,
                  title: this.title,
                  title_ar: this.title_ar,
                  brief_ar: this.brief_ar,
                  overview_ar: this.overview_ar,
                  brief: this.brief,
                  overview: this.overview,
                  duration: this.duration,
                  isReady: this.isReady,
                  started_at: this.started_at,
                  image: this.image,
                  objectives: this.objectives,
                  questions: this.questions,
                  objectives_to_delete: this.objectives_to_delete,
                  patch: this.patch,
                  levels: this.levels,
                  faq_questions: this.faqs,
                  faq_type: this.faqType,
                  levels_to_delete: this.levels_to_delete
              },
              {
                  headers: {
                      'Content-Type': 'multipart/form-data'
                  }
              }
              );
              if (response.data.status) {
                window.location.href = "/admin/courses"
              }
          } catch (error) {
            this.errors = error.response.data.errors
          }
      },
  },
}).mount('#course_wrapper')
