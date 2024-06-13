function addButton() {
  var container = document.getElementById("buttonContainer");
  var buttonName = prompt("Enter button name:");
  if (buttonName) { // If user entered a name
      var newButton = document.createElement("button");
      newButton.textContent = buttonName;
      newButton.className = "dynamicButton"; // Assigning a class for styling
      container.appendChild(newButton);

      // Add event listener to navigate to A_ticket.html
      newButton.addEventListener("click", function(event) {
          if (!this.toBeRemoved) {
              window.location.href = "A_ticket.html";
          }
      });

      // Save button data to local storage
      saveButtonsToLocalStorage();
  }
}

function removeButton() {
  var container = document.getElementById("buttonContainer");
  var buttons = container.getElementsByTagName("button");
  if (buttons.length > 0) {
      for (var i = 0; i < buttons.length; i++) {
          buttons[i].style.boxShadow = "35px 35px 69px #ff3333, -35px -35px 69px #ff3333";
          buttons[i].toBeRemoved = true; // Marking buttons for removal
      }
      // Remove all existing event listeners
      for (var i = 0; i < buttons.length; i++) {
          buttons[i].onclick = null;
      }

      // Add event listener for deletion
      for (var i = 0; i < buttons.length; i++) {
          addButtonClickListener(buttons[i], container, i);
      }
  }
}

function addButtonClickListener(button, container, index) {
  button.addEventListener("click", function(event) {
      if (this.toBeRemoved && confirm("Do you want to remove this button?")) {
          container.removeChild(this);
          // Save button data to local storage after removal
          saveButtonsToLocalStorage();
          // Reset styles for remaining buttons
          resetButtonStyles(container);
          // Remove the event listener from all other buttons except the one just removed
          for (var j = 0; j < container.getElementsByTagName("button").length; j++) {
              if (j !== index) {
                  container.getElementsByTagName("button")[j].removeEventListener("click", arguments.callee);
              }
          }
          // Prevent default behavior of the click event to stay on the same page
          event.stopPropagation();
          event.preventDefault();
      }
  });
}

function resetButtonStyles(container) {
  var buttons = container.getElementsByTagName("button");
  for (var i = 0; i < buttons.length; i++) {
      buttons[i].style.boxShadow = ""; // Reset box shadow
  }
}

function saveButtonsToLocalStorage() {
  var container = document.getElementById("buttonContainer");
  var buttons = container.getElementsByTagName("button");
  var buttonData = [];
  for (var i = 0; i < buttons.length; i++) {
      buttonData.push(buttons[i].textContent);
  }
  localStorage.setItem("buttons", JSON.stringify(buttonData));
}

function loadButtonsFromLocalStorage() {
  var container = document.getElementById("buttonContainer");
  var buttonData = JSON.parse(localStorage.getItem("buttons"));
  if (buttonData) {
      for (var i = 0; i < buttonData.length; i++) {
          var newButton = document.createElement("button");
          newButton.textContent = buttonData[i];
          newButton.className = "dynamicButton"; // Assigning a class for styling
          container.appendChild(newButton);
          // Add event listener to navigate to A_ticket.html
          newButton.addEventListener("click", function(event) {
              if (!this.toBeRemoved) {
                  window.location.href = "A_ticket.html";
              }
          });
      }
  }
}

// Add event listeners to the Add and Remove buttons
document.getElementById("addButton").addEventListener("click", addButton);
document.getElementById("removeButton").addEventListener("click", removeButton);

// Load buttons from local storage when the page loads
window.addEventListener("load", loadButtonsFromLocalStorage);




function addButton() {
    var container = document.getElementById("buttonContainer");
    var buttonName = prompt("Enter button name:");
    if (buttonName) { // If user entered a name
        var newButton = document.createElement("button");
        newButton.textContent = buttonName;
        newButton.className = "dynamicButton"; // Assigning a class for styling
        container.appendChild(newButton);

        // Add event listener to navigate to A_ticket.html
        newButton.addEventListener("click", function(event) {
            if (!this.toBeRemoved) {
                window.location.href = "A_ticket.html";
            }
        });
        

        // Save button data to local storage
        saveButtonsToLocalStorage();
    }
}

function removeButton() {
    var container = document.getElementById("buttonContainer");
    var buttons = container.getElementsByTagName("button");
    if (buttons.length > 0) {
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].style.boxShadow = "35px 35px 69px #ff3333, -35px -35px 69px #ff3333";
            buttons[i].toBeRemoved = true; // Marking buttons for removal
        }
        // Remove all existing event listeners
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].onclick = null;
        }

        // Add event listener for deletion
        for (var i = 0; i < buttons.length; i++) {
            addButtonClickListener(buttons[i], container, i);
        }
    }
}

function addButtonClickListener(button, container, index) {
    button.addEventListener("click", function(event) {
        if (this.toBeRemoved && confirm("Do you want to remove this button?")) {
            container.removeChild(this);
            // Save button data to local storage after removal
            saveButtonsToLocalStorage();
            // Reset styles for remaining buttons
            resetButtonStyles(container);
            // Remove the event listener from all other buttons except the one just removed
            for (var j = 0; j < container.getElementsByTagName("button").length; j++) {
                if (j !== index) {
                    container.getElementsByTagName("button")[j].removeEventListener("click", arguments.callee);
                }
            }
            // Prevent default behavior of the click event to stay on the same page
            event.stopPropagation();
            event.preventDefault();
        }
        else {
            window.location.href = "A_ticket.html"; // Redirect to A_ticket.html if not removing the button
        }
    });
}


function resetButtonStyles(container) {
    var buttons = container.getElementsByTagName("button");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].style.boxShadow = ""; // Reset box shadow
    }
}

function saveButtonsToLocalStorage() {
    var container = document.getElementById("buttonContainer");
    var buttons = container.getElementsByTagName("button");
    var buttonData = [];
    for (var i = 0; i < buttons.length; i++) {
        buttonData.push(buttons[i].textContent);
    }
    localStorage.setItem("buttons", JSON.stringify(buttonData));
}

function loadButtonsFromLocalStorage() {
    var container = document.getElementById("buttonContainer");
    var buttonData = JSON.parse(localStorage.getItem("buttons"));
    if (buttonData) {
        for (var i = 0; i < buttonData.length; i++) {
            var newButton = document.createElement("button");
            newButton.textContent = buttonData[i];
            newButton.className = "dynamicButton"; // Assigning a class for styling
            container.appendChild(newButton);
            // Add event listener to navigate to A_ticket.html
            newButton.addEventListener("click", function(event) {
                window.location.href = "A_ticket.html";
            });
        }
    }
}

// Add event listeners to the Add and Remove buttons
document.getElementById("addButton").addEventListener("click", addButton);
document.getElementById("removeButton").addEventListener("click", removeButton);

// Load buttons from local storage when the page loads
window.addEventListener("load", loadButtonsFromLocalStorage);
