import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
import {
  getStorage,
  ref as storageRef,
  uploadBytes,
  getDownloadURL,
} from "https://www.gstatic.com/firebasejs/10.4.0/firebase-storage.js";
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
const storages = getStorage(app);

onAuthStateChanged(auth, (user) => {
  // You can handle authentication state changes here
  if (user) {
    console.log("User is logged in:", user);
    currentUserUID = user.uid;
  } else {
    console.log("User is logged out");
  }
});

function updateFeedbackTable() {
  const table = document
    .getElementById("tableevents")
    .getElementsByTagName("tbody")[0];
  const feedbackRef = ref(db, `Feedback`);

  onValue(feedbackRef, (snapshot) => {
    // Clear existing table rows
    table.innerHTML = "";

    if (!snapshot.exists()) {
      // No data in the table, show the default row
      const defaultRow = table.insertRow();
      defaultRow.innerHTML = `
        <td id="numid">0</td>
        <td>
          <a href="#">
            <img src="img/profilePic.jpg" class="eventpic" alt="Avatar" id="eventpicimg" />
          </a>
        </td>
        <td colspan="5" style="text-align: center;">
          No Feedback are currently available.
        </td>
      `;
    } else {
      snapshot.forEach((childSnapshot) => {
        const feedbackData = childSnapshot.val();
        const uid = childSnapshot.key;

        // Get user data from Users node
        const userRef = ref(db, `Users/${uid}`);
        get(userRef).then((userSnapshot) => {
          const userData = userSnapshot.val();

          // Create a new table row
          const newRow = table.insertRow();

          // Add cells to the row
          const numCell = newRow.insertCell(0);
          const profilePicCell = newRow.insertCell(1);
          const nameCell = newRow.insertCell(2);
          const campusCell = newRow.insertCell(3);
          const datetimeCell = newRow.insertCell(4);
          const feedbackCell = newRow.insertCell(5);
          const ratingCell = newRow.insertCell(6);

          // Function to split text into lines with a maximum of 50 characters
          function splitTextIntoLines(text, maxLength) {
            const regex = new RegExp(`.{1,${maxLength}}`, "g");
            return text.match(regex).join("\n");
          }

          // Update cell content with data from Firebase
          numCell.textContent = uid;
          profilePicCell.innerHTML = `<a href="#"><img src="${userData.ImageProfile}" class="eventpic" alt="Avatar" id="profilePic"/></a>`;
          nameCell.textContent = `${userData.lastname}, ${userData.firstname} ${userData.middlename}`;
          campusCell.textContent = userData.campus;
          datetimeCell.textContent = feedbackData.DateandTime;
          // Use the splitTextIntoLines function to break the text into lines
          feedbackCell.textContent = splitTextIntoLines(
            feedbackData.comments,
            50
          );
          ratingCell.textContent = feedbackData.ratingEquivalent;
        });
      });
    }
  });

  function applySearchFilter() {
    const input = document.getElementById("searchInput").value.toLowerCase();

    // Filter the table rows based on the search input
    const rows = table.getElementsByTagName("tr");
    for (let i = 0; i < rows.length; i++) {
      const cells = rows[i].getElementsByTagName("td");
      let rowContainsSearch = false;

      for (let j = 0; j < cells.length; j++) {
        const cellText = cells[j].textContent.toLowerCase();
        if (cellText.includes(input)) {
          rowContainsSearch = true;
          break;
        }
      }

      // Show or hide the row based on the search result
      rows[i].style.display = rowContainsSearch ? "" : "none";
    }
  }

  // Attach event listener to the search input
  const searchInput = document.getElementById("searchInput");
  searchInput.addEventListener("input", applySearchFilter);
}

// Call the function to initially populate the table
updateFeedbackTable();
