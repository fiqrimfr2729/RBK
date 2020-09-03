$('#add_layout[type=file]').change(function () {
      $fileCount = this.files.length;
      $('#count').text($fileCount + " " + 'Selected');
  });

  function camera_upload(){
    
    
  }


  var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
      },
    });

  var swiper = new Swiper('.swiper-container2', {
    });

  $(document).ready(function(){
      $("#formPhotoArea").submit(function(e) {
          e.preventDefault(); 
          console.log($(this));
          var formData = new FormData($(this)[0]);
          var id = $('#id').val();

           $.ajax({
               url:base_url+'inspection_sub_area/file_camera_upload/'+id, //URL submit
               type:"post", //method Submit
               
               datatype : "JSON",
                data: formData,
                // async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){

                // console.log(data);

                var res = JSON.parse(data);

                if(res.status == 'success'){
                  $('#photoAreaMessage').html('(Photo submitted)');
                  $('#photoAreaMessage').fadeIn();

                  setTimeout(function () {
                      $('#photoAreaMessage').fadeOut();
                  }, 5000);
                }

                if(res.status == 'error'){
                  $('#photoAreaMessage').html('(Error : '+data.message+')');
                  $('#photoAreaMessage').fadeIn();

                  setTimeout(function () {
                      $('#photoAreaMessage').fadeOut();
                  }, 5000);
                }

             }
           });
      });


      $("#formPhotoLayout").submit(function(e) {
          e.preventDefault(); 
          console.log($(this));
          var formData = new FormData($(this)[0]);
          var id = $('#id').val();

           $.ajax({
               url:base_url+'inspection_sub_area/file_gallery_upload/'+id, //URL submit
               type:"post", //method Submit
               
               datatype : "JSON",
                data: formData,
                // async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){

                // console.log(data);

                var res = JSON.parse(data);

                if(res.status == 'success'){
                  $('#photoLayoutMessage').html('(Photo submitted)');
                  $('#photoLayoutMessage').fadeIn();

                  setTimeout(function () {
                      $('#photoLayoutMessage').fadeOut();
                  }, 5000);
                }

                if(res.status == 'error'){
                  $('#photoLayoutMessage').html('(Error : '+data.message+')');
                  $('#photoLayoutMessage').fadeIn();

                  setTimeout(function () {
                      $('#photoLayoutMessage').fadeOut();
                  }, 5000);
                }

             }
           });
      });
  });