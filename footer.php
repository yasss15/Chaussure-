<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>
    <style scoped>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.5;
            position: absolute; bottom: 0;
            position: absolute; bottom: 0; left: 0; right: 0;
        }

        .contact-footer {
            padding: 2rem 0;
            background: #000;
        }

        .contact-footer h3 {
            font-size: 1.3rem;
            color: #fff;
            margin-bottom: 1rem;
            text-align: center;
        }

        .social-links {
            display: flex;
            justify-content: center;
        }

        .social-links a {
            text-decoration: none;
            width: 40px;
            height: 40px;
            color: #fff;
            border: 2px solid #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0.4rem;
            transition: all 0.4s ease;
        }

        .social-links a:hover {
            color: bisque;
            border-color: bisque;
            transform: scale(1.3);
        }
    </style>
    <div class="contact-footer">
        <h3>Follow Us</h3>
        <div class="social-links">
            <a href="#"><i class='bx bxl-facebook-circle'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-linkedin-square'></i></a>
            <a href="#"><i class='bx bxl-youtube'></i></a>
        </div>
    </div>

</body>

</html>