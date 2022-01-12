<template>
    <b-navbar toggleable="lg" type="dark" variant="secondary" sticky class="mb-3">
        <b-navbar-brand :to="{ name: 'quizzes'}">
            <b-badge variant="light" class="text-uppercase p-2">Quiz</b-badge>
        </b-navbar-brand>

        <b-navbar-nav class="ml-auto">
            <div v-if="isGuest" class="d-flex">
                <b-nav-item href="#">Sign in</b-nav-item>
                <b-nav-item href="#">Sign up</b-nav-item>
            </div>
            <b-nav-item-dropdown right v-else>
                <template #button-content>
                    User
                </template>
                <b-dropdown-item href="#">Sign Out</b-dropdown-item>
            </b-nav-item-dropdown>
        </b-navbar-nav>
    </b-navbar>
</template>

<script>
export default {
    data() {
        return {
            isGuest: true
        }
    }
}
</script>
