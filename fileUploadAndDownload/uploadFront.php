 <!-- *
 * @authors alihanniba          alihanniba@gmail.com
 * @date    2016-03-09 09:24:31
 * @version \www.alihanniba.com\
 */ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件上传</title>
    <style>
        html,body{
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        form{
            width: 60%;
            margin: 0 auto;
            margin-top: 100px;
        }
        input{
            height: 200px;
            width: 80%;
        }
    </style>
</head>
<body>
    <form action="getUploadFunc.php" method="post" enctype="multipart/form-data">
        请打开你要上传的文件<input type="file" name="myFile" >
        <input type="submit">
    </form>
</body>
</html>
