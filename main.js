// main entry point
// include your assets here

// get styles
import "./assets/css/styles.css"

// get scripts
import './assets/js/scripts.js'

// Alpine.js
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

/*
document.querySelector('#app').innerHTML = `
  <h1>Hello Vite!</h1>
  <a href="https://vitejs.dev/guide/features.html" target="_blank">Documentation</a>
`
*/