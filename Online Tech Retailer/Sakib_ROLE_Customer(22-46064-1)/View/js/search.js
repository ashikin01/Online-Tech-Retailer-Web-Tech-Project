function search() {
    const filter = document.getElementById('search-input').value.trim().toUpperCase();
  
    const items = document.querySelectorAll('.box');
  
    for (let i = 0; i < items.length; i++) {
      const item = items[i];

      const title = item.querySelector('h3').textContent.toUpperCase();
  
      if (title.includes(filter)) {
        item.style.display = "";
      }
      else {
        item.style.display = "none";
      }
    }
}