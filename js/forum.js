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
  remove,
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
function formatNumber(number) {
  if (number < 1000) {
    return number.toString();
  } else if (number < 1000000) {
    return (number / 1000).toFixed(1) + "k";
  } else {
    return (number / 1000000).toFixed(1) + "M";
  }
}
// Fetch data from Firebase and update HTML elements
document
  .getElementById("reportFilter")
  .addEventListener("change", togglePostReportFilter);

let filterEnabled = false; // Variable to track if the filter is enabled

// Function to toggle the post report filter
function togglePostReportFilter(event) {
  filterEnabled = event.target.checked;
  fetchForumPosts(); // Re-fetch forum posts to apply the filter
}
document.getElementById("inputSearch").addEventListener("input", handleSearch);

function handleSearch() {
  const searchTerm = document.getElementById("inputSearch").value.toLowerCase();
  const forumBody = document.getElementById("forumBody");
  const forumPosts = forumBody.querySelectorAll(".panel");

  forumPosts.forEach((post) => {
    const name = post.querySelector(".media-heading").textContent.toLowerCase();
    const campus = post
      .querySelector(".text-muted:nth-of-type(1)")
      .textContent.toLowerCase();
    const category = post
      .querySelector(".bottom-right-text")
      .textContent.toLowerCase();
    const postText = post.querySelector(".mar-btm").textContent.toLowerCase();
    const postTime = post
      .querySelector(".text-muted.text-sm")
      .textContent.toLowerCase();

    if (
      name.includes(searchTerm) ||
      campus.includes(searchTerm) ||
      category.includes(searchTerm) ||
      postText.includes(searchTerm) ||
      postTime.includes(searchTerm)
    ) {
      post.style.display = "block";
    } else {
      post.style.display = "none";
    }
  });
}

