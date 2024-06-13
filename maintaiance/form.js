const scriptURL = 'https://script.google.com/macros/s/AKfycbzs98zzI50HGhhGsEIehV4-ViUhff8QeJHV5svulTAjLDg-AD7SuieZuh1f8Nn7Yv5Obw/exec'
const form = document.forms['contact-form']
form.addEventListener('submit', e => {
  e.preventDefault()
  fetch(scriptURL, { method: 'POST', body: new FormData(form)})
  .then(response => alert("Thank you! your form is submitted successfully." ))
  .then(() => { window.location.reload(); })
  .catch(error => console.error('Error!', error.message))
})