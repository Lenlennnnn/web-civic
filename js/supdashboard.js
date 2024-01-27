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
  } else {
    console.log("User is logged out");
  }
});

const tableBody = document.querySelector("#tableevents tbody");
let rowNumber = 1;

// Function to open the modal and display event details
function openEventModal(eventData) {
  const modal = document.getElementById("eventModalupcom");
  const eventDetailsContainer = document.getElementById("eventDetailsupcom");

  // Function to determine whether to show payment fields
  function shouldShowPaymentFields(category) {
    return category === "Fund Raising" || category === "Donation";
  }

  function generatePaymentFieldsHTML(eventData) {
    if (shouldShowPaymentFields(eventData.category)) {
      return `
                <p id="payRecipLabel"><strong>Payment Recipient:</strong>
                    <input class="form-control" id="payRecip" type="text" value="${
                      eventData.paymentRecipient || "N/A"
                    }" readonly>
                </p>
              <p  id="fundLabel">
  <strong>Fund Collected:</strong>
  <input class="form-control" id="fundCollectedField" type="text" value="₱ ${
    formatDecimal(eventData.fundcollected) || "N/A"
  }" readonly>
</p>
                <p id="payMethLabel"><strong>Payment Method:</strong>
                    <input class="form-control" id="payMeth" type="text" value="${
                      eventData.paymentMethod || "N/A"
                    }" readonly>
                </p>
            `;
    }
    return "";
  }

  eventDetailsContainer.innerHTML = `
        <img src="${
          eventData.image || "N/A"
        }" alt="Event Image" class="eventpic" id="upcompostpic" />
         <p id="labelImage" style="display: none;">Choose an Image:</p>
        <input type="file" id="imagePost" name="image" accept="image/*" required style="display: none;">
         <p>
    <strong>Category:</strong>
    <select id="categoryField" name="categoryField" required disabled >
      <option value="" disabled selected>
        Choose a Category
      </option>
      <option value="Tree Planting" ${
        eventData.category === "Tree Planting" ? "selected" : ""
      }>
        Tree Planting
      </option>
      <option value="Fund Raising" id="fund" ${
        eventData.category === "Fund Raising" ? "selected" : ""
      }>
        Fund Raising
      </option>
      <option value="Donation" id="donation" ${
        eventData.category === "Donation" ? "selected" : ""
      }>
        Donation
      </option>
      <option value="Clean Up Drive" ${
        eventData.category === "Clean Up Drive" ? "selected" : ""
      }>
        Clean Up Drive
      </option>
      <option value="Feeding Program" ${
        eventData.category === "Feeding Program" ? "selected" : ""
      }>
        Feeding Program
      </option>
      <option value="Relief Operation" ${
        eventData.category === "Relief Operation" ? "selected" : ""
      }>
        Relief Operation
      </option>
      <option value="Seminar Training" ${
        eventData.category === "Seminar Training" ? "selected" : ""
      }>
        Seminar Training
      </option>
      <option value="Teaching Literacy" ${
        eventData.category === "Teaching Literacy" ? "selected" : ""
      }>
        Teaching Literacy
      </option>
    </select>
  </p>
        <p><strong>Title:</strong>
        <input class="form-control" id="titleField" type="text" value="${
          eventData.titleEvent
            ? eventData.titleEvent.replace(/"/g, "&quot;")
            : "N/A"
        }" readonly>
    </p>
        
        <p><strong>Campus:</strong>
          <input class="form-control" id="campusField" type="text" value="${
            eventData.campus || "N/A"
          }" readonly>
        </p>
        <p><strong>Location:</strong>
          <input class="form-control" id="locationField" type="text" value="${
            eventData.location
              ? eventData.location.replace(/"/g, "&quot;")
              : "N/A"
          }" readonly>
        </p>
        <p><strong>Start Date:</strong>
          <input class="form-control" id="startDateField" type="text" value="${
            eventData.startDate || "N/A"
          }" readonly>
        </p>
        <p><strong>End Date:</strong>
          <input class="form-control" id="endDateField" type="text" value="${
            eventData.endDate || "N/A"
          }" readonly>
        </p>
        <h3>Description</h3>
        <p>&nbsp;</p>
        <p><strong>Introduction:</strong></p>
        <textarea class="form-control" rows="7" id="introductionField" readonly>${
          eventData.intro ? eventData.intro.replace(/"/g, "&quot;") : "N/A"
        }</textarea>
        <p><strong>Objectives:</strong></p>
        <textarea class="form-control" rows="7" id="objectiveField" readonly>${
          eventData.objective
            ? eventData.objective.replace(/"/g, "&quot;")
            : "N/A"
        }</textarea>
        <p><strong>Instruction:</strong></p>
        <textarea class="form-control" rows="7" id="instructionField" readonly>${
          eventData.instruction
            ? eventData.instruction.replace(/"/g, "&quot;")
            : "N/A"
        }</textarea>
      <p>
  <strong>Target Participant:</strong>
  <input
    class="form-control"
    id="targetField"
    type="text"
    value="${eventData.targetparty || "N/A"}"
    readonly
    pattern="[0-9]+"
    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
  >
</p>    
        <p><strong>Facilitators Name:</strong>
          <input class="form-control" id="facilitatorField" type="text" value="${
            eventData.facilitatorsName
              ? eventData.facilitatorsName.replace(/"/g, "&quot;")
              : "N/A"
          }" readonly>
        </p>
        <p><strong>Facilitators Contractor Email:</strong>
          <input class="form-control" id="facilitatorNField" type="text" value="${
            eventData.facilitatorsContactorEmail
              ? eventData.facilitatorsContactorEmail.replace(/"/g, "&quot;")
              : "N/A"
          }" readonly>
        </p>
     <p>
  <strong>Active Points:</strong>
  <input
    class="form-control"
    id="activePtsField"
    type="text"
    value="${eventData.activepoints}"
    readonly
    pattern="[0-9]+"
    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
  >
</p>

<p style="display: none;"  id="payRecipLabel">
    <strong>Payment Recipient:</strong>
    <input class="form-control" id="payRecip" type="text" value="${
      eventData.paymentRecipient
        ? eventData.paymentRecipient.replace(/"/g, "&quot;")
        : "N/A"
    }" readonly>
</p>
<p style="display: none;" id="payMethLabel">
    <strong>Payment Method:</strong>
    <input class="form-control" id="payMeth" type="text" value="${
      eventData.paymentMethod || "N/A"
    }" readonly>
</p>
<p style="display: none;" id="fundLabel">
  <strong>Fund Collected:</strong>
  <input class="form-control" id="fundCollectedField" type="text" value="₱ ${
    formatDecimal(eventData.fundcollected) || "N/A"
  }" readonly>
</p>
       ${generatePaymentFieldsHTML(eventData)}
      `;

  // Show the modal
  modal.style.display = "block";
}

