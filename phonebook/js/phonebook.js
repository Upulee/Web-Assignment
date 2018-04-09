// phonebook.js

window.onload = function () {
	toggleAddView();
}

// btnHome click event
var homeButton = document.getElementById('btnHome');
if (homeButton != null) {
	homeButton.addEventListener('click', function(){
	document.location.href = '/phonebook'
	});
}


// btnToggleAddView click event
var toggleButton = document.getElementById('btnToggleAddView');
if (toggleButton != null) {
	toggleButton.addEventListener('click', function(){
		toggleAddView();
	});
}

var toggleAddView = function(){
	var addSection = document.getElementById('addContactSection');
	var viewSection = document.getElementById('viewPhonebookSection');

	if (addSection != null && viewSection != null) {
		if(toggleButton.innerHTML == "Add Contact") {
			addSection.style.display = "block";
			viewSection.style.display = "none";
			toggleButton.innerHTML = "View Contacts"
		} else {
			addSection.style.display = "none";
			viewSection.style.display = "block";
			toggleButton.innerHTML = "Add Contact"
		}
	}
}
