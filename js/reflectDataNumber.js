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
const formatCount = (count) => {
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
  const formattedCount = formatCount(totalVerifiedUsers);
  const totalNumElement = document.getElementById("totalNum");
  totalNumElement.textContent = formattedCount;
};

// Listen for changes in the "Users" node and update the total verified user count
onValue(usersRef, updateTotalVerifiedUsers);
const uploadEngagementRef = ref(db, "Upload_Engagement");

// Function to update total engagement count with verificationStatus set to false
const updateTotalFalseEngagement = (snapshot) => {
  const engagements = snapshot.val();
  let totalFalseEngagement = 0;

  for (const postKey in engagements) {
    const engagement = engagements[postKey];

    // Check if engagement exists, has verificationStatus set to false, and does not have rejectReason
    if (
      engagement &&
      engagement.verificationStatus === false &&
      !engagement.rejectReason
    ) {
      totalFalseEngagement++;
    }
  }

  // Format and update the total false engagement count in the HTML element
  const formattedCount = formatCount(totalFalseEngagement);
  const totalRequestElement = document.getElementById("totalRequest");
  totalRequestElement.textContent = formattedCount;
};

// Listen for changes in the "Upload_Engagement" node and update the total false engagement count
onValue(uploadEngagementRef, updateTotalFalseEngagement);

const approveNumElement = document.getElementById("approveNum");

// Function to update the number of approved engagements
const updateTotalApprovedEngagements = (snapshot) => {
  const engagements = snapshot.val();
  let totalApprovedEngagements = 0;

  for (const postKey in engagements) {
    const engagement = engagements[postKey];

    if (
      engagement &&
      engagement.verificationStatus === true &&
      engagement.hasOwnProperty("approveBy")
    ) {
      totalApprovedEngagements++;
    }
  }

  const formattedCount = formatCount(totalApprovedEngagements);
  approveNumElement.textContent = formattedCount;
};

// Listen for changes in the "Upload_Engagement" node and update the total approved engagement count
onValue(uploadEngagementRef, updateTotalApprovedEngagements);
const finishNumElement = document.getElementById("finishNum");

// Function to update the number of finished events
const updateTotalFinishedEvents = (snapshot) => {
  const events = snapshot.val();
  let totalFinishedEvents = 0;
  const currentDate = new Date();

  for (const eventKey in events) {
    const event = events[eventKey];

    if (
      event &&
      event.verificationStatus === true &&
      event.hasOwnProperty("endDate")
    ) {
      const eventEndDate = new Date(event.endDate);

      // Check if the event has finished (current date is after the event's end date)
      if (currentDate > eventEndDate) {
        totalFinishedEvents++;
      }
    }
  }

  const formattedCount = formatCount(totalFinishedEvents);
  finishNumElement.textContent = formattedCount;
};

// Listen for changes in the "Upload_Engagement" node and update the total finished events count
onValue(uploadEngagementRef, updateTotalFinishedEvents);