function closeModalEventModal() {
  const modal = document.getElementById("eventModalupcom");
  modal.style.display = "none"; // Hide the modal

  // Reset buttons and fields to their original state
  resetButtonsAndFields();
}
function formatDecimal(value) {
  if (value !== undefined && value !== null) {
    // Use toFixed(2) to round to 2 decimal places
    return parseFloat(value).toFixed(2);
  }
  return null;
}
function resetButtonsAndFields() {
  const editBtn = document.getElementById("editBtn");
  const saveBtn = document.getElementById("saveBtn");
  const terminateBtn = document.getElementById("terminate");
  const categoryField = document.getElementById("categoryField");
  categoryField.setAttribute("disabled", true);
  // Reset button text and remove event listeners
  editBtn.textContent = "Edit";
  editBtn.removeEventListener("click", enableEditing);
  editBtn.removeEventListener("click", cancelEditing);
  saveBtn.removeEventListener("click", saveChanges);

  // Hide save button
  saveBtn.style.display = "none";

  // Adjust terminate button position
  terminateBtn.style.right = "69%";

  // Disable editing for each field
  editableFields.forEach((fieldId) => {
    const field = document.getElementById(fieldId);
    if (
      fieldId === "upcompostpic" ||
      fieldId === "startDateField" ||
      fieldId === "endDateField"
    ) {
      field.setAttribute("readonly", true);
    } else {
      field.readOnly = true;
    }
  });

  // Add event listener for the edit button
  editBtn.addEventListener("click", enableEditing);
}
// Add click event listener to the close button of "eventModalupcom"
const closeModalButtonEventModal =
  document.getElementById("closemodalbtnupcom");
closeModalButtonEventModal.addEventListener("click", closeModalEventModal);

