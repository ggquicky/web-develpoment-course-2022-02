const inputEl = document.querySelector('.input')

inputEl.addEventListener('input', (event) => {
  console.log(`event: `, event.target.value)
})
