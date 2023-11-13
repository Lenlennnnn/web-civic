document.addEventListener("DOMContentLoaded", function () {
  const openModalBtn = document.getElementById("openModalBtn");
  const modal = document.getElementById("myModal");
  const modalContent = document.getElementById("modalContent");
  const closeModal = document.getElementById("closeModal");

  openModalBtn.addEventListener("click", function () {
    modal.style.display = "block";
    loadContentIntoModal();
  });

  closeModal.addEventListener("click", function () {
    modal.style.display = "none";
  });

  // Load content from admin.html into the modal
  function loadContentIntoModal() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "admin.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        modalContent.innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  }
});
