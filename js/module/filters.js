function filters() {

  const filterList = document.querySelector(".filter");
  const filterButtons = filterList.querySelectorAll(".filter-btn");
  const filterItems = document.querySelectorAll(".filter-item");

  let filterItemIndex = 0;

  filterItems.forEach((filterItem) => {
    filterItem.style.viewTransitionName = `item-${++filterItemIndex}`;
  });

  filterButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      let confCategory = e.target.getAttribute("data-filter");

      if (!document.startViewTransition) {
        updateActiveButton(e.target);
        filterEvents(confCategory);
      }

      document.startViewTransition(() => {
        updateActiveButton(e.target);
        filterEvents(confCategory);
      });
    });
  });

  function updateActiveButton(newButton) {
    filterList.querySelector(".active").classList.remove("active");
    newButton.classList.add("active");
  }

  function filterEvents(filter) {
    filterItems.forEach((filterItem) => {
      // get each filterItems category
      let dataType = filterItem.getAttribute("data-type");

      // check if that category matches with the filter
      if (filter === "all" || filter === dataType) {
        filterItem.removeAttribute("hidden");
      } else {
        filterItem.setAttribute("hidden", "");
      }
    });
  }
}

export default filters;