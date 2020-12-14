<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mirai-新番时间表</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
            list-style: none;
        }

        body {
            background: url(../image/background.jpg) no-repeat center center fixed;
            background-size: cover;
        }

        .all {
            min-height: 100%;
        }

        .main {
            width: 100%;
            height: 200px;
            position: relative;
        }

        iframe {
            width: 100%;
            height: 50px;
            position: relative;
            z-index: 1000;
        }

        .footer {
            height: 165px;
            position: absolute;
            bottom: 0;
            left: 0;
        }


    </style>
</head>
<body>
<div class="all">
    <div class="main">
        <iframe src="../header.php" class="header" scrolling="no"></iframe>
        <div class="top">

        </div>

    </div>
</div>

<iframe src="../footer.html" class="footer" scrolling="no"></iframe>
</body>
</html>