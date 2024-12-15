const modal = document.getElementById('signin-modal');
const signInBtn = document.getElementById('signin-btn');
const closeBtn = document.querySelector('.close-btn');

signInBtn.addEventListener('click', e => {
  e.preventDefault();
  modal.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
  modal.style.display = 'none';
});

window.addEventListener('click', e => {
  if (e.target === modal) {
    modal.style.display = 'none';
  }
});

document.getElementById('signin-form').addEventListener('submit', e => {
  e.preventDefault();

  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  axios
    .post('/login', { email, password })
    .then(response => {
      localStorage.setItem('token', response.data.token);
      alert(response.data.message);
      modal.style.display = 'none';
    })
    .catch(error => {
      alert(error.response.data.error);
    });
});
