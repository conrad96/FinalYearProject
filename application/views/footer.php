  <!-- <img id="uploadPreview" style="width: 100px; height: 100px;" /> -->
<!-- <input id="uploadImage" type="file" name="myPhoto" onchange="PreviewImage();" /> -->
<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    }

</script>


<!-- <script type="text/javascript">
$(document).ready(function(){
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#photoUpload').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#photo").change(function() {
  readURL(this);
});

});
</script> -->

<script src="<?php echo $assets['scripts'].'main.js'; ?>"></script>
<?php
$path=$assets['scripts'];
?>

<!--script for display of cliked boxes in admin panel -->
<script type="text/javascript" src="<?php echo $path.'reveal-functions.js'; ?>"></script>
<!-- end -->

</body>
</html>
