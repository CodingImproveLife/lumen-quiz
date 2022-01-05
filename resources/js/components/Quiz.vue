<template>
    <div>
        <div class="container">
            <h1>{{ quiz.name }}</h1>
            <div class="mb-3">{{ quiz.description }}</div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 col-sm-11">
                    <b-progress :value="nextItem" :max="questionIds.length" show-value class="mb-3"></b-progress>
                    <b-card
                        border-variant="secondary"
                        :header=question.title
                        header-border-variant="secondary"
                        align="center"
                    >
                        <b-card-text>
                            {{ question.description }}
                        </b-card-text>
                        <div v-if="isQuestionsExist()" >
                            <div v-for="answer in question.answers" :key="answer.id">
                                <button v-on:click="selectAnswer(answer.id)"
                                        class="btn btn-block mb-2"
                                        :class="changeButtonStyle(answer.id)"
                                        type="button">
                                    {{ answer.answer }}
                                </button>
                            </div>
                            <button v-on:click="getNextQuestion()"
                                    class="btn btn-primary btn-lg mt-3"
                                    :disabled="!selectedAnswer"
                                    type="button">
                                Next question
                            </button>
                        </div>
                    </b-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            quiz: {},
            questionIds: [],
            nextItem: 0,
            question: {},
            answers: {},
            selectedAnswer: null,
            isAnswerCorrect: false,
        }
    },
    mounted() {
        axios.get('/api/quizzes/' + this.$route.params.id)
            .then(res => {
                this.quiz = res.data.data[0];
                this.questionIds = this.quiz.questions;
                this.getQuestion();
            });
    },
    methods: {
        getQuestion() {
            if (this.isQuestionsExist()) {
                axios.get('/api/question/' + this.questionIds[this.nextItem])
                    .then(res => {
                        this.question = res.data.data[0];
                        this.answers = this.question.answers;
                    })
            }
        },
        getNextQuestion() {
            ++this.nextItem;
            this.selectedAnswer = null;
            this.getQuestion();
        },
        selectAnswer(id) {
            this.selectedAnswer = id;
            axios.post('/api/answer/', {"id": id})
                .then(res => {
                    this.isAnswerCorrect = res.data;
                });
        },
        changeButtonStyle(id) {
            if (this.isAnswerCorrect && this.selectedAnswer === id) {
                return 'btn-success disabled';
            }
            if (!this.isAnswerCorrect && this.selectedAnswer === id) {
                return 'btn-danger disabled';
            }
            if (this.selectedAnswer !== null) {
                return "btn-outline-secondary disabled"
            }
            return 'btn-outline-secondary';
        },
        isQuestionsExist() {
            if (!this.questionIds) return;
            return this.questionIds.length - 1 >= this.nextItem;
        }
    }
}
</script>
