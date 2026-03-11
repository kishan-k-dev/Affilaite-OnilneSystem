'use strict';

// modal variables
// const modal = document.querySelector('[data-modal]');
// const modalCloseBtn = document.querySelector('[data-modal-close]');
// const modalCloseOverlay = document.querySelector('[data-modal-overlay]');

// // modal function
// const modalCloseFunc = function () { modal.classList.add('closed') }

// // modal eventListener
// modalCloseOverlay.addEventListener('click', modalCloseFunc);
// modalCloseBtn.addEventListener('click', modalCloseFunc);





// // notification toast variables
// const notificationToast = document.querySelector('[data-toast]');
// const toastCloseBtn = document.querySelector('[data-toast-close]');

// // notification toast eventListener
// toastCloseBtn.addEventListener('click', function () {
//   notificationToast.classList.add('closed');
// });





// mobile menu variables
const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
const mobileMenu = document.querySelectorAll('[data-mobile-menu]');
const mobileMenuCloseBtn = document.querySelectorAll('[data-mobile-menu-close-btn]');
const overlay = document.querySelector('[data-overlay]');

for (let i = 0; i < mobileMenuOpenBtn.length; i++) {

  // mobile menu function
  const mobileMenuCloseFunc = function () {
    mobileMenu[i].classList.remove('active');
    overlay.classList.remove('active');
  }

  mobileMenuOpenBtn[i].addEventListener('click', function () {
    mobileMenu[i].classList.add('active');
    overlay.classList.add('active');
  });

  mobileMenuCloseBtn[i].addEventListener('click', mobileMenuCloseFunc);
  overlay.addEventListener('click', mobileMenuCloseFunc);

}





// accordion variables
const accordionBtn = document.querySelectorAll('[data-accordion-btn]');
const accordion = document.querySelectorAll('[data-accordion]');

for (let i = 0; i < accordionBtn.length; i++) {

  accordionBtn[i].addEventListener('click', function () {

    const clickedBtn = this.nextElementSibling.classList.contains('active');

    for (let i = 0; i < accordion.length; i++) {

      if (clickedBtn) break;

      if (accordion[i].classList.contains('active')) {

        accordion[i].classList.remove('active');
        accordionBtn[i].classList.remove('active');

      }

    }

    this.nextElementSibling.classList.toggle('active');
    this.classList.toggle('active');

  });

}

// search feild
// let Availablekeywords = [
//   '<h6>mobile</h6> ',
//   'phone',
//   'web',
//   'whers out the',
//   'br bro',
//   'hggugu',
//   'hggugu',
//   'hggugu',
//   'hggugu',
//   'hggugu',
//   'hgngugu',
//   'hgngugu',
//   'hgngugu',
//   'hgngugu',
//   'hngugu',
// ];
const resultsbox = document.querySelector(".result-box");
const inputbox= document.getElementById("input-box");

// inputbox.onkeyup = function(){
//   let result = [];
//   let input = inputbox.value;
//   if(input.length){
//       result = Availablekeywords.filter((keyword)=>{
//        return   keyword.toLowerCase().includes(input.toLowerCase());
//       });
//       console.log(result);
//   }
//   display(result);
//   if(!result.length){
//       resultsbox.innerHTML='';
//   }
// }

function display(result){
  const content = result.map((list)=>{
      return"<li onclick=selectInput(this)>" + list + "</li>";

  });
  resultsbox.innerHTML = "<ul>" +content.join('')+ "</ul>";
}

function selectInput(list){
  inputbox.value= list.innerHTML;
  resultsbox.innerHTML= '';

}


// ================================


$(document).ready(function() {
  $("#search").on("input", function() {
      var query = $(this).val();

      if (query.length > 0) {
          $.ajax({
              url: "searchs.php",
              method: "POST",
              data: {query: query},
              success: function(data) {
                  $("#search-results").html(data).show();
              }
          });
      } else {
          $("#search-results").hide();
      }
  });

  $(document).on("click", "#search-results div", function() {
      var result = $(this).text();
      $("#search").val(result);
      $("#search-results").hide();
  });

  // Prevent form submission when pressing Enter key
  $("#search").closest('form').submit(function(event) {
      event.preventDefault();
  });

  // Hide results when clicking outside the search box
  $(document).on("click", function(e) {
      if (!$(e.target).closest("#search-results").length) {
          $("#search-results").hide();
      }
  });
});





