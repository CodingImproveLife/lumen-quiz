<template>
    <div>
        <h1>{{ quiz.name }}</h1>
        <div>{{ quiz.description }}</div>
        <div>{{ quiz.category_id }}</div>
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
