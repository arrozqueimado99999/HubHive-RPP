var scrollableDiv = document.getElementById("carddivscroll");

scrollableDiv.addEventListener("wheel", function(event) {
  event.preventDefault();
  scrollableDiv.scrollLeft += event.deltaY;
});

