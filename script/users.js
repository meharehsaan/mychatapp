let searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
userList = document.querySelector(".users .user-list");

searchBtn.onclick = () => {
	searchBar.classList.toggle("active");
	searchBar.focus();
	searchBar.value = "";
	// searchBar.classList.toggle("active");
}

searchBar.onkeyup = () => {
	let searchTerm = searchBar.value;
	if (searchBar != "") {
		searchBar.classList.add("active");
	}else{
		searchBar.classList.remove("active");
	}
	// ajax starts here
	let xhr = new XMLHttpRequest(); //XML object
	xhr.open("POST", "php/search.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				userList.innerHTML =  xhr.response;			
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("searchTerm=" + searchTerm);
}


setInterval(()=> {
	// let start ajax
	let xhr = new XMLHttpRequest(); //XML object
	xhr.open("POST", "php/users.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				if (!searchBar.classList.contains("active")) {
					userList.innerHTML = xhr.response;			
				}
			}
		}
	}
	xhr.send();
} , 500);