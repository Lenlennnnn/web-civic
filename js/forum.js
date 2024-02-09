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
// Fetch data from Firebase and update HTML elements
function fetchForumPosts() {
  const forumBody = document.getElementById("forumBody");

  const forumPostRef = ref(db, "Forum_Post");

  onValue(forumPostRef, (snapshot) => {
    snapshot.forEach((childSnapshot) => {
      const postKey = childSnapshot.key;
      const postData = childSnapshot.val();
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
                  <a class="media-left" href="#">
                      <img style="object-fit: cover" class="img-circle img-sm" alt="Profile Picture" id="profileImage-${postKey}" src="${profileImage}">
                  </a>
                  <div class="media-body">
                      <div class="mar-btm">
                          <p id="nameForum-${postKey}" class="text-semibold media-heading box-inline">
                              ${firstName} ${middleName} ${lastName}
                          </p>
                          <p class="text-muted text-sm">
                              <i class="fa fa-mobile fa-lg"></i> - ${
                                postData.postTime
                              }
                          </p>
                      </div>
                      <p id="forumText-${postKey}">${postData.postText}</p>
                      <img class="img-responsive thumbnail" src="${
                        postData.postImage
                      }" id="postImage-${postKey}" alt="Image" style="width: 100%; height: 400px; object-fit: cover; margin-left: -10%; ${
          postData.postImage ? "" : "display: none;"
        }">
                      <div class="pad-ver">
                          <div class="btn-group">
                              <a class="btn btn-sm btn-default btn-hover-success" id="upReact-${postKey}">
                                  <i id="upNum-${postKey}" class="fas fa-arrow-up"></i>
                              </a>
                              <a class="btn btn-sm btn-default btn-hover-danger" id="downReact-${postKey}">
                                  <i id="downNum-${postKey}" class="fa fa-arrow-down"></i>
                              </a>
                          </div>
                          <a class="btn btn-sm btn-default btn-hover-primary" id="openModalpl-${postKey}">
                              <i class="fas fa-comment"> ${
                                postData.commentCount
                              }</i>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
        `;

        // Add event listeners to react buttons
        const upReactBtn = container.querySelector(`#upReact-${postKey}`);
        const downReactBtn = container.querySelector(`#downReact-${postKey}`);

        // Handle upReact click
        // Handle upReact click
        upReactBtn.addEventListener("click", (event) => {
          event.preventDefault(); // Prevent default behavior (scrolling)
          // Get user's UID
          const user = auth.currentUser;
          if (user) {
            const uid = user.uid;
            const reactRef = ref(db, `Forum_Post/${postKey}/React/${uid}`);

            // Check if the user has already reacted and the type of reaction
            get(reactRef)
              .then((snapshot) => {
                const existingReaction = snapshot.val();
                if (!existingReaction || existingReaction === "down") {
                  // Add up reaction to the post
                  const newReaction = existingReaction === "down" ? "up" : "up";
                  set(
                    ref(db, `Forum_Post/${postKey}/React/${uid}`),
                    newReaction
                  ).then(() => {
                    // Update the reaction count directly
                    const upNumElement = container.querySelector(
                      `#upNum-${postKey}`
                    );
                    const downNumElement = container.querySelector(
                      `#downNum-${postKey}`
                    );
                    if (existingReaction === "down") {
                      const downCount = parseInt(downNumElement.textContent);
                      downNumElement.textContent = downCount - 1;
                    }
                    const upCount = parseInt(upNumElement.textContent);
                    upNumElement.textContent =
                      newReaction === "up" ? upCount + 1 : upCount;
                  });
                } else {
                  console.log("You have already reacted to this post with up.");
                }
              })
              .catch((error) => {
                console.error("Error checking reaction:", error);
              });
          } else {
            console.log("User is not logged in.");
          }
        });

        // Handle downReact click
        downReactBtn.addEventListener("click", (event) => {
          event.preventDefault(); // Prevent default behavior (scrolling)
          // Get user's UID
          const user = auth.currentUser;
          if (user) {
            const uid = user.uid;
            const reactRef = ref(db, `Forum_Post/${postKey}/React/${uid}`);

            // Check if the user has already reacted and the type of reaction
            get(reactRef)
              .then((snapshot) => {
                const existingReaction = snapshot.val();
                if (!existingReaction || existingReaction === "up") {
                  // Add down reaction to the post
                  const newReaction =
                    existingReaction === "up" ? "down" : "down";
                  set(
                    ref(db, `Forum_Post/${postKey}/React/${uid}`),
                    newReaction
                  ).then(() => {
                    // Update the reaction count directly
                    const upNumElement = container.querySelector(
                      `#upNum-${postKey}`
                    );
                    const downNumElement = container.querySelector(
                      `#downNum-${postKey}`
                    );
                    if (existingReaction === "up") {
                      const upCount = parseInt(upNumElement.textContent);
                      upNumElement.textContent = upCount - 1;
                    }
                    const downCount = parseInt(downNumElement.textContent);
                    downNumElement.textContent =
                      newReaction === "down" ? downCount + 1 : downCount;
                  });
                } else {
                  console.log(
                    "You have already reacted to this post with down."
                  );
                }
              })
              .catch((error) => {
                console.error("Error checking reaction:", error);
              });
          } else {
            console.log("User is not logged in.");
          }
        });
      });

      // Append the container to the forumBody
      forumBody.appendChild(container);
    });
  });
}

// Call the function to fetch and display forum posts
fetchForumPosts();
