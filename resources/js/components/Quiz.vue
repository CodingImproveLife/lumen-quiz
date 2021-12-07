<template>
    <div>
        <h1>{{ quiz.name }}</h1>
        <div>{{ quiz.description }}</div>
        <div>{{ quiz.category_id }}</div>
        <ul v-for="question in quiz.questions">
            <li>
                {{ question.id }}
            </li>
            <li>
                {{ question.title }}
            </li>
            <li>
                {{ question.description }}
            </li>
                <ul v-for="answer in question.answers">
                    <li>
                        {{ answer }}
                    </li>
                </ul>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            quiz: {}
        }
    },
    mounted() {
        axios.get('/api/quizzes/' + this.$route.params.id)
            .then(res => {
                this.quiz = res.data.data[0];
            })
    }
}
</script>
