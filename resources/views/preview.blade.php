<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
       
        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            margin-left: 20px;
            padding: 20px 0;
        }
        .profile-picture {
            display: flex;
            align-items: center;
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ccc;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }
        .profile-picture h2 {
            font-size: 16px;
            color: #333;
            white-space: nowrap;
            margin-bottom: 20px;
            margin-left: 70px;
        }
        .profile-info {
            text-align: center;
        }
        .profile-info h2 {
            font-size: 18px;
            color: black;
        }
        .profile-info .button1 {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }
        .profile-info .button1:hover {
            background-color: #2980b9;
        }
       
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center; 
            height: 95vh; 
        }
        .upload-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
            max-width: 600px;
            margin: auto;
        }
        .upload-container h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        .upload-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .upload-container p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .upload-container button {
            width: 66%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #8F5E48;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #000;
            cursor: pointer;
            color:#fff;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        
        <h2>Меню</h2>
        @include('sidebar')
    </div>
    <div class="content">
        <div class="upload-container">
            <form id="previewForm">
                <div class="container">
                    <div class="preview-section">
                        <h2>Крок 2</h2>
                        <p>Передперегляд книги</p>
                        <button type="button" id="showCoverButton">Завантажити</button>
                       
                    </div>
                </div>
                
            </form>
        </div>
        <div class="preview-container">
            <img id="coverPreview" src="" alt="Прев'ю обкладинки" style="display: none; max-width: 100%;">
            <p id="coverError" style="display: none;">Обкладинка книги не завантажена</p>
        </div>
    </div>
    
    <script>
     document.getElementById('showCoverButton').addEventListener('click', function(event) {
            event.preventDefault(); 

            const coverUrl = localStorage.getItem('coverImageUrl');
            const coverDisplay = document.getElementById('coverDisplay');  

            if (coverUrl) {
                document.getElementById('coverPreview').src = coverUrl;  
                document.getElementById('coverPreview').style.display = 'block';  
                document.getElementById('coverError').style.display = 'none';  
                coverDisplay.style.display = 'block';
            } else {
                document.getElementById('coverPreview').style.display = 'none';  
                document.getElementById('coverError').style.display = 'block';  
                coverDisplay.style.display = 'block'; 
            }
        });

    
    </script>
</body>

</html>
