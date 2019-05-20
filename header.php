<?php
    include "admin/function/function.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>FAQ System</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            body,div,ul,li, img, a {margin:0; padding:0; outline: 0; text-decoration: none;}
            a{color: cornflowerblue;}
            a:hover{color: cadetblue;}
            a.download{text-decoration:underline;}
            html,body{height: 100%;}
            body{font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif; margin: 0 auto; padding: 2%;}
            .description{font-size: 1.4em; display: block; text-align: center;}
            .tc{text-align: center}
            .texto{color: #cec0c0;padding: 10px;margin-bottom: 5px;}
            .gray{color: #666;font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;}
            .container{border: 1em; padding: 2em; margin: 2em; text-align: center;}
            .btn{width: 30%; margin: 0 0 0 20px; padding: 0.5em 2.5em; display: inline-block; background: #ccc; cursor:pointer;}
            .btn:hover{background: green; color: #fff}
            .code{background: #0A0704; color: #ccc; padding: 1em; margin: 1em 2em;font-family: Monaco, Consolas, "Lucida Console", monospace;}
            img{width: 100%; height: auto;}
            .button{margin: 0.5em; padding: 0.5em 1.5em; background: #ccc; color: #000; float: left; cursor: pointer;}
            .button:hover{background: #000; color: #ccc}
            .active{background: green; color: #fff}
            .reset:hover{background: red; color: #fff;}
            .github{position: absolute; top:0; right: 0; display:block;}
            .legal{position: fixed; bottom:0; right: 0; background: #fff; padding: 0.2em 1.5em; box-shadow: 0 0 0.3em; text-align: right;}

            .accordion-container{padding: 0 20px 20px;}
            .accordion,.accordion2,.accordion3{padding: 5px 10px; border: 3px solid black; cursor: pointer; font-weight: bold;color: #000000;margin-bottom: 5px;font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;}
            .simpleAccordionactive{color: #ffffff; background: #000000;}
            .customClass{background: #ff0000; border-color: #ff0000; color: #ffffff;}
        </style>
    </head>
    <body style="background:#666;">
        <div class="container">