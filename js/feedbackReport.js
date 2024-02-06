import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";

import {
  getDatabase,
  ref,
  get,
  set,
  update,
  onValue,
} from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";
import {
  getAuth,
  onAuthStateChanged,
} from "https://www.gstatic.com/firebasejs/10.4.0/firebase-auth.js";
import firebaseConfig from "./firebaseConfig.js";
const app = initializeApp(firebaseConfig);
const db = getDatabase(app);
const auth = getAuth(app);
let currentUserUID;
onAuthStateChanged(auth, (user) => {
  // You can handle authentication state changes here
  if (user) {
    console.log("User is logged in:", user);
    currentUserUID = user.uid;
  } else {
    console.log("User is logged out");
  }
});
document.addEventListener("DOMContentLoaded", function () {
  // Get the modal and the button
  const modal = document.getElementById("myModalat");
  const btn = document.getElementById("valBtn");

  // When the button is clicked, show the modal
  btn.addEventListener("click", function () {
    modal.style.display = "block";
  });

  // When the user clicks on the close button, close the modal
  const closeBtn = document.querySelector(".closeat");
  closeBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  // When the user clicks anywhere outside the modal, close it
  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});