document.addEventListener("click", function (event) {
  if (event.target && event.target.classList.contains("vieweventdet")) {
    const clickedRow = event.target.closest("tr");
    const eventId = clickedRow.getAttribute("data-event-id");

    // Remove the 'selected-event' class from all rows
    const allRows = document.querySelectorAll("tr.selected-event");
    allRows.forEach((row) => row.classList.remove("selected-event"));

    // Add the 'selected-event' class to the clicked row
    clickedRow.classList.add("selected-event");

    // Reference the specific event node in Firebase
    const eventRef = ref(db, `Upload_Engagement/${eventId}`);
    const participantsRef = ref(
      db,
      `Upload_Engagement/${eventId}/Participants`
    );
    function formatNumber(num) {
      if (num >= 1000000) {
        return (num / 1000000).toFixed(1) + "M";
      } else if (num >= 1000) {
        return (num / 1000).toFixed(1) + "k";
      } else {
        return num.toString();
      }
    }
    function updateNotificationBadge(count) {
      const notificationBadge = document.getElementById("notificationBadge");
      const formattedCount = formatNumber(count);
      notificationBadge.innerText = formattedCount;
    }

    // Listen for changes in the Participants child
    onValue(participantsRef, (snapshot) => {
      if (snapshot.exists()) {
        const participantsCount = Object.keys(snapshot.val()).length;
        updateNotificationBadge(participantsCount);
      } else {
        // Handle the case where there are no participants
        updateNotificationBadge(0);
      }
    });
    // Retrieve the event data from Firebase
    get(eventRef)
      .then((snapshot) => {
        if (snapshot.exists()) {
          const eventData = snapshot.val();
          openEventModal(eventData);

          // Remove previous event listener for termination button
          const terminateButton = document.getElementById("terminate");
          terminateButton.removeEventListener("click", onDeleteClick);

          // Add a new event listener for termination button
          terminateButton.addEventListener("click", onDeleteClick);
        } else {
          console.log("No data available");
        }
      })
      .catch((error) => {
        console.error("Error getting data:", error);
      });
  }
});

function onDeleteClick() {
  const confirmation = confirm("Are you sure to delete this Engagement?");
  if (confirmation) {
    // Find the clicked row
    const clickedRow = document.querySelector("tr.selected-event");

    if (clickedRow) {
      const eventId = clickedRow.getAttribute("data-event-id");
      const eventRef = ref(db, `Upload_Engagement/${eventId}`);

      // Remove the event from Firebase
      set(eventRef, null)
        .then(() => {
          alert("Engagement deleted successfully!");
          closeModalEventModal(); // Close the modal after deletion
        })
        .catch((error) => {
          console.error("Error deleting engagement:", error);
        });
    } else {
      console.error("Clicked row is null");
    }
  }
}

function hasEventEnded(endDate) {
  const currentDateTime = new Date();
  const eventEndDate = new Date(endDate);
  return eventEndDate < currentDateTime;
}
function handleCategoryChange() {
  const selectedCategory = categoryField.value;
  const payRecipField = document.getElementById("payRecip");
  const payMethField = document.getElementById("payMeth");
  const payRecipLabel = document.getElementById("payRecipLabel");
  const payMethLabel = document.getElementById("payMethLabel");
  const fundLabel = document.getElementById("fundLabel");
  const fundCollectedField = document.getElementById("fundCollectedField");
  // Check if the selected category is "Fund Raising" or "Donation"
  if (selectedCategory === "Fund Raising" || selectedCategory === "Donation") {
    // Show the payment fields and labels
    payRecipField.style.display = "block";
    payMethField.style.display = "block";
    payRecipLabel.style.display = "block";
    payMethLabel.style.display = "block";
    fundLabel.style.display = "block";
    fundCollectedField.style.display = "block";
  } else {
    // Hide the payment fields and labels
    payRecipField.style.display = "none";
    payMethField.style.display = "none";
    payRecipLabel.style.display = "none";
    payMethLabel.style.display = "none";
    fundLabel.style.display = "none";
    fundCollectedField.style.display = "none";
  }
}

const campusFilterSelect = document.querySelector("#campusfilter select");
const searchInput = document.querySelector("#searchfilter input");

campusFilterSelect.addEventListener("change", function () {
  let selectedCampus = this.value === "All Campus" ? "" : this.value;
  const searchTerm = searchInput.value.trim();
  displayEventData(searchTerm, selectedCampus);
});