// Modified fetchForumPosts function with filtering logic
function fetchForumPosts() {
  const forumBody = document.getElementById("forumBody");
  forumBody.innerHTML = ""; // Clear previous posts

  const forumPostRef = ref(db, "Forum_Post");

  onValue(forumPostRef, (snapshot) => {
    const posts = []; // Array to hold posts for sorting

    snapshot.forEach((childSnapshot) => {
      const postData = childSnapshot.val();

      // Check if filtering is enabled and the post has PostReport child
      if (!filterEnabled || postData.PostReport) {
        const postTime = new Date(postData.postTime); // Convert postTime to Date object
        const postReportCount = postData.PostReport
          ? Object.keys(postData.PostReport).length
          : 0;
        posts.push({
          key: childSnapshot.key,
          postTime,
          data: postData,
          postReportCount,
        });
      }
    });

    // Sort posts based on postTime in descending order
    posts.sort((a, b) => {
      // If filtering is enabled, sort based on postReportCount
      if (filterEnabled) {
        return b.postReportCount - a.postReportCount; // Sort in descending order of postReportCount
      } else {
        return b.postTime - a.postTime; // Sort based on postTime if filtering is not enabled
      }
    });

    posts.forEach((post) => {
      const postKey = post.key;
      const postData = post.data;
      let container = document.getElementById(`container-${postKey}`);

      if (!container) {
        container = document.createElement("div");
        container.id = `container-${postKey}`;
        container.classList.add("panel");
        forumBody.appendChild(container);
      }

      const uploaderUID = postData.uploadersUID;
      const uploaderRef = ref(db, `Users/${uploaderUID}`);

      get(uploaderRef).then((uploaderSnapshot) => {
        const uploaderData = uploaderSnapshot.val();
        const firstName = uploaderData.firstname || "";
        const lastName = uploaderData.lastname || "";
        const middleName = uploaderData.middlename || "";
        const profileImage = uploaderData.ImageProfile || "img/profilePic.jpg";

        container.innerHTML = `
            <div class="panel-body">
              <div class="media-block">
                  <a style="margin-top:-0.5%"class="media-left" href="#">
                      <img style="object-fit: cover" class="img-circle img-sm" alt="Profile Picture" id="profileImage-${postKey}" src="${profileImage}">
                  </a>
                  <div class="media-body">
                      <div class="mar-btm">
                    
<p id="nameForum-${postKey}" class="text-semibold media-heading box-inline">
  ${firstName} ${middleName} ${lastName}
  <img src="img/reportto.png" alt="Report" style="width: 15px" class="enlarge-on-hover" id="hoverreport"/>
<span id="notificationBadge" class="notification-badge">${formatNumber(
          post.postReportCount
        )}</span>
     

</p>
<a  class="options-icon" id="optionito-${postKey}" style="margin-left:5%">
  <i class="fas fa-ellipsis-v" id="ellipsisIcon-${postKey}"></i>
  <i class="fas fa-ban" id="reportIcon-${postKey}" style="display: none"></i>
  <i class="fas fa-trash-alt" id="deleteIcon-${postKey}" style="display: none"></i>
</a>

                            <p style="line-height: 1.5;" class="text-muted text-sm">
                              <i class="fa fa-globe fa-lg"></i> - ${
                                postData.campus
                              }
                          </p>
                          <p class="text-muted text-sm">
                     ${postData.postTime}
                          </p>
                           
                      </div>
                      <p style="margin-top:4%" id="forumText-${postKey}">${
          postData.postText
        }</p>
                      <img class="img-responsive thumbnail" src="${
                        postData.postImage
                      }" id="postImage-${postKey}" alt="Image" style="width: 100%; height: 400px; object-fit: cover; margin-left: -10%; ${
          postData.postImage ? "" : "display: none;"
        }">
                      <div class="pad-ver">
                          <div class="btn-group">
                              <a style="margin-right:1px" class="btn btn-sm btn-default btn-hover-success" id="upReact-${postKey}">
                                  <i id="upNum-${postKey}" class="fas fa-arrow-up"> ${formatNumber(
          postData.upReactCount
        )}</i>
                              </a>
                              <a class="btn btn-sm btn-default btn-hover-danger" id="downReact-${postKey}">
                                  <i id="downNum-${postKey}" class="fa fa-arrow-down"> ${formatNumber(
          postData.downReactCount
        )}</i>
                              </a>
                          </div>
                          <a class="btn btn-sm btn-default btn-hover-primary" id="openModalpl-${postKey}">
                              <i class="fas fa-comment"> ${formatNumber(
                                postData.commentCount
                              )}</i>
                          </a>
                      </div>
                  </div>
              </div>
               <div style="margin-top:3%; margin-left:85%" class="bottom-right-text">
            <p  class="text-muted text-sm" id="categoryForum-${postKey}" > # ${
          postData.category
        }
                          </p>
        </div>
          </div>
        `;

        const upReactBtn = container.querySelector(`#upReact-${postKey}`);
        const downReactBtn = container.querySelector(`#downReact-${postKey}`);

        // Function to update button appearance based on reaction
        // Function to update button appearance based on reaction
        function updateButtonAppearance(btn, reaction, btnType) {
          btn.classList.remove("reacted", "not-reacted");
          if (reaction === btnType) {
            btn.classList.add("reacted");
            btn.style.borderColor = "red"; // Add red border color for the reacted button
          } else {
            btn.classList.add("not-reacted");
            btn.style.borderColor = ""; // Reset border color if not reacted
          }
        }

        // Handle upReact click
        upReactBtn.addEventListener("click", (event) => {
          event.preventDefault();
          const user = auth.currentUser;
          if (user) {
            const uid = user.uid;
            const reactRef = ref(db, `Forum_Post/${postKey}/React/${uid}`);

            get(reactRef)
              .then((snapshot) => {
                const existingReaction = snapshot.val();
                let newReaction;
                if (existingReaction === "up") {
                  newReaction = null; // User is un-reacting
                } else {
                  newReaction = "up"; // User is reacting
                }
                set(ref(db, `Forum_Post/${postKey}/React/${uid}`), newReaction)
                  .then(() => {
                    updateReactCounts(postKey, existingReaction, newReaction);
                    updateButtonAppearance(upReactBtn, newReaction);
                    updateButtonAppearance(downReactBtn, null);
                  })
                  .catch((error) => {
                    console.error("Error toggling reaction:", error);
                  });
              })
              .catch((error) => {
                console.error("Error toggling reaction:", error);
              });
          } else {
            console.log("User is not logged in.");
          }
        });

        // Handle downReact click
        downReactBtn.addEventListener("click", (event) => {
          event.preventDefault();
          const user = auth.currentUser;
          if (user) {
            const uid = user.uid;
            const reactRef = ref(db, `Forum_Post/${postKey}/React/${uid}`);

            get(reactRef)
              .then((snapshot) => {
                const existingReaction = snapshot.val();
                let newReaction;
                if (existingReaction === "down") {
                  newReaction = null; // User is un-reacting
                } else {
                  newReaction = "down"; // User is reacting
                }
                set(ref(db, `Forum_Post/${postKey}/React/${uid}`), newReaction)
                  .then(() => {
                    updateReactCounts(postKey, existingReaction, newReaction);
                    updateButtonAppearance(downReactBtn, newReaction);
                    updateButtonAppearance(upReactBtn, null);
                  })
                  .catch((error) => {
                    console.error("Error toggling reaction:", error);
                  });
              })
              .catch((error) => {
                console.error("Error toggling reaction:", error);
              });
          } else {
            console.log("User is not logged in.");
          }
        });

        // Initialize button appearance
        get(ref(db, `Forum_Post/${postKey}/React/${auth.currentUser.uid}`))
          .then((snapshot) => {
            const reaction = snapshot.val();
            updateButtonAppearance(upReactBtn, reaction, "up");
            updateButtonAppearance(downReactBtn, reaction, "down");
          })
          .catch((error) => {
            console.error("Error getting reaction:", error);
          });
      });

      // Append the container to the forumBody
      forumBody.appendChild(container);
    });
  });
}
document.addEventListener("click", function (event) {
  // Check if the clicked element is ellipsisIcon
  if (event.target && event.target.id.startsWith("ellipsisIcon-")) {
    const postKey = event.target.id.replace("ellipsisIcon-", ""); // Extract postKey
    const reportIcon = document.getElementById(`reportIcon-${postKey}`);
    const deleteIcon = document.getElementById(`deleteIcon-${postKey}`);

    // Toggle the visibility of reportIcon and deleteIcon
    if (reportIcon.style.display === "none") {
      reportIcon.style.display = "block";
      reportIcon.style.color = "red";
      reportIcon.style.marginBottom = "10px";
      reportIcon.style.marginLeft = "-5px";
      reportIcon.style.marginTop = "10px";
      reportIcon.style.fontSize = "19px"; // Increase the size of reportIcon
      deleteIcon.style.display = "block";
      deleteIcon.style.marginLeft = "-5px";
      deleteIcon.style.color = "blue"; // Apply additional styles if needed
      deleteIcon.style.fontSize = "19px"; // Increase the size of deleteIcon
    } else {
      reportIcon.style.display = "none";
      deleteIcon.style.display = "none";
    }
  }
});
document.addEventListener("click", function (event) {
  if (event.target && event.target.id.startsWith("deleteIcon-")) {
    const postKey = event.target.id.replace("deleteIcon-", ""); // Extract postKey

    // Confirm deletion with user
    const confirmDelete = confirm("Are you sure you want to delete this post?");
    if (confirmDelete) {
      // Delete the post from the database
      const postRef = ref(db, `Forum_Post/${postKey}`);
      remove(postRef)
        .then(() => {
          console.log("Post deleted successfully");
          // Remove the corresponding HTML element from the DOM
          const container = document.getElementById(`container-${postKey}`);
          if (container) {
            container.remove();
          } else {
            console.log("Container not found for post key:", postKey);
          }
        })
        .catch((error) => {
          console.error("Error deleting post:", error);
        });
    }
  }
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

document.addEventListener("click", function (event) {
  if (event.target && event.target.id.startsWith("reportIcon-")) {
    const postKey = event.target.id.replace("reportIcon-", ""); // Extract postKey

    // Retrieve the uploaderUID from the Forum_Post node
    const forumPostRef = ref(db, `Forum_Post/${postKey}`);
    get(forumPostRef)
      .then((snapshot) => {
        const postData = snapshot.val();
        const uploaderUID = postData.uploadersUID;

        // Retrieve the verificationStatus of the user from the Users node
        const userRef = ref(db, `Users/${uploaderUID}`);
        get(userRef)
          .then((userSnapshot) => {
            const userData = userSnapshot.val();
            const verificationStatus = userData.verificationStatus;

            // Check if the user is already banned
            if (verificationStatus === false) {
              alert("This user is already banned.");
              return; // Exit function without performing ban action
            }

            // Prompt the user to confirm the action
            const confirmBan = confirm(
              "Are you sure you want to ban this user?"
            );
            if (confirmBan) {
              // Update verificationStatus to false in Users node
              update(userRef, {
                verificationStatus: false,
                banTimeStamp: generateTimestamp(),
              })
                .then(() => {
                  console.log("User banned successfully");
                  alert("User banned successfully");
                })
                .catch((error) => {
                  console.error("Error banning user:", error);
                });

              // Delete corresponding UID child in User_Verification node
              const userVerificationRef = ref(
                db,
                `User_Verification/${uploaderUID}`
              );
              remove(userVerificationRef)
                .then(() => {
                  console.log("User verification data deleted successfully");
                })
                .catch((error) => {
                  console.error(
                    "Error deleting user verification data:",
                    error
                  );
                });
            }
          })
          .catch((error) => {
            console.error("Error retrieving user data:", error);
          });
      })
      .catch((error) => {
        console.error("Error retrieving forum post data:", error);
      });
  }
});
document.addEventListener("click", function (event) {
  if (event.target && event.target.id === "hoverreport") {
    const postKey = event.target.closest(".panel").id.replace("container-", "");
    const modal = document.getElementById("reportMain");
    const reportTableBody = document.getElementById("reportTableBody");

    // Clear previous report data
    reportTableBody.innerHTML = "";

    // Fetch and populate report data based on PostReport child in the forum post
    const postReportRef = ref(db, `Forum_Post/${postKey}/PostReport`);
    onValue(postReportRef, (snapshot) => {
      snapshot.forEach((childSnapshot) => {
        const uid = childSnapshot.key; // Get the UID from the snapshot key
        const reason = childSnapshot.val(); // Get the reason from the snapshot value
        const userRef = ref(db, `Users/${uid}`);
        get(userRef).then((userSnapshot) => {
          const userData = userSnapshot.val();
          const { firstname, middlename, lastname, campus } = userData;
          reportTableBody.innerHTML += `
            <tr>
              <td>${uid}</td>
              <td>${lastname}, ${firstname} ${middlename}</td>
              <td>${campus}</td>
              <td>${reason}</td>
            </tr>
          `;
        });
      });
    });

    // Display the modal
    modal.style.display = "block";
  }
});

// Close the modal
function closeModal() {
  const modal = document.getElementById("reportMain");
  modal.style.display = "none";
}

function updateReactCounts(postKey, previousReaction, newReaction) {
  const container = document.getElementById(`container-${postKey}`);
  const upNumElement = container.querySelector(`#upNum-${postKey}`);
  const downNumElement = container.querySelector(`#downNum-${postKey}`);
  let upCount = parseInt(upNumElement.textContent);
  let downCount = parseInt(downNumElement.textContent);

  if (previousReaction === "up") {
    upCount--; // Decrement up count if user un-reacts
  } else if (previousReaction === "down") {
    downCount--; // Decrement down count if user un-reacts
  }

  if (newReaction === "up") {
    upCount++; // Increment up count if user reacts
  } else if (newReaction === "down") {
    downCount++; // Increment down count if user reacts
  }

  // Update UI with new counts
  upNumElement.textContent = upCount;
  downNumElement.textContent = downCount;

  // Update database with new counts
  update(ref(db, `Forum_Post/${postKey}`), {
    upReactCount: upCount,
    downReactCount: downCount,
  });
}
// Call the function to fetch and display forum posts
fetchForumPosts();
