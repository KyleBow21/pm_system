/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(() => {
    localStorage.setItem('prefs-theme', 'light');
})

function returnThemeBasedOnLocalStorage() {
    const pref = localStorage.getItem('prefs-theme');
    const lastChanged = localStorage.getItem('prefs-theme-modified');
    let now = new Date();
    now = now.getTime();
    const minutesPassed = (now - lastChanged) / (1000 * 60);

    if (
        minutesPassed < 120 &&
        pref == "light"
    ) return "light"
    else if (
        minutesPassed < 120 &&
        pref == "dark"
    ) return "dark"
    else return undefined;
}

function syncBetweenTabs() {
    window.addEventListener('storage', (e) => {
        if (e.key === 'prefs-theme') {
            if (e.newValue === 'light') enableTheme('light');
            else if (e.newValue === 'dark') enableTheme('dark')
        };
    });
}

function returnThemeBasedOnOS() {
    let pref = window.matchMedia('(prefers-color-scheme: dark)');
    if (pref.matches) return 'dark'
    else {
        pref = window.matchMedia('(prefers-color-scheme: light)');
        if (pref.matches) return 'light'
        else return undefined;
    }
}

function returnThemeBasedOnTime() {
    let date = new Date();
    const hour = date.getHours();
    if (hour > 20 || hour < 5) return 'dark';
    else return 'light';
}

function initTheme() {
    // Enable different theme based on criteria
    enableTheme(
        returnThemeBasedOnLocalStorage() ||
        returnThemeBasedOnOS() ||
        returnThemeBasedOnTime(),
        false
    );

}