searchInput.addEventListener("input", function () {
  const searchTerm = this.value.trim();
  const selectedCampus =
    campusFilterSelect.value === "All Campus" ? "" : campusFilterSelect.value;
  displayEventData(searchTerm, selectedCampus);
});
function displayEventData(searchTerm = "", selectedCampus = "") {
  const uploadEngagementRef = ref(db, "Upload_Engagement");

  onValue(uploadEngagementRef, (snapshot) => {
    tableBody.innerHTML = ""; // Clear existing table data
    rowNumber = 1; // Reset row number

    const events = []; // Array to store events for sorting

    snapshot.forEach((childSnapshot) => {
      const uploadData = childSnapshot.val();

      // Check if the verificationStatus child exists and is true
      if (
        uploadData.hasOwnProperty("verificationStatus") &&
        uploadData.verificationStatus === true
      ) {
        const {
          campus,
          category,
          startDate,
          endDate,
          titleEvent,
          image,
          location,
          // Add other fields you want to retrieve from Firebase
        } = uploadData;

        // Check if the event has already ended
        if (!hasEventEnded(endDate)) {
          // Check if the selected campus is present in the campus field
          if (
            selectedCampus === "" ||
            campus.toLowerCase().includes(selectedCampus.toLowerCase())
          ) {
            events.push({
              id: childSnapshot.key,
              startDate: new Date(startDate),
              data: uploadData,
            });
          }
        }
      }
    });

    // Sort events based on startDate in ascending order
    events.sort((a, b) => a.startDate - b.startDate);

    // Filter events based on the search term in any field
    const filteredEvents = events.filter((event) =>
      Object.values(event.data).some(
        (value) =>
          typeof value === "string" &&
          value.toLowerCase().includes(searchTerm.toLowerCase())
      )
    );

    // Insert filtered events into the table
    if (filteredEvents.length > 0) {
      filteredEvents.forEach((event) => {
        const {
          campus,
          category,
          startDate,
          endDate,
          titleEvent,
          image,
          location,
        } = event.data;

        const newRow = tableBody.insertRow();
        newRow.innerHTML = `
                    <td>${rowNumber}</td>
                    <td><img src="${image}" class="eventpic" alt="Event Image"/></td>
                    <td>${titleEvent || "N/A"}</td>
                    <td>${category || "N/A"}</td>
                    <td>${campus || "N/A"}</td>
                    <td>${startDate.toLocaleString() || "N/A"} -- ${
          endDate || "N/A"
        }</td>
                    <td>
                        <button type="button" class="vieweventdet" title="View Details" data-toggle="tooltip">View</button>
                    </td>
                `;
        newRow.setAttribute("data-event-id", event.id); // Set the event ID as an attribute in the table row
        rowNumber++;
      });
    } else {
      // Add default row when there are no events to display
      const defaultRow = tableBody.insertRow();
      defaultRow.id = "defaultRow";
      defaultRow.innerHTML = `
                <td id="numid">0</td>
                <td>
                    <a href="#">
                        <img src="img/cleaning.jpg" class="eventpic" alt="Avatar" id="eventpicimg" />
                    </a>
               <td colspan="7" style="text-align: center;">
              No Civic Engagement events are currently available.

            </td>
            `;
    }
  });
}

const editableFields = [
  "upcompostpic",
  "titleField",
  "categoryField",
  "campusField",
  "locationField",
  "payMeth",
  "payRecip",
  "startDateField",
  "endDateField",
  "introductionField",
  "objectiveField",
  "instructionField",
  "targetField",
  "facilitatorField",
  "facilitatorNField",
  "activePtsField",
];
let eventRef;
function handleImageSelection() {
  const imagePost = document.getElementById("imagePost");
  const upcompostpic = document.getElementById("upcompostpic");

  const selectedImage = imagePost.files[0];
  const imageURL = URL.createObjectURL(selectedImage);

  // Update the image source in upcompostpic
  upcompostpic.src = imageURL;
}
const originalValues = {};
function enableEditing() {
  const editBtn = document.getElementById("editBtn");
  const saveBtn = document.getElementById("saveBtn");
  const campusField = document.getElementById("campusField");
  const terminateBtn = document.getElementById("terminate");
  const categoryField = document.getElementById("categoryField");

  saveBtn.style.display = "inline-block";
  terminateBtn.style.right = "58%";

  // Enable editing for each field
  editableFields.forEach((fieldId) => {
    const field = document.getElementById(fieldId);

    if (fieldId === "upcompostpic") {
      // Enable selecting an image
      field.removeAttribute("readonly");
    } else if (fieldId === "startDateField" || fieldId === "endDateField") {
      // Enable editing with type="datetime-local"
      field.removeAttribute("readonly");
      const dateValue = field.value;
      const formattedDate = reverseFormatDateTime(dateValue);
      field.value = formattedDate;
    } else {
      // Enable editing for other fields
      field.readOnly = false;
    }
  });
  editableFields.forEach((fieldId) => {
    const field = document.getElementById(fieldId);
    originalValues[fieldId] = field.value;
  });
  // Remove the current event listener for the edit button
  editBtn.removeEventListener("click", enableEditing);

  // Add a new event listener for the save button
  saveBtn.addEventListener("click", saveChanges);

  // Change edit button text and add click event listener for cancel
  editBtn.textContent = "Cancel";
  editBtn.addEventListener("click", cancelEditing);

  const labelImage = document.getElementById("labelImage");
  const imagePost = document.getElementById("imagePost");

  // Show labelImage and imagePost
  labelImage.style.display = "block";
  imagePost.style.display = "block";

  imagePost.addEventListener("change", handleImageSelection);

  campusField.addEventListener("click", showCampusModal);
  categoryField.addEventListener("change", handleCategoryChange);
  categoryField.removeAttribute("disabled");
  // Call the handleCategoryChange function initially to set the initial state
  handleCategoryChange();
}

