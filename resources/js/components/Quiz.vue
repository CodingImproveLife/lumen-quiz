<template>
    <div>
        <h1>{{ quiz.name }}</h1>
        <div>{{ quiz.description }}</div>
        <div>{{ quiz.category_id }}</div>
        <div>{{ question.title }}</div>
        <div>{{ question.description }}</div>
        <div v-for="answer in question.answers" :key="answer.id">
            <button v-on:click="selectAnswer(answer.id)"
                    class="btn m-2"
                    :class="changeButtonStyle(answer.id)"
                    type="button">
                {{ answer.answer }}
            </button>
        </div>
        <button v-on:click="getNextQuestion()"
                class="btn btn-primary btn-lg"
                :class="{ disabled: !selectedAnswer }"
                type="button">Next question</button>
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
            })
    },
    methods: {
        getQuestion() {
            axios.get('/api/question/' + this.questionIds[this.nextItem])
                .then(res => {
                    this.question = res.data.data[0];
                    this.answers = this.question.answers;
                })
        },
        getNextQuestion() {
            ++this.nextItem;
            this.selectedAnswer = null;
            console.log(this.questionIds)
            console.log(this.nextItem)
            this.getQuestion();
        },
        selectAnswer(id) {
            this.selectedAnswer = id;
            axios.post('/api/answer/', {"id": id} )
                .then(res => {
                    this.isAnswerCorrect = res.data;
                })
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
        }
    }
}
</script>
