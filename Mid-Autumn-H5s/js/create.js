  $(document).ready(function() {
                        $("#create").on('click', function() {
                                window.location.replace("./GenerateImage.php?img_url=" + $("#img_url").val()+"&distance="+$("#distance").val()+"&moon_cake="+$("#moon_cake").val()) ;
                        });
  });

 