function setInitialCampusSelection() {
  const campusField = document.getElementById("campusField");
  const campusForm = document.getElementById("campusForm");

  // Split the campusField value into an array of selected campuses
  const selectedCampuses = campusField.value.split(", ");

  // Check the checkboxes based on the selected campuses
  Array.from(campusForm.elements).forEach((checkbox) => {
    checkbox.checked = selectedCampuses.includes(checkbox.value);
  });
}

function showCampusModal() {
  // Display the campus modal
  const campusModal = document.getElementById("myModalnm");
  campusModal.style.display = "block";

  // Set the initial state of checkboxes based on the current value in campusField
  setInitialCampusSelection();

  // Disable keyboard input for the campusField
  const campusField = document.getElementById("campusField");
  campusField.readOnly = true;

  // Add event listener for the "Ok" button in the campus modal
  const okButton = document.getElementById("okButton");
  okButton.addEventListener("click", updateCampusField);
}

function updateCampusField() {
  const campusForm = document.getElementById("campusForm");
  const selectedCampuses = Array.from(campusForm.elements)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.value);

  // Update the #campusField with selected campuses separated by commas
  const campusField = document.getElementById("campusField");
  campusField.value = selectedCampuses.join(", ");

  // Close the campus modal
  const campusModal = document.getElementById("myModalnm");
  campusModal.style.display = "none";
}
function cancelEditing() {
  const editBtn = document.getElementById("editBtn");
  const saveBtn = document.getElementById("saveBtn");
  const terminateBtn = document.getElementById("terminate");

  saveBtn.style.display = "none";
  terminateBtn.style.right = "69%";

  // Remove the current event listener for the cancel button
  editBtn.removeEventListener("click", cancelEditing);

  // Add a new event listener for the edit button
  editBtn.textContent = "Edit";
  editBtn.addEventListener("click", enableEditing);

  // Disable editing for each field and revert to original values
  editableFields.forEach((fieldId) => {
    const field = document.getElementById(fieldId);
    if (
      fieldId === "upcompostpic" ||
      fieldId === "startDateField" ||
      fieldId === "endDateField"
    ) {
      field.setAttribute("readonly", true);
    } else {
      field.readOnly = true;
    }

    // Revert to the original value
    field.value = originalValues[fieldId];
  });

  const labelImage = document.getElementById("labelImage");
  const imagePost = document.getElementById("imagePost");

  // Show labelImage and imagePost
  labelImage.style.display = "none";
  imagePost.style.display = "none";
}

