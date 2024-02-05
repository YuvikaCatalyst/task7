
$(document).ready(function () {
  $("#uploadButton").click(function (e) {
    e.preventDefault();
    $("#upload_file").click();
  });
 

$('.delete-button').on("click", function (e) {
  e.preventDefault();
  var deleteId = $(this).attr("data-id");
  
  if (confirm("Are you sure you want to delete this item?")) {
    $.ajax({
      type: "POST",
      url: "delete.php",  
      data: { delete_id: deleteId },
      success: function (deleteResponse) {
        $(".delete-button[data-id='" + deleteId + "']").closest('div').remove();
      }
    });
  }
});

  $("#fetchButton").click(function () {
    // Get input values
    var first_name1 = $("#first_name").val();
    var middle_name1 = $("#middle_name").val();
    var last_name1 = $("#last_name").val();

    // Create FormData
    var formData = new FormData();
    formData.append("first_name_val", first_name1);
    formData.append("middle_name_val", middle_name1);
    formData.append("last_name_val", last_name1);

    // Add file to FormData
    var fileInput = $("#upload_file")[0].files[0];
    formData.append("upload_file", fileInput);

    // Ajax request
   /* $.ajax({
      type: "POST",
      url: "result.php",
      data: formData,
      contentType: false,
      processData: false,
      success:function(){
        
            }
    });*/

    
  });
});