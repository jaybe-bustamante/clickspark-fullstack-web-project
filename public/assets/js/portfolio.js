
// Sort portfolio
// Get all buttons
const buttons = document.querySelectorAll('.button-1');

// Get all portfolio items
const portfolioItems = document.querySelectorAll('.portbox');

// Add click event listener to each button
buttons.forEach(button => {
  button.addEventListener('click', function() {
    // Get the filter from the button's data-filter attribute
    const filter = this.dataset.filter;

    // Hide all portfolio items
    portfolioItems.forEach(item => {
      item.style.display = 'none';
    });

    // If filter is 'all', show all items
    if (filter === 'all') {
      portfolioItems.forEach(item => {
        item.style.display = 'block';
      });
    } else {
      // Otherwise, show only items that have a class matching the filter
      const itemsToShow = document.querySelectorAll(`.${filter}`);
      itemsToShow.forEach(item => {
        item.style.display = 'block';
      });
    }
  });
});


// Get the Load More button
const loadMoreButton = document.querySelector('#loadMore');

// Get all portfolio items
const portfolioItems2 = document.querySelectorAll('.portbox');

// Initially hide all items
portfolioItems2.forEach((item, index) => {
  if (index >= 8) { // Show only the first 8 items
    item.style.display = 'none';
  }
});

// Keep track of the number of items shown
let itemsShown = 8;

// Add click event listener to Load More button
loadMoreButton.addEventListener('click', function() {
  // Show 8 more items
  const newItemsShown = itemsShown + 8;
  portfolioItems2.forEach((item, index) => {
    if (index < newItemsShown) {
      item.style.display = 'block';
    }
  });

  // Update the number of items shown
  itemsShown = newItemsShown;

  // If all items are shown, hide the Load More button
  if (itemsShown >= portfolioItems2.length) {
    loadMoreButton.style.display = 'none';
  }
});