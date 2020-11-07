

var currentTab = 0; // Current tab is set to be the first tab (0)

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("WA-tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").style.display = "none";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
	document.getElementById("nextBtn").style.display = "inline";
  }
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("WA-tab");
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("write-artifact-form").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}


