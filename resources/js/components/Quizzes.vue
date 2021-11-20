<template>
    <div>
        <div v-for="quiz in quizzes">
            <div>{{ quiz.id }}</div>
            <div>{{ quiz.name }}</div>
            <div>{{ quiz.description }}</div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            quizzes: {}
        }
    },
    mounted() {
        axios.get('/api/quizzes')
        .then(res => {
            this.quizzes = res.data.data;
        })
    }
}
</script>
