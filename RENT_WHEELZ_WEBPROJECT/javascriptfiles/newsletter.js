const username = document.getElementById('form_username');
const name = document.getElementById('form_name');
const email = document.getElementById('form_email');
const msg_name = document.getElementById('msg_name');
const msg_phone = document.getElementById('msg_phone');
const msg_email = document.getElementById('msg_email');
const subject = document.getElementById('subject');
const text = document.getElementById('message');
const msg_form = document.getElementById('messageform');
const form = document.getElementById('letterform');

form.addEventListener('submit', (e) => {
  let messages = [];
  message = '';
  if (username.value.length <= 3 || username.value.length > 60) {
    messages.push('Please use a username with more than 3 and less than 60 characters');
  }
  if (name.value === '' || name.value.length > 60) {
    messages.push('Please type a name with less than 60 characters');
  }
  if (email.value === '' || email.value.length > 60) {
    messages.push('Please type an email with less than 60 characters');
  }

  if (messages.length > 0) {
    message = messages.join('. ');
    alert(message);
    e.preventDefault();
  }
})

msg_form.addEventListener('submit', (e) => {
  let messages = [];
  message = '';
  if (msg_name.value.length <= 3 || name.value.length > 60) {
    messages.push('Please use a name with more than 3 and less than 60 characters');
  }
  if (msg_phone.value === '' || phone.value.length > 60) {
    messages.push('Please type a phone number with less than 60 characters');
  }
  if (msg_email.value === '' || email.value.length > 60) {
    messages.push('Please type an email with less than 60 characters');
  }
  if (subject.value === '' || subject.value.length > 60) {
    messages.push('Please type a subject');
  }
  if (text.value === '' || text.value.length > 60) {
    messages.push('Please type a message');
  }

  if (messages.length > 0) {
    message = messages.join('. ');
    alert(message);
    e.preventDefault();
  }
})
