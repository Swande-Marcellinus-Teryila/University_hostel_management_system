
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '" width="120" height="120"/>'].join('');
          document.getElementById('list1').insertBefore(span, null);
                          document.getElementById("list1").src=e.target.result;

        };
      })(f);
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('upfile1').addEventListener('change', handleFileSelect, false);
 
       var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
  
    document.getElementById("nextBtn").innerHTML = "Reserve";
     document.getElementById("nextBtn").className="btn btn-danger";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i,z ,textarea,valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  z =x[currentTab].getElementsByTagName('select');
  

  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
     /* checking wether the element exist */
    // If a field is empty...

    if(y[i]){
    if (y[i].value == ""){
        // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    } 
  }
}

   // A loop that checks every select field in the current tab:
  for (i = 0; i < z.length; i++) {
    /* checking wether the element exist */
    if(z[i]){
      /*checking the select value */
    if(z[i].value=="-select-" || z[i].value==""){
      // add an "invalid" class to the field:
      z[i].className+=" invalid";
      // and set the current valid status to false:
      valid = false;
      }
    }
  }

  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";

}


function getHostelBlocks(gender){
  
  if(gender=="Male"||gender=="Female"){
    $.post('api.php',{hostel_block_check:'checker',sex:gender},function(data,status){
      $("#hostel_block").html(data);
  });
      
    }else{
      $("#nextBtn").hide(); 
      $("#room_number").html('<option>-select-</option>');
    }
 
}

$("#matno").blur(function(){
 $.post("api.php",{matno:$("#matno").val()},function(data,status){
           $("#info").html(data);
        }); 
});
/* hiding the next button to check availability first*/
$("#nextBtn").hide();
function checkAvaliability(hostel_block){
   $.post("api.php",{checkavaliability:'check', id:hostel_block},function(data,status){
           $("#room_number").html(data);
          $("#room_number").change(function(){
            if($("#room_number").val()!="-select room-"){
           $("#nextBtn").show(500);
             }
             else{
                  $("#nextBtn").hide('50'); 
             }
         });
      $("#nextBtn").hide(); 
  });
  
}

