const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(" .error-txt");

form.onsubmit = (e) => {
	e.preventDefault(); //preventing form from submittng

}

continueBtn.onclick = () => {
	let xhr = new XMLHttpRequest(); //XML object

	xhr.open("POST", "php/signup.php", true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				if (xhr.response == "success") {
					location.href = "users.php";
				}else{
					errorText.textContent = xhr.response;
					errorText.style.display = "block";
				}
			}
		}
	}

	let formData = new FormData(form);
	xhr.send(formData); 
}