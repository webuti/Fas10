<template>
    <div class="project  text-gray-500 dark:text-gray-50 border-b border-gray-300 p-2 dark:border-gray-700"><h3 :class="{ 'font-bold' : projectId == project.id }">
        {{project.title}}</h3>
        <h4 class="text-xs">Teslim Tarihi: {{project.deadline}}</h4>
        <h4 class="text-xs">Şirket: {{project.team.name}}</h4></div>
</template>

<script>
    export default {
        name: "ProjectListItem",
        props: ['project', 'projectId']
    }
</script>

<style scoped>

</style>