function saveChanges() {
  const confirmation = confirm("Are you sure to save the changes?");
  const imagePost = document.getElementById("imagePost");
  const upcompostpic = document.getElementById("upcompostpic");

  // Check if a new image is selected
  if (imagePost.files.length > 0) {
    const file = imagePost.files[0];
    const timestamp = new Date().getTime();
    const storagePath = `Poster Civic Images/${timestamp}_${file.name}`;
    const storageRefPath = storageRef(storages, storagePath);

    // Upload the new image to Firebase Storage
    uploadBytes(storageRefPath, file).then((snapshot) => {
      // Get the download URL of the uploaded image
      getDownloadURL(snapshot.ref).then((downloadURL) => {
        // Update the image URL in Firebase Realtime Database
        update(eventRef, {
          image: downloadURL,
        });

        // Update the image source in upcompostpic
        upcompostpic.src = downloadURL;
      });
    });
  }

  if (confirmation) {
    // Validation for startDate and endDate
    const startDateInput = document.getElementById("startDateField");
    const endDateInput = document.getElementById("endDateField");

    // Check if the entered date values are valid
    if (
      isNaN(new Date(startDateInput.value).getTime()) ||
      isNaN(new Date(endDateInput.value).getTime())
    ) {
      alert("Please enter valid date and time.");
      return;
    }

    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);

    const now = new Date();

    if (endDate <= startDate) {
      alert(
        "Please select an end date and time greater than the start date and time."
      );
      return;
    }

    const eventId = document
      .querySelector("tr.selected-event")
      .getAttribute("data-event-id");
    eventRef = ref(db, `Upload_Engagement/${eventId}`); // Update eventRef

    // Update the values in Firebase
    update(eventRef, {
      titleEvent: document.getElementById("titleField").value,
      category: document.getElementById("categoryField").value,
      campus: document.getElementById("campusField").value,
      location: document.getElementById("locationField").value,
      startDate: reverseFormatDateTime(startDateInput.value),
      endDate: reverseFormatDateTime(endDateInput.value),
      intro: document.getElementById("introductionField").value,
      paymentMethod: document.getElementById("payMeth").value,
      paymentRecipient: document.getElementById("payRecip").value,
      objective: document.getElementById("objectiveField").value,
      instruction: document.getElementById("instructionField").value,
      targetparty: parseInt(document.getElementById("targetField").value, 10),
      facilitatorsName: document.getElementById("facilitatorField").value,
      facilitatorsContactorEmail:
        document.getElementById("facilitatorNField").value,
      activepoints: parseInt(
        document.getElementById("activePtsField").value,
        10
      ),
    })
      .then(() => {
        alert("Changes saved successfully!");
        closeModalEventModal(); // Close the modal after saving changes
      })
      .catch((error) => {
        console.error("Error saving changes:", error);
      });
  }
}
document
  .getElementById("closeModaldetail")
  .addEventListener("click", function () {
    document.getElementById("eventModalupcom").style.display = "none";
    resetButtonsAndFields();
  });
function reverseFormatDateTime(dateTimeString) {
  const options = {
    year: "numeric",
    month: "2-digit",
    day: "2-digit",
    hour: "numeric",
    minute: "numeric",
  };

  const reverseFormattedDate = new Date(dateTimeString)
    .toLocaleDateString("en-US", options)
    .replace(/,/g, ""); // Remove commas from the formatted date string

  return reverseFormattedDate;
}

