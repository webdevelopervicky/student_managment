<script>

    function toggleTheme() {
    const isDarkMode = document.getElementById('themeToggle').checked;
  
    if (isDarkMode) {
        document.documentElement.style.setProperty('--bg-color', 'white');
      document.documentElement.style.setProperty('--text-color', 'black');

    } else {
       
        document.documentElement.style.setProperty('--bg-color', '#212529');
        document.documentElement.style.setProperty('--text-color', 'rgb(255, 238, 238)');
      
    }
  }

</script>

<script>
    function confirmRedirect() {
      var confirmation = confirm("Are you sure you want to Deactivate?");
      return confirmation;
    }

    function confirmdelet() {
      var confirmation = confirm("Are you sure you want to Deletpermently?");
      return confirmation;
    }

    //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx//

    let currentPage = 1;
    const totalPages = 4;

    function showPage(page) {
      const contentDivs = document.querySelectorAll('.content');
      contentDivs.forEach((div, index) => {
        div.classList.remove('activepage');
        if (index === page - 1) {
          div.classList.add('activepage');
        }
      });

      document.getElementById('page-info').innerText = `Page ${page} of ${totalPages}`;
    }

    function prevPage() {
      if (currentPage > 1) {
        currentPage--;
        showPage(currentPage);
      }
    }

    function nextPage() {
      if (currentPage < totalPages) {
        currentPage++;
        showPage(currentPage);
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      showPage(currentPage);
    });
    
  </script>