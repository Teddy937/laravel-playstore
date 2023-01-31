import Vue from 'vue'


Vue.component('task-component', require('./components/tasks/TaskComponent.vue').default)
Vue.component('test-component', require('./components/iveri/TestComponent.vue').default);
const app = new Vue({
    el: "#vue-app"
})
