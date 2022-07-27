import Vue from 'vue'


Vue.component('task-component', require('./components/tasks/TaskComponent.vue').default)
const app = new Vue({
    el: "#vue-app"
})
