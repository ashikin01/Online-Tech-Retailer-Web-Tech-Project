// function sort(){

// }
// function sort() {
//     const filter = document.getElementById('sort-input').value.trim().toUpperCase();
  
//     const items = document.querySelectorAll('.box');
  
//     for (let i = 0; i < items.length; i++) {
//       const item = items[i];

//       const title = item.querySelector('h3').textContent.toUpperCase();
  
//       if (title.includes(filter)) {
//         item.style.display = "";
//       }
//       else {
//         item.style.display = "none";
//       }
//     }
// }

// function sort() {
//     document.getElementById("select").addEventListener("click", () =>{})
//     const items = document.querySelectorAll('.box');
  
//     // Sort the items using an array sort
//     items.sort((a, b) => {
//       // Get the price values from each item
//       const priceA = parseFloat(a.querySelector('.price').textContent.trim());
//       const priceB = parseFloat(b.querySelector('.price').textContent.trim());
  
//       // Sort in ascending order (lowest to highest price)s
//       return priceA - priceB;
//     });
  
//     // Re-append the sorted items to the container
//     const container = document.querySelector('.product-container'); // Assuming a container element
//     container.innerHTML = '';
//     items.forEach(item => container.appendChild(item));
//   }

  function sort() {
    document.getElementById("lowtohigh").addEventListener("click", () => {
      const items = document.querySelectorAll('.box');
  
      // Sort the items using an array sort
      items.sort((a, b) => {
        const priceA = parseFloat(a.querySelector('.price').textContent.trim());
        const priceB = parseFloat(b.querySelector('.price').textContent.trim());
  
        // Sort in ascending order (lowest to highest price)
        return priceA - priceB;
      });
  
      // Re-append the sorted items to the container
      const container = document.querySelector('.box-container'); // Assuming a container element
      container.innerHTML = '';
      items.forEach(item => container.appendChild(item));

      for (let i = 0; i < items.length; i++) {
              const item = items[i];
                item.style.display = "";
              }
    });
  }
  
  
  