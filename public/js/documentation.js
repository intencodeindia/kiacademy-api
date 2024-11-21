function performSearch() {
  const searchInput = document
    .getElementById("search-input")
    .value.toLowerCase();
  const sections = document.querySelectorAll(".main-content section");

  sections.forEach((section) => {
    const text = section.textContent.toLowerCase();
    if (text.includes(searchInput) || searchInput === "") {
      section.classList.remove("hidden");
    } else {
      section.classList.add("hidden");
    }
  });
}

// Bind the search function to input events
document
  .getElementById("search-input")
  .addEventListener("input", performSearch);
function copyToClipboard(selector) {
  const textElement = document.querySelector(selector);
  if (!textElement) {
    console.error("Text element not found:", selector);
    return;
  }
  const text = textElement.textContent;

  let timerInterval;
  Swal.fire({
    title: "Copying to Clipboard...",
    html: "Please wait, copying in progress <b></b> milliseconds.",
    timer: 2000, // Total time for the alert to stay open
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
      const timer = Swal.getPopup().querySelector("b");
      timerInterval = setInterval(() => {
        timer.textContent = `${Swal.getTimerLeft()}`;
      }, 100);
    },
    willClose: () => {
      clearInterval(timerInterval);
    },
  }).then((result) => {
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log("Alert closed by the timer");

      // Now copy the text to clipboard
      if (navigator.clipboard) {
        navigator.clipboard
          .writeText(text)
          .then(() => {
            Swal.fire({
              title: "Copied!",
              text: "Text has been copied to clipboard.",
              icon: "success",
              timer: 800, // Auto-close after 1.5 seconds
              timerProgressBar: true,
              showConfirmButton: false,
            });
          })
          .catch((err) => {
            console.error("Failed to copy text: ", err);
            Swal.fire({
              title: "Error!",
              text: "Failed to copy text.",
              icon: "error",
              timer: 800, // Auto-close after 1.5 seconds
              timerProgressBar: true,
              showConfirmButton: false,
            });
          });
      } else {
        // Fallback for older browsers
        const textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        try {
          document.execCommand("copy");
          Swal.fire({
            title: "Copied!",
            text: "Text has been copied to clipboard.",
            icon: "success",
            timer: 800, // Auto-close after 1.5 seconds
            timerProgressBar: true,
            showConfirmButton: false,
          });
        } catch (err) {
          console.error("Failed to copy text using fallback: ", err);
          Swal.fire({
            title: "Error!",
            text: "Failed to copy text.",
            icon: "error",
            timer: 800, // Auto-close after 1.5 seconds
            timerProgressBar: true,
            showConfirmButton: false,
          });
        }
        document.body.removeChild(textArea);
      }
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const yearSpan = document.getElementById("current-year");
  const currentYear = new Date().getFullYear();
  yearSpan.textContent = currentYear;
});

