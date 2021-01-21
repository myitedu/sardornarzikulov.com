<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="mymail">
    <h5>Dear Sardor,</h5>
    <p>The following user has sent you a message from your site.</p>
    <p>Name: {{$data['name']}}</p>
    <p>Email: {{$data['email']}}</p>
    <p>Subject: {{$data['subject']}}</p>
    <p>Body: {{$data['message']}}</p>
</div>
<style>
    body{
        background-color: #111c11;
        color: #074141;
    }
    .myimg{
        width: 100%;
    }

    #mymail{
        width: 80%;
        margin: 100px auto;
        background-color: #fffcfc;
        text-align: left;
        padding:10px;

    }

</style>
</body>
</html>
