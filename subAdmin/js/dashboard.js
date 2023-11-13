// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

/* =============================================== dropdown ================================================*/
function toggleDropdown() {
  var dropdownMenu = document.getElementById("dropdownMenu");

  // Toggle the display of the dropdown menu
  if (dropdownMenu.style.display === "none") {
    dropdownMenu.style.display = "block";
  } else {
    dropdownMenu.style.display = "none";
  }
}

// Close the dropdown when clicking outside of it
window.onclick = function (event) {
  if (
    !event.target.matches(".avatar") &&
    !event.target.closest(".dropdown-menu")
  ) {
    var dropdownMenu = document.getElementById("dropdownMenu");
    dropdownMenu.style.display = "none";
  }
};

/* =============================================== for logout ================================================*/
function showLogoutPopup() {
  var popupForm = document.getElementById("logoutForm");
  var popupTitle = document.getElementById("logoutTitle");
  popupTitle.textContent = "Log Out?";
  popupForm.style.display = "block";
}

function closeLogoutPopup() {
  var popupForm = document.getElementById("logoutForm");
  popupForm.style.display = "none";
}

function performLogout() {
  // Add your logout logic here (e.g., redirect the user or make an API call)
  // For example, to redirect the user to "Login.html":
  window.location.href = "login/login.php";
}

/* =============================================== for messages ================================================*/
document.addEventListener("DOMContentLoaded", function () {
  const openMessagesModal = document.getElementById("openMessagesModal");
  const messagesModal = document.getElementById("messagesModal");
  const closeMessagesModal = document.getElementById("closeMessagesModal");
  const messagesContent = document.getElementById("messagesContent");

  openMessagesModal.addEventListener("click", function () {
    // Fetch the content of messages.html using AJAX
    fetch("messages.html")
      .then((response) => response.text())
      .then((data) => {
        messagesContent.innerHTML = data; // Set the content in the modal
        messagesModal.style.display = "block"; // Show the modal
      })
      .catch((error) => {
        console.error("Error fetching messages:", error);
      });
  });

  closeMessagesModal.addEventListener("click", function () {
    messagesContent.innerHTML = ""; // Clear the content
    messagesModal.style.display = "none"; // Hide the modal
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // ... Other event listeners and code ...

  const messagesModal = document.getElementById("messagesModal");
  const messagesContent = document.getElementById("messagesContent");

  // Attach click event to messagesModal
  messagesModal.addEventListener("click", function (event) {
    const target = event.target;

    // Check if the clicked element has the close-icon class
    if (target.classList.contains("close-icon")) {
      closeModal();
    }
  });

  function closeModal() {
    messagesContent.innerHTML = ""; // Clear the content
    messagesModal.style.display = "none"; // Hide the modal
  }
});
