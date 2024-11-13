 // On page load, display sidebar
 window.onload = function() {
    setTimeout(() => {
      document.getElementById('sidebar').classList.add('active');
      document.getElementById('content').classList.add('with-sidebar');
    }, 300); // Delay to create a slide-in effect
  };

  // Toggle sidebar visibility and change arrow icon
  document.getElementById('sidebarToggle').onclick = function() {
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    sidebar.classList.toggle('active');
    content.classList.toggle('with-sidebar');

    // Change icon based on sidebar state
    this.innerHTML = sidebar.classList.contains('active') 
      ? '<i class="fas fa-arrow-left"></i>'  // Left arrow when open
      : '<i class="fas fa-arrow-right"></i>'; // Right arrow when closed
  };