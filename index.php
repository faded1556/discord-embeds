<?php
   if ($_SERVER['QUERY_STRING']) {
      if ($_GET['description']) {
         $description = rawurldecode(rawurldecode($_GET["description"]));
      }
      if ($_GET['title']) {
         $title = rawurldecode(rawurldecode($_GET['title']));
      }
      if ($_GET['image']) {
         $image = $_GET['image'];
      }
      if ($_GET['author']) {
         $author = rawurldecode(rawurldecode($_GET['author']));
      }
      if ($_GET['color']) {
         $color = $_GET['color'];
      }
      if ($_GET['redirect']) {
         $redirect = $_GET['redirect'];
      }
   } else {
     $description = "A Discord embed generator that allows users to send embeds.";
     $title = "Discord Embeds";
     $color = "00ff04";
   }
?>
<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#">
<head>
  <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.css">
  <meta charset="UTF-8">
  <meta property="og:description" content="<?php echo str_replace("\\n", "\n", $description) ?>">
  <meta property="og:title" content="<?php echo $title ?>">
  <meta property="og:image" content="<?php echo $image ?>">
  <meta property="og:site_name" content="<?php echo $author ?>">
  <meta name="theme-color" content="#<?php echo $color ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php 
if ($_GET['redirect']) {
$redirect = $_GET['redirect'];
$valid = 'https://';
  if(strpos($redirect, $valid) !== true) {
          $redirect = $valid . $redirect;
   
  }
  echo "<meta http-equiv='refresh' content=0;url=" . $redirect . "/>";
}?>
</head>
<style>
  .result  {
  float: right;
}
  
  input[type="checkbox"] {
    margin: 5px;
	display: auto;
	width: 10px;
	height: 10px;
  }
  .check {
    margin-top: 200px;
    display:inline-block
  }
  .no {
    grid-column: 2;
    grid-column-start: 2;
    grid-column-end: 2;
    top: 30px;
    display: auto;
    left: 20px;
  }
  .wd {
    width: 60%;
  }
  input[type="color"] {
	display: block;
	width: 200px;
	height: 50px;
  }
</style>
<body>
    <h1>Discord Embeds</h1>
    <label for="author">Author:</label><br>
    <input type="text" placeholder="Embed Author" id="author"><br><br>
    <label for="title">Title:</label><br>
    <input type="text" placeholder="Embed Title" id="title"><br><br>
    <label for="description">Description: <br>
    <textarea class="wd" type="text" placeholder="Embed Description" id="description"></textarea></label><br><br>
    <label for="color">Sidebar Color:</label><br>
    <input type="color" id="color" value="#e66465"><br><br>
    <label for="image">Image URL:</label><br>
    <input type="text" placeholder="Embed Image" id="image"><br><br>
    <label for="redirect">Redirect URL:</label><br>
    <input type="text" placeholder="Embed URL" id="redirect"><br><br>
    <label class="no" for="hidden">
    <input type="checkbox" class="check" id="hidden">Hide URL
<br><br>
<button id="subbutton">Submit</button>	
<br><br>
      <div id="mega" hidden>
        <label for="res">Result<br>
        <input
          type="text"
          class="form-control"
          id="res"
          value=""
          readonly
        /><br><button onclick="copy()">Copy</label></button></label></div>
 <script>
document.getElementById("subbutton").addEventListener("click", myFunction);
   function myFunction() {
  const domain = "https://embed.js.memorial/?";
  const author = document.getElementById("author").value.replace("\n", "\\n");
  const title = document.getElementById("title").value.replace("\n", "\\n");
  const description = document
    .getElementById("description")
    .value.replace("\n", "\\n");
  const color = document.getElementById("color").value;
  const image = document.getElementById("image").value;
  const redirect = document.getElementById("redirect").value;
  const hid = document.getElementById("hidden").checked;

  const params = new URLSearchParams();
  if (author) params.set("author", encodeURIComponent(author));
  if (title) params.set("title", encodeURIComponent(title));
  if (description) params.set("description", encodeURIComponent(description));
  if (color) params.set("color", color.slice(1));
  if (image) params.set("image", encodeURIComponent(image));
  if (redirect) params.set("redirect", encodeURIComponent(redirect));
  console.log("params", params.toString());
  if (hid) {
    var xyz = "||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||||​||https://embed.js.memorial/?";
    console.log(xyz)
  } else { var xyz = "https://embed.js.memorial/?";}
  const results = document.getElementById("res");
  results.value = xyz + params.toString();
  const unhide = document.getElementById("mega");
  unhide.removeAttribute("hidden");
};
   

   function copy() {
  var copyText = document.getElementById("res");
  copyText.select();
  copyText.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(copyText.value);
  alert("Copied the text: " + copyText.value);
}
  
    </script> 
</body>
</html>
