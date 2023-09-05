const container = document.getElementById('container');
const loginButton = document.getElementById('login');
const signUpButton = document.getElementById('signUp');

loginButton.addEventListener('click', () => {
	container.classList.add('panel-active');
})

signUpButton.addEventListener('click', () => {
	container.classList.remove('panel-active');
})
