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
// Function to populate the tableParticipants
// Function to populate the tableParticipants
function populateTable() {
  const table = document
    .getElementById("tableParticipants")
    .getElementsByTagName("tbody")[0];
  const reportedProblemsRef = ref(db, "ReportedProblems");

  // Clear existing rows
  table.innerHTML = "";

  // Retrieve data from ReportedProblems node
  onValue(reportedProblemsRef, (snapshot) => {
    snapshot.forEach((childSnapshot) => {
      const uid = childSnapshot.key;
      const problems = childSnapshot.val(); // Get all problems under this UID

      // Loop through each problem
      for (const postId in problems) {
        if (Object.hasOwnProperty.call(problems, postId)) {
          const problem = problems[postId];

          // Retrieve related user data from Users node
          const userRef = ref(db, "Users/" + uid);
          get(userRef).then((userSnapshot) => {
            const user = userSnapshot.val();

            // Create a new row
            const row = table.insertRow();

            // Populate columns
            row.insertCell(0).innerText = uid;
            row.insertCell(
              1
            ).innerText = `${user.lastname}, ${user.firstname} ${user.middlename}`;
            row.insertCell(2).innerText = user.campus;
            row.insertCell(3).innerText = problem.issue;
            // Splitting the message into lines of maximum 40 characters
            const messageLines = problem.message.match(/.{1,40}/g) || [];

            // Joining the lines with a line break
            const formattedMessage = messageLines.join("\n");

            // Setting the inner text with the formatted message
            row.insertCell(4).innerText = formattedMessage;

            const proofCell = row.insertCell(5);
            proofCell.innerHTML = `<a href="${problem.imageUrl}" target="_blank" style="color: #dc3545; text-decoration: underline">View the file</a>`;
          });
        }
      }
    });
  });
}

// Call the populateTable function when DOM content is loaded
document.addEventListener("DOMContentLoaded", populateTable);