const editBtn = document.getElementById("editBtn");
editBtn.addEventListener("click", enableEditing);
displayEventData();
function initRealtimeListener(uid, eventId) {
  const participantRef = ref(
    db,
    `Upload_Engagement/${eventId}/Participants/${uid}`
  );

  onValue(participantRef, (snapshot) => {
    const participantData = snapshot.val();

    // Check if the participant has already joined and attended
    const isAlreadyAttended =
      participantData.joined && participantData.attendedStamp;

    // Update the button style based on real-time changes
    const button = document.querySelector(
      `#atdbtn[data-uid="${uid}"][data-event-id="${eventId}"]`
    );
    if (button) {
      button.classList.remove("btn-success", "btn-danger");
      button.classList.add(isAlreadyAttended ? "btn-danger" : "btn-success");
      button.textContent = isAlreadyAttended ? "Cancel" : "Confirm";
    }
  });
}
function tableParticipants(eventId) {
  const participantsTable = document
    .getElementById("tableParticipants")
    .getElementsByTagName("tbody")[0];

  const participantsRef = ref(db, `Upload_Engagement/${eventId}/Participants`);

  // Fetch the event category from the database
  const eventCategoryRef = ref(db, `Upload_Engagement/${eventId}/category`);

  // Use onValue to listen for changes in participants and event category in real-time
  onValue(participantsRef, (participantsSnapshot) => {
    onValue(eventCategoryRef, (categorySnapshot) => {
      // Clear the table before updating it
      participantsTable.innerHTML = "";

      if (participantsSnapshot.exists()) {
        participantsSnapshot.forEach((participantSnapshot) => {
          const uid = participantSnapshot.key;
          const participantData = participantSnapshot.val();
          const isAlreadyAttended =
            participantData.joined && participantData.attendedStamp;
          const userRef = ref(db, `Users/${uid}`);

          get(userRef).then((userSnapshot) => {
            if (userSnapshot.exists()) {
              const userData = userSnapshot.val();

              // Create a new row for each participant
              const newRow = participantsTable.insertRow();
              newRow.innerHTML = `
                                <td>${uid}</td>
                                   <td>${userData.srcode}</td>
                                <td>${userData.lastname}, ${
                userData.firstname
              } ${userData.middlename}</td>
                                <td>${userData.campus}</td>
                                ${
                                  categorySnapshot.val() === "Fund Raising" ||
                                  categorySnapshot.val() === "Donation"
                                    ? `<td>
                                                <a href="#" id="proof" style="color: #dc3545; text-decoration: underline;">View the Image</a>
                                            </td>`
                                    : ""
                                }
                                <td>
                                    <button class="btn ${
                                      isAlreadyAttended
                                        ? "btn-danger"
                                        : "btn-success"
                                    }" id="atdbtn" data-uid="${uid}" data-event-id="${eventId}">
                                        ${
                                          isAlreadyAttended
                                            ? "Cancel"
                                            : "Confirm"
                                        }
                                    </button>
                                </td>
                            `;

              initRealtimeListener(uid, eventId);

              // Add event listener for "proof" link
              const proofLink = newRow.querySelector("#proof");
              proofLink.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent the default behavior of the link (opening in the same tab)

                const transparencyImageRef = ref(
                  db,
                  `Upload_Engagement/${eventId}/TransparencyImage/${uid}`
                );
                get(transparencyImageRef)
                  .then((imageSnapshot) => {
                    if (imageSnapshot.exists()) {
                      const imageUri = imageSnapshot.val().imageUri;

                      // Open the imageUri link in a new tab
                      window.open(imageUri, "_blank");
                    } else {
                      console.error("Image data not found for UID:", uid);
                    }
                  })
                  .catch((error) => {
                    console.error("Error fetching image data:", error);
                  });
              });
            }
          });
        });
      } else {
        // If there are no participants, add a row with a message
        const noParticipantsRow = participantsTable.insertRow();
        noParticipantsRow.innerHTML = `
                    <td colspan="${
                      categorySnapshot.val() === "Fund Raising" ||
                      categorySnapshot.val() === "Donation"
                        ? 5
                        : 4
                    }" class="center-text">
                        Currently, there are no participants at the moment.
                    </td>
                `;
      }

      // Hide the "Proof" column header if the category is neither "Fund Raising" nor "Donation"
      const proofHead = document.getElementById("proofHead");
      proofHead.style.display =
        categorySnapshot.val() === "Fund Raising" ||
        categorySnapshot.val() === "Donation"
          ? ""
          : "none";
    });
  });
}

document.addEventListener("click", function (event) {
  if (event.target && event.target.id === "atdbtn") {
    const uid = event.target.getAttribute("data-uid");
    const eventId = event.target.getAttribute("data-event-id");
    const participantRef = ref(
      db,
      `Upload_Engagement/${eventId}/Participants/${uid}`
    );

    get(participantRef)
      .then((participantSnapshot) => {
        const participantData = participantSnapshot.val();

        if (participantData.joined && participantData.attendedStamp) {
          // If already attended, cancel the attendance
          cancelAttendance(uid, eventId);
        } else {
          // Confirm the attendance
          confirmAttendance(uid, eventId);
        }
      })
      .catch((error) => {
        console.error("Error fetching participant data:", error);
        alert("Error confirming/canceling attendance. Please try again.");
      });
  }
});

// Using event delegation for the 'proof' link
document.addEventListener("click", function (event) {
  if (event.target && event.target.id === "proof") {
    event.preventDefault();

    const row = event.target.closest("tr");
    const uid = row.querySelector("[data-uid]").getAttribute("data-uid");
    const eventId = row
      .querySelector("[data-event-id]")
      .getAttribute("data-event-id");

    const transparencyImageRef = ref(
      db,
      `Upload_Engagement/${eventId}/TransparencyImage/${uid}`
    );

    get(transparencyImageRef)
      .then((imageSnapshot) => {
        if (imageSnapshot.exists()) {
          const imageUri = imageSnapshot.val().imageUri;

          // Open the imageUri link in a new tab
          window.open(imageUri, "_blank");
        } else {
          console.error("Image data not found for UID:", uid);
        }
      })
      .catch((error) => {
        console.error("Error fetching image data:", error);
      });
  }
});

