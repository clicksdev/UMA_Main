const { createApp, ref } = Vue;

createApp({
    data() {
        return {
            title: "",
            title_ar: "",
            brief_ar: "",
            overview_ar: "",
            brief: "",
            overview: "",
            duration: 0,
            started_at: null,
            isReady: 1,
            patch: 1,
            image: null,
            currentLevelIndex: 0,
            objectives: [],
            questions: [],
            v_questions: [],
            f_questions: [],
            current_objective_text: "",
            current_objective_text_ar: "",
            current_type: 1,
            current_note_text: "",
            levels: [
                {
                }
            ],
            errors: [],
            current_options: [], // Array to hold MCQ options
            faqType: 1, // Default FAQ type is 1 (Default)
            faqs: [] // Array to hold custom FAQs
        }
    },
    methods: {
        // Add a new empty FAQ
        addFaq() {
            this.faqs.push({ question: '', answer: '', question_ar: '', answer_ar: "" });
        },
        // Remove an FAQ by index
        removeFaq(index) {
            this.faqs.splice(index, 1);
        },
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
        addOption() {
            this.current_options.push({
                en: '',
                ar: ''
            });
        },
        removeOption(index) {
            this.current_options.splice(index, 1);
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
        handleAddQuestionv() {
            if (this.current_question_text_v) {
                this.v_questions.push(this.current_question_text_v)
                this.current_question_text_v = ""
            }
        },
        handleAddQuestionf() {
            if (this.current_question_text_f) {
                this.f_questions.push(this.current_question_text_f)
                this.current_question_text_f = ""
            }
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
        }, handleRemoveQuestionf(index) {
            this.f_questions.splice(index, 1)
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
            if (this.questions.length == 0) {
                alert('You have to add at least one question')
            } else {
                this.errors = []
                $('.loader').fadeIn().css('display', 'flex')
                try {
                    const response = await axios.post(`/admin/courses/store`, {
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
                        patch: this.patch,
                        faq_questions: this.faqs,
                        faq_type: this.faqType,
                        levels: this.levels
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
            }
        },
    },
}).mount('#course_wrapper')
