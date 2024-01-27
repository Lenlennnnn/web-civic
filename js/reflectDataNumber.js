// Import necessary Firebase modules
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
import {
  getDatabase,
  ref,
  onValue,
} from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";
import {
  getAuth,
  onAuthStateChanged,
} from "https://www.gstatic.com/firebasejs/10.4.0/firebase-auth.js";
import firebaseConfig from "./firebaseConfig.js";

// Initialize Firebase app
const app = initializeApp(firebaseConfig);
const db = getDatabase(app);
const auth = getAuth(app);

onAuthStateChanged(auth, (user) => {
  // You can handle authentication state changes here
  if (user) {
    console.log("User is logged in:", user);
  } else {
    console.log("User is logged out");
  }
});
const usersRef = ref(db, "Users");

// Function to format the user count
const formatUserCount = (count) => {
  if (count >= 1000000) {
    return (count / 1000000).toFixed(1) + "M";
  } else if (count >= 10000) {
    return (count / 1000).toFixed(1) + "k";
  } else {
    return count.toString();
  }
};

const updateTotalVerifiedUsers = (snapshot) => {
  const users = snapshot.val();
  let totalVerifiedUsers = 0;
  const oneYearAgo = new Date();
  oneYearAgo.setFullYear(oneYearAgo.getFullYear() - 1);

  // Iterate through the users and count only those with verificationStatus set to true
  for (const userId in users) {
    const user = users[userId];

    // Check if user exists and has verificationStatus set to true
    if (user && user.verificationStatus === true) {
      // Check if lastLogin is within the last year
      const lastLoginTimestamp = new Date(user.lastLogin);
      if (lastLoginTimestamp > oneYearAgo) {
        totalVerifiedUsers++;
      }
    }
  }

  // Format and update the total user count in the HTML element
  const formattedCount = formatUserCount(totalVerifiedUsers);
  const totalNumElement = document.getElementById("totalNum");
  totalNumElement.textContent = formattedCount;
};

// Listen for changes in the "Users" node and update the total verified user count
onValue(usersRef, updateTotalVerifiedUsers);
