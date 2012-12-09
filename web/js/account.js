/* 
 * Javasript's for working with user avatars
 */

$(document).ready(function() {
      var button = $('#img_avatar'), interval;

      $.ajax_upload(button, {
            action : "/services/avatarupload",
            name : "avatar",
            onSubmit : function(file, ext) {
                // Добавить иконку загрузки файла
            },
            onComplete : function(file, response) {
              var data = jQuery.parseJSON(response);
              
              // В случае успеха меняем текущую аватарку у пользователя
              if(data.status == true) {
                  $("#img_avatar").attr("src", data.directory+data.filename);
              }
              
              // Добавить убрать иконку загрузки файла
            }
          });
});