// ================================

 // Function to load content using AJAX
 function loadContentProduct(value) {
  $.ajax({
      url: 'product.php', // Include the same page or provide the correct path
      type: 'POST',
      data: { selectedValue: value },
      success: function(response) {
          // Display the loaded content in the container
          $('#product-containerA').html(response);
          setupAccordion();
      },
      error: function() {
          alert('Error loading content');
      }
  });
}


function loadContentFurnitures(value) {
  $.ajax({
      url: 'Furnitures.php', // Include the same page or provide the correct path
      type: 'POST',
      data: { selectedValue: value },
      success: function(response) {
          // Display the loaded content in the container
          $('#Furnitures').html(response);
          setupAccordion();
      },
      error: function() {
          alert('Error loading content');
      }
  });
}

function loadContentKitchens(value) {
  $.ajax({
      url: 'Kitchens.php', // Include the same page or provide the correct path
      type: 'POST',
      data: { selectedValue: value },
      success: function(response) {
          // Display the loaded content in the container
          $('#Kitchens').html(response);
          setupAccordion();
      },
      error: function() {
          alert('Error loading content');
      }
  });
}
function loadContentLuxuryBeauty(value) {
  $.ajax({
      url: 'LuxuryBeauty.php', // Include the same page or provide the correct path
      type: 'POST',
      data: { selectedValue: value },
      success: function(response) {
          // Display the loaded content in the container
          $('#LuxuryBeauty').html(response);
          setupAccordion();
      },
      error: function() {
          alert('Error loading content');
      }
  });
}

$(document).ready(function() {
  $('#mySelect').select2({
      templateResult: formatResult,
      templateSelection: formatSelection,
      minimumResultsForSearch: Infinity,
      closeOnSelect: true // Close the dropdown after selecting an option
  });

  function formatResult(option) {
      if (!option.id) {
          return option.text;
      }

      var $option = $('<span><img src="' + $(option.element).data('image') + '" class="img-flag" /> ' + option.text + '</span>');
      return $option;
  }

  function formatSelection(option) {
      if (!option.id) {
          return option.text;
      }

      var $option = $('<span><img src="' + $(option.element).data('image') + '" class="img-flag"  /> ' + option.text + '</span>');
      return $option;
  }

  // Event listener for form submission
  $('#mySelect').on('change', function() {
      // e.preventDefault(); 
      var selectedValue = $(this).val();
      loadContent(selectedValue);
      loadContentProduct(selectedValue);
      loadContentFurnitures(selectedValue);
      loadContentKitchens(selectedValue);
      loadContentLuxuryBeauty(selectedValue);

  });

  // Function to load content using AJAX
  function loadContent(value) {
      $.ajax({
          url: '', // Include the same page or provide the correct path
          type: 'POST',
          data: { selectedValue: value },
          success: function(response) {
              // Display the loaded content in the container
              $('#content-container').html(response);
              setupAccordion();
          },
          error: function() {
              alert('Error loading content');
          }
      });
  }

  // Trigger an initial content load when the page is ready
  var initialValue = $('#mySelect').val();
  loadContent(initialValue);

   // Trigger an initial content load when the page is ready
   var initialValue = $('#mySelect').val();
   loadContentProduct(initialValue);

     // Trigger an initial content load when the page is ready
     var initialValue = $('#mySelect').val();
     loadContentFurnitures(initialValue);

     // Trigger an initial content load when the page is ready
     var initialValue = $('#mySelect').val();
     loadContentKitchens(initialValue);

     // Trigger an initial content load when the page is ready
     var initialValue = $('#mySelect').val();
     loadContentLuxuryBeauty(initialValue);




  // Function to set up accordion behavior
  function setupAccordion() {
      const accordionContent = document.querySelectorAll(".accordion-content");

      accordionContent.forEach((item, index) => {
          let header = item.querySelector("header");
          header.addEventListener("click", () => {
              item.classList.toggle("open");

              let description = item.querySelector(".description");
              if (item.classList.contains("open")) {
                  description.style.height = `${description.scrollHeight}px`;
                  item.querySelector("i").classList.replace("fa-plus", "fa-minus");
              } else {
                  description.style.height = "0px";
                  item.querySelector("i").classList.replace("fa-minus", "fa-plus");
              }
              removeOpen(index);
          });
      });

      function removeOpen(index1) {
          accordionContent.forEach((item2, index2) => {
              if (index1 != index2) {
                  item2.classList.remove("open");

                  let des = item2.querySelector(".description");
                  des.style.height = "0px";
                  item2.querySelector("i").classList.replace("fa-minus", "fa-plus");
              }
          });
      }
  }
});