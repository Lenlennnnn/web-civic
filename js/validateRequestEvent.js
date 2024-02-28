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
              <div id="payDiv">
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
                </div>
            `;
    }
    return "";
  }

  eventDetailsContainer.innerHTML = `
     <img src="${
       eventData.image || "img/placeholderpic.jpg"
     }" alt="Event Image" class="eventpic" id="upcompostpic" />
<strong id="labelImage" style="display: none; margin-top:10px;">Choose an Image:</strong>
<input class="form-control" type="file" id="imagePost" name="image" accept="image/*" required style="display: none; margin-bottom:10px;">

        
          <p style="margin-top: 30px;">
  <strong>Uploaders UID:</strong>
  <input class="form-control" id="uploadersField" type="text" value="${
    eventData.uploadersUID || "N/A"
  }" readonly>
</p>

         <p>
    <strong>Category:</strong>
    <select class="form-control" id="categoryField" name="categoryField" required disabled >
      <option value="Choose a Category"  disabled selected>
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

        <p><strong>Introduction:</strong></p>
        <textarea class="form-control" rows="7" id="introductionField" style="margin-bottom:15px" readonly>${
          eventData.intro ? eventData.intro.replace(/"/g, "&quot;") : "N/A"
        }</textarea>
        <p><strong>Objectives:</strong></p>
        <textarea class="form-control" rows="7" id="objectiveField" style="margin-bottom:15px" readonly>${
          eventData.objective
            ? eventData.objective.replace(/"/g, "&quot;")
            : "N/A"
        }</textarea>
        <p><strong>Instruction:</strong></p>
        <textarea class="form-control" rows="7" id="instructionField" style="margin-bottom:15px" readonly>${
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
  const rejectBtn = document.getElementById("reject");

  categoryField.setAttribute("disabled", true);
  // Reset button text and remove event listeners
  editBtn.textContent = "Edit";
  editBtn.removeEventListener("click", enableEditing);
  editBtn.removeEventListener("click", cancelEditing);
  saveBtn.removeEventListener("click", saveChanges);

  // Hide save button
  saveBtn.style.display = "none";

  // Adjust terminate button position
  terminateBtn.style.right = "68%";
  rejectBtn.style.right = "42%";
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
function handleCategoryChange() {
  const selectedCategory = categoryField.value;
  const payRecipField = document.getElementById("payRecip");
  const payMethField = document.getElementById("payMeth");
  const payRecipLabel = document.getElementById("payRecipLabel");
  const payMethLabel = document.getElementById("payMethLabel");
  const fundLabel = document.getElementById("fundLabel");
  const fundCollectedField = document.getElementById("fundCollectedField");
  const payDiv = document.getElementById("payDiv");
  // Check if the selected category is "Fund Raising" or "Donation"
  if (selectedCategory === "Fund Raising" || selectedCategory === "Donation") {
    // Show the payment fields and labels
    payRecipField.style.display = "block";
    payMethField.style.display = "block";
    payRecipLabel.style.display = "block";
    payMethLabel.style.display = "block";
    fundLabel.style.display = "block";
    fundCollectedField.style.display = "block";
    payDiv.style.display = "none";
  } else {
    // Hide the payment fields and labels
    payRecipField.style.display = "none";
    payMethField.style.display = "none";
    payRecipLabel.style.display = "none";
    payMethLabel.style.display = "none";
    fundLabel.style.display = "none";
    fundCollectedField.style.display = "none";
    payDiv.style.display = "block";
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
    tableBody.innerHTML = "";
    rowNumber = 1;

    const events = [];

    snapshot.forEach((childSnapshot) => {
      const uploadData = childSnapshot.val();
      if (
        uploadData.hasOwnProperty("verificationStatus") &&
        uploadData.verificationStatus === false &&
        !uploadData.hasOwnProperty("rejectReason") // Check if rejectReason does not exist
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
    });

    events.sort((a, b) => b.startDate - a.startDate);

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
  <td style="width: 120px; height: 80px; overflow: hidden;">
  <img src="${
    image || "img/placeholderpic.jpg"
  }" class="eventpic" alt="Event Image" style="width: 100%; height: 100%; object-fit: cover;">
</td>


          <td>${titleEvent || "N/A"}</td>
          <td>${category || "N/A"}</td>
          <td>${location || "N/A"}</td>
         <td style="line-height: 1.5;">${campus || "N/A"}</td>
          <td>${startDate.toLocaleString() || "N/A"} -- ${endDate || "N/A"}</td>
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
          No Civic Engagement Requests are currently available.
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
  const rejectBtn = document.getElementById("reject");

  saveBtn.style.display = "inline-block";
  terminateBtn.style.right = "58%";
  rejectBtn.style.right = "32%";
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
  campusField.removeAttribute("disabled");
  campusField.readOnly = false;
  campusField.addEventListener("click", showCampusModal);
  categoryField.addEventListener("change", handleCategoryChange);
  categoryField.removeAttribute("disabled");

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
  const rejectBtn = document.getElementById("reject");

  saveBtn.style.display = "none";
  terminateBtn.style.right = "68%";
  rejectBtn.style.right = "42%";

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

  // Disable editing for categoryField and campusField
  const categoryField = document.getElementById("categoryField");
  const campusField = document.getElementById("campusField");
  categoryField.setAttribute("disabled", true);
  campusField.setAttribute("disabled", true);
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

function selectAll() {
  var checkboxes = document.querySelectorAll(".checkboxna");
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = true;
  });
}

function deselectAll() {
  var checkboxes = document.querySelectorAll(".checkboxna");
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = false;
  });
}

var selectAllBtn = document.getElementById("selectAllBtnn");
var deselectAllBtn = document.getElementById("deselectAllBtnn");

selectAllBtn.addEventListener("click", selectAll);
deselectAllBtn.addEventListener("click", deselectAll);

var okButton = document.getElementById("okButton");

var span = document.getElementById("closeCampusModal");
var modal = document.getElementById("myModalnm");

span.onclick = function () {
  modal.style.display = "none";
};

okButton.addEventListener("click", function () {
  modal.style.display = "none";

  var campusForm = document.getElementById("campusForm");
  var campusTarget = document.getElementById("campusTarget");

  var selectedCampuses = [];
  var checkboxes = campusForm.querySelectorAll(".checkboxna:checked");
  checkboxes.forEach(function (checkbox) {
    selectedCampuses.push(checkbox.value);
  });

  // Update the campusTarget element with the selected campuses
  campusTarget.value = selectedCampuses.join(", ");
});
// Add event listener to the modalApprove element
const modalApproveButton = document.getElementById("modalApprove");

modalApproveButton.addEventListener("click", function () {
  // Show a confirmation dialog
  const confirmation = confirm("Are you sure to approve this engagement?");

  if (confirmation) {
    const eventId = document
      .querySelector("tr.selected-event")
      .getAttribute("data-event-id");

    const eventRef = ref(db, `Upload_Engagement/${eventId}`);

    // Retrieve the current user's data from SuperAdminAcc using the UID
    const superAdminAccRef = ref(db, `SuperAdminAcc/${currentUserUID}`);
    get(superAdminAccRef).then((snapshot) => {
      if (snapshot.exists()) {
        const userData = snapshot.val();
        const { lastname, firstname } = userData;

        // Retrieve the engagement data
        get(eventRef).then((eventSnapshot) => {
          if (eventSnapshot.exists()) {
            const eventData = eventSnapshot.val();
            const { endDate } = eventData;

            // Check if the endDate is in the past
            if (isDateInPast(endDate)) {
              alert("The end date and time are in the past.");
            } else {
              // Update the verificationStatus to true and add "approveTimeStamp" and "approveBy" children
              const timestamp = generateTimestamp();
              update(eventRef, {
                verificationStatus: true,
                approveTimeStamp: timestamp,
                approveBy: `${lastname}, ${firstname}`,
              })
                .then(() => {
                  alert("Engagement approved successfully!");
                  closeModalEventModal(); // Close the modal after approval
                })
                .catch((error) => {
                  console.error("Error approving engagement:", error);
                });
            }
          } else {
            console.log("Engagement data not found");
          }
        });
      } else {
        console.log("User data not found");
      }
    });
  }
});

// Function to check if a date is in the past
function isDateInPast(dateString) {
  const currentDate = new Date();
  const endDate = new Date(dateString);
  return endDate < currentDate;
}

$(document).ready(function () {
  // Function to handle the click event of the "reject" button
  $("#reject").on("click", function () {
    // Show the decline confirmation modal
    $("#declineConfirmationModal").modal("show");
  });

  // Function to handle the click event of the "confirmDecline" button
  $("#confirmDecline").on("click", function () {
    // Get the value entered in the declineReasonInput textarea
    var declineReason = $("#declineReasonInput").val();

    // Check if eventId is defined
    var selectedEvent = document.querySelector("tr.selected-event");
    if (selectedEvent) {
      var eventId = selectedEvent.getAttribute("data-event-id");

      // Ask for confirmation
      if (confirm("Are you sure to reject this Engagement?")) {
        // Update the specified fields in the Firebase database
        update(ref(db, "Upload_Engagement/" + eventId), {
          rejectReason: declineReason,
          verificationStatus: false,
          rejecttime: generateTimestamp(),
        });

        // Hide the decline confirmation modal
        $("#declineConfirmationModal").modal("hide");

        // Show success alert
        alert("Engagement rejected successfully!");
      } else {
        // If the user cancels, do nothing
        console.log("Rejection cancelled");
      }
    } else {
      console.error("No selected event found");
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
