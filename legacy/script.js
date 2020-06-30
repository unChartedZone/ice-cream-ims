var loginButton = document.getElementById("loginButton");
var signoutButton = document.getElementById("signout");
var invisibleButtons = document.getElementById("invisible-buttons");

if(loginButton) {
	// Should only be true if the current page is login
	loginButton.onclick = function() {
		location.href = "login/login.php";
	}
}

if(signoutButton) {
	// Should only be true if a page is a dashboard page
	signoutButton.onclick = function() {
		location.href = "../login/login.php";
	}
}

if(invisibleButtons) {
	$('.col-4').hide();
}

var navLinks = document.getElementsByClassName("nav-link");
var dashboardPages = [];
for(var i = 0; i < navLinks.length;i++) {
	dashboardPages.push(navLinks[i].getAttribute("href"));
	dashboardPages[i] = dashboardPages[i].split("/").pop();
}

// Highlights the current dashboard page in the navbar
var path = window.location.pathname;
var page = path.split("/").pop(); // Gets file name of current page
var counter = dashboardPages.indexOf(page);
if(counter >= 0) {
	navLinks[counter].className += " active";
}

var printButton = document.getElementById("printButton");
if(page === "dashboard.php") {
	$("#printButton").hide();
}
printButton.onclick = function() {
	var divToPrint = document.getElementById('areaToPrint');
	newWin = window.open("");
	newWin.document.write(divToPrint.outerHTML);
	newWin.print();
	newWin.close();
}

// Will cause the success message to slide away after successfully adding a new
// data row
$("#success-button").click(function() {
	$("#success-message").hide("slide",{direction:'right'},1000);
});











