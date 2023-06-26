$(document).ready(function() {
    let collections = [];
  
    function displayCategory(category) {
      let selectedCollection = collections.filter(collection => {
        return category === "all" || collection.kategori.toLowerCase().includes(category);
      });
  
      let output = '';
  
      selectedCollection.forEach(collection => {
        output += `<div class="col-md-4">
        <div class="card">
          <img src="images/${collection.gambar}" class="card-img-top" alt="${collection.nama}">
          <div class="card-body">
            <h5 class="card-title">Category: ${collection.kategori}</h5>
            <h5 class="card-title">Name: ${collection.nama}</h5>
            <h5 class="card-title">Description: ${collection.description}</h5>
            <h5 class="card-title">Date: ${collection.date}</h5>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>`;
        
      });
  
      $('#card-content').html(output);
    }
  
    $.ajax({
      url: 'get.php',
      type: 'GET',
      dataType: 'json',
      success: function(res) {
        collections = res;
        displayCategory("all"); 
      }
    });
  
    $('.nav-link').mouseover(function(e) {
      e.preventDefault();
  
      var category = $(this).attr('href').substring(1).toLowerCase(); 
      $('h1').html($(this).html()); 
      displayCategory(category); 
    });
  });
  