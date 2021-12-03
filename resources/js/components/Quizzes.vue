<template>
    <div>
        <div v-for="quiz in quizzes.data">
            <div>{{ quiz.id }}</div>
            <div>{{ quiz.name }}</div>
            <div>{{ quiz.description }}</div>
            <div>{{ quiz.category_id }}</div>
        </div>

        <pagination :data="quizzes" @pagination-change-page="getQuizzes">
            <span slot="prev-nav">&lt;</span>
            <span slot="next-nav">&gt;</span>
        </pagination>
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
        this.getQuizzes();
    },
    methods: {
        getQuizzes(page = 1) {
            axios.get('/api/quizzes?page=' + page)
                .then(res => {
                    this.quizzes = res.data;
                })
        }
    }
}
</script>