function confirmAttendance(uid, eventId) {
  const confirmAttendance = confirm(
    "Are you sure to confirm the user's attendance?"
  );

  if (confirmAttendance) {
    const participantRef = ref(
      db,
      `Upload_Engagement/${eventId}/Participants/${uid}`
    );
    const transparencyImageRef = ref(
      db,
      `Upload_Engagement/${eventId}/TransparencyImage/${uid}`
    );
    const eventRef = ref(db, `Upload_Engagement/${eventId}`);

    // Get the event category
    const eventCategoryRef = ref(db, `Upload_Engagement/${eventId}/category`);

    // Use Promise.all to fetch both participants, event category, and TransparencyImage data
    Promise.all([
      get(participantRef),
      get(transparencyImageRef),
      get(eventCategoryRef),
      get(eventRef),
    ])
      .then(
        ([
          participantSnapshot,
          transparencyImageSnapshot,
          categorySnapshot,
          eventSnapshot,
        ]) => {
          const participantData = participantSnapshot.val();
          const transparencyImageData = transparencyImageSnapshot.val();

          if (!participantData.joined || !participantData.attendedStamp) {
            // If not already attended, confirm the attendance
            const timestamp = generateTimestamp();

            // Update participant data
            const updates = {
              joined: true,
              attendedStamp: timestamp,
            };
            update(participantRef, updates);

            // Update fundcollected if category is "Fund Raising" or "Donation"
            if (
              categorySnapshot.val() === "Fund Raising" ||
              categorySnapshot.val() === "Donation"
            ) {
              const newFundCollected =
                eventSnapshot.val().fundcollected +
                transparencyImageData.amount;

              update(eventRef, { fundcollected: newFundCollected });

              // Also update TransparencyImage contributionStatus
              update(transparencyImageRef, { contributionStatus: true });
            }

            alert("Attendance confirmed successfully!");
          } else {
            alert("User has already confirmed attendance.");
          }
        }
      )
      .catch((error) => {
        console.error("Error confirming attendance:", error);
        alert("Error confirming attendance. Please try again.");
      });
  }
}

function cancelAttendance(uid, eventId) {
  const cancelAttendance = confirm(
    "Are you sure to cancel the user's attendance?"
  );

  if (cancelAttendance) {
    const participantRef = ref(
      db,
      `Upload_Engagement/${eventId}/Participants/${uid}`
    );
    const transparencyImageRef = ref(
      db,
      `Upload_Engagement/${eventId}/TransparencyImage/${uid}`
    );
    const eventRef = ref(db, `Upload_Engagement/${eventId}`);

    Promise.all([get(participantRef), get(transparencyImageRef), get(eventRef)])
      .then(
        ([participantSnapshot, transparencyImageSnapshot, eventSnapshot]) => {
          const participantData = participantSnapshot.val();
          const transparencyImageData = transparencyImageSnapshot.val();

          if (participantData.joined && participantData.attendedStamp) {
            // If already attended, cancel the attendance
            const updates = { joined: false, attendedStamp: null };

            // Update participant data
            update(participantRef, updates);

            // Update fundcollected if category is "Fund Raising" or "Donation"
            if (
              eventSnapshot.val().category === "Fund Raising" ||
              eventSnapshot.val().category === "Donation"
            ) {
              const newFundCollected =
                eventSnapshot.val().fundcollected -
                transparencyImageData.amount;

              update(eventRef, { fundcollected: newFundCollected });

              // Also update TransparencyImage contributionStatus
              update(transparencyImageRef, { contributionStatus: false });
            }

            alert("Attendance canceled successfully!");
          } else {
            alert("User has not confirmed attendance yet.");
          }
        }
      )
      .catch((error) => {
        console.error("Error canceling attendance:", error);
        alert("Error canceling attendance. Please try again.");
      });
  }
}

const modalAttendeeIcon = document.getElementById("modalAttendee");
modalAttendeeIcon.addEventListener("click", function () {
  // Display the modal with id "myModalat"
  const modalAt = document.getElementById("myModalat");
  modalAt.style.display = "block";

  // Get the eventId from the selected row
  const eventId = document
    .querySelector("tr.selected-event")
    .getAttribute("data-event-id");

  // Call the tableParticipants function to populate the table
  tableParticipants(eventId);

  // Handle the close button inside the modal
  const closeAt = document.getElementsByClassName("closeat")[0];
  closeAt.addEventListener("click", function () {
    modalAt.style.display = "none";
  });

  // Handle clicks outside the modal to close it
  window.addEventListener("click", function (event) {
    if (event.target == modalAt) {
      modalAt.style.display = "none";
    }
  });
});
function generateTimestamp() {
  const currentDate = new Date();
  const options = {
    timeZone: "Asia/Manila",
    year: "numeric",
    month: "2-digit",
    day: "2-digit",
    hour: "2-digit",
    minute: "2-digit",
    hour12: true,
  };
  return currentDate.toLocaleString("en-US", options).replace(",", "");
}
