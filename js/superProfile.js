import { onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-auth.js";
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
import {
  getDatabase,
  ref,
  get,
  update,
} from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";
import {
  getStorage,
  ref as storageRef,
  uploadBytes,
  getDownloadURL,
} from "https://www.gstatic.com/firebasejs/10.4.0/firebase-storage.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-auth.js";

import firebaseConfig from "./firebaseConfig.js";

const app = initializeApp(firebaseConfig);
const db = getDatabase(app);
const auth = getAuth(app);
const storage = getStorage(app);
let isEditing = false;

onAuthStateChanged(auth, (user) => {
  if (user) {
    const uid = user.uid;
    const userRef = ref(db, `SuperAdminAcc/${uid}`);

    // Function to update the user data
    const updateUserData = (field, value) => {
      update(userRef, { [field]: value });
      isEditing = true;
      showSaveButton();
    };

    // Function to show the "Save" button
    const showSaveButton = () => {
      const saveBtn = document.getElementById("saveBtn");
      if (isEditing) {
        saveBtn.style.display = "block";
      } else {
        saveBtn.style.display = "none";
      }
    };

    // Function to handle save button click
    const handleSaveButtonClick = () => {
      const confirmation = confirm("Are you sure to save the changes?");
      if (confirmation) {
        console.log("Changes saved!");
        showSuccessAlert();
      } else {
        console.log("Changes not saved.");
      }
    };

    // Function to show success alert
    const showSuccessAlert = () => {
      alert("Changes saved successfully!");
    };

    // Function to handle image change
    const handleImageChange = (file) => {
      const confirmation = confirm(
        "Are you sure to change the profile picture?"
      );
      if (confirmation) {
        const storageRefVar = storageRef(storage, `profileSuperImages/${uid}`);
        uploadBytes(storageRefVar, file).then(() => {
          getDownloadURL(storageRefVar).then((downloadURL) => {
            updateUserData("ImageProfile", downloadURL);
            document.getElementById("profileSuperImage").src = downloadURL;
            showImageChangeSuccessAlert();
          });
        });
      }
    };

    // Function to show image change success alert
    const showImageChangeSuccessAlert = () => {
      alert("Profile picture changed successfully!");
    };

    get(userRef).then((snapshot) => {
      const userData = snapshot.val();

      // Update the DOM elements with user data
      document.getElementById("profileImage").src =
        userData.ImageProfile || "img/profile.png";
      document.getElementById("firstname").value = userData.firstname || "";
      document.getElementById("lastname").value = userData.lastname || "";
      document.getElementById("middlename").value = userData.middlename || "";
      document.getElementById("accountcontact").value =
        userData.contactNumber || "";
      document.getElementById("accountemail").value = userData.email || "";
      document.getElementById("accountgender").value = userData.gender || "";
      document.getElementById("accountbday").value = userData.birthday || "";
      document.getElementById("accountposition").value =
        userData.position || "";

      // Event listener for editing the firstname
      document
        .getElementById("firstname")
        .addEventListener("input", (event) => {
          updateUserData("firstname", event.target.value);
        });

      // Event listener for editing the lastname
      document.getElementById("lastname").addEventListener("input", (event) => {
        updateUserData("lastname", event.target.value);
      });

      // Event listener for editing the middlename
      document
        .getElementById("middlename")
        .addEventListener("input", (event) => {
          updateUserData("middlename", event.target.value);
        });

      // Event listener for editing the contactNumber
      document
        .getElementById("accountcontact")
        .addEventListener("input", (event) => {
          updateUserData("contactNumber", event.target.value);
        });

      // Event listener for editing the gender
      document
        .getElementById("accountgender")
        .addEventListener("input", (event) => {
          updateUserData("gender", event.target.value);
        });

      // Event listener for editing the birthday
      document
        .getElementById("accountbday")
        .addEventListener("input", (event) => {
          updateUserData("birthday", event.target.value);
        });

      // Event listener for editing the position
      document
        .getElementById("accountposition")
        .addEventListener("input", (event) => {
          updateUserData("position", event.target.value);
        });

      // Event listener for uploading a new profile image
      document.getElementById("file").addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file) {
          handleImageChange(file);
        }
      });

      // Event listener for save button click
      document
        .getElementById("saveBtn")
        .addEventListener("click", handleSaveButtonClick);
    });

    console.log("User is logged in:", user);
  } else {
    console.log("User is logged out");
  }
});
