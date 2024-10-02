const form = document.querySelector('form');

form.addEventListener('submit',(e) => {
	e.preventDefault();

	const respo=grecaptcha.getResponse()

	if(!respo.length > 0) {
	throw new Error ("Captcha not complete")
	}

	const fd = new FormData(e.target);
	const params = new URLSearchParams(fd);

	fetch(' ', {
	method: "POST",
	body: params,
	})
	.then(res => res.json())
	.then(data => console.log(data))
})