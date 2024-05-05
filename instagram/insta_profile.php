<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instagram</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #C3E0E5; /* Baby Blue */
    }
    header {
      background-color: #274472; /* Dark Blue */
      color: #fff;
      padding: 10px;
      text-align: right;
    }
    header a {
      color: #fff;
      text-decoration: none;
      padding: 5px 10px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }
    header a:hover {
      background-color: #41729F; /* Blue Gray */
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    .upload-area {
      background-color: #5885AF; /* Dark Blue */
      border: 1px solid #274472; /* Blue Gray */
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
      height: 300px; /* Increased height */
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      overflow: hidden;
      flex-direction: row-reverse;
    }
    .upload-area input[type="file"] {
      margin-bottom: 10px;
    }
    .upload-area img {
      max-width: 100%;
      max-height: 100px; /* Adjust the maximum height for small preview */
      display: block;
      margin-left: auto;
      margin-right: 0;
    }
    .upload-area .upload-button {
      background-color: #41729F; /* Blue Gray */
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
    }
    .uploaded-image-container img {
    max-width: 400px; /* Adjust the maximum width as needed */
    max-height: 400px; /* Adjust the maximum height as needed */
}
.uploaded-image-container {
    text-align: center; /* Center the image horizontally */
}

    .upload-area .upload-button:hover {
      background-color: #274472; /* Dark Blue */
    }
    .followers {
      text-align: center;
      margin-bottom: 20px;
      color: #41729F; /* Blue Gray */
    }
    h1, h2 {
      color: #41729F; /* Blue Gray */
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
    <span style="font-size: 36px; font-weight: bold; color: #fff; align-items: left;">Instagram</span>
      <span>Welcome, <strong>Soumo</strong></span>
      <a href="insta_login.php">Logout</a>
    </div>
  </header>
  <div class="container">
    <div class="followers">
      <h2>Followers: 100</h2>
      <h2>Following: 100</h2>
    </div>
    <h1>Upload Photos</h1>
  </div>
  <div class="container">
  <div class="upload-area">
    <form id="uploadForm">
        <input type="file" name="fileToUpload" id="fileToUpload" onchange="previewImage()">
        <br>
        <button type="submit">Upload</button>
    </form>
    <img id="previewImage" src="" alt="Uploaded Image">
</div>
<div class="uploaded-image-container">
    </div>
  </div>
  <script>
    function previewImage() {
    var fileInput = document.getElementById('fileToUpload');
    var previewImage = document.getElementById('previewImage');

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            previewImage.style.display = 'block';
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

function uploadImage() {
    var form = document.getElementById('uploadForm');
    var fileInput = document.getElementById('fileToUpload');
    var uploadedImageContainer = document.querySelector('.uploaded-image-container');

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var uploadedImage = document.createElement('img');
            uploadedImage.src = e.target.result;
            uploadedImage.alt = 'Uploaded Image';

            uploadedImageContainer.appendChild(uploadedImage);
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

// Add event listener to upload button
document.getElementById('uploadForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default form submission
    uploadImage();
});
  </script>
</body>
</html>
