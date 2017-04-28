<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Styleguide</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <!-- Styles -->
        <style>
        body {
          background-image: url('/Bokeh-Tov.jpg');
          height: 100vh;
          width: 100vw;
          overflow: hidden;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          padding: 0;
          margin: 0;
        }

        .container {
          height: 95vh;
          width: 95vw;
          background-color: rgba(0, 0, 0, 0.2);
          overflow: scroll;
          /*padding: 20px;*/
          margin: 0;
        }

        .center {
          text-align: center;
        }

        h1 {
          font-family: "Lobster Two";
          color: #ffd7af;
          font-weight: 300;
          font-style: normal;
          font-size: 72px;
          cursor: default;
          text-align: center;
        }

        h2 {
          font-family: "Lobster Two";
          color: #ffd7af;
          font-weight: 300;
          font-style: normal;
          font-size: 48px;
          cursor: default;
        }

        h3 {
          font-family: "Open Sans";
          color: white;
        }

        h4 {
          font-family: 'Open Sans';
          margin-bottom: 0;
          color: black;
          font-weight: 700;
          font-size: 18px;
        }

        h5 {
          font-family: 'Open Sans';
          margin-bottom: 0;
          color: black;
          font-weight: 400;
          font-size: 14px;
        }

        p {
          font-family: 'Open Sans';
          color: white;
          margin-bottom: 0;
          font-weight: 200;
        }

        p.lead {
          font-size: 18px;
          font-weight: bold;
        }

        p.light {
          font-weight: lighter;
        }

        hr {
          height: 1px;
          border: none;
          color: white;
          background-color: white;
          width: 60%;
          text-align: center;
          margin: 0 auto;
          margin-bottom: 15px;
        }

        .btn-primary {
          border-radius: 50px;
          border: 3px solid #ffd7af;
          color: 	#ffd7af;
          overflow: hidden;
          background: rgba(0, 0, 0, 0.2);
          cursor: pointer;
          padding: 15px 40px;
          display: inline-block;
          margin: 15px 15px;
          text-transform: uppercase;
          letter-spacing: 1px;
          font-weight: 500;
          outline: none;
          position: relative;
          transition: all 0.3s;
          font-family: "Open Sans", sans-serif;
          font-size: 12px;
          text-decoration: none;
        }

        .btn-primary:hover {
          background: rgba(255,	215,175, 0.1);
        }

        .btn-lg {
          border-radius: 50px;
          border: 3px solid #ffd7af;
          color: 	#ffd7af;
          overflow: hidden;
          background: rgba(0, 0, 0, 0.2);
          cursor: pointer;
          padding: 25px 80px;
          display: inline-block;
          margin: 15px 15px;
          text-transform: uppercase;
          letter-spacing: 1px;
          font-weight: 500;
          outline: none;
          position: relative;
          transition: all 0.3s;
          font-family: "Open Sans", sans-serif;
          font-size: 32px;
          text-decoration: none;
        }

        .btn-med {
          border-radius: 50px;
          border: 3px solid #ffd7af;
          color: 	#ffd7af;
          overflow: hidden;
          background: rgba(0, 0, 0, 0.2);
          cursor: pointer;
          padding: 15px 50px;
          display: inline-block;
          margin: 15px 15px;
          text-transform: uppercase;
          letter-spacing: 1px;
          font-weight: 500;
          outline: none;
          position: relative;
          transition: all 0.3s;
          font-family: "Open Sans", sans-serif;
          font-size: 24px;
          text-decoration: none;
        }

        .btn-lg:hover, .btn-lg:focus, .btn-lg:active, .btn-lg.active, .open>.dropdown-toggle.btn-lg {
          background: rgba(255,	215,175, 0.1);
        }

        .btn-sm {
          border: 3px solid #ffd7af;
          color: 	#ffd7af;
          overflow: hidden;
          background: #ffd7af;
          cursor: pointer;
          padding: 10px 30px;
          display: inline-block;
          margin: 30px 15px;
          text-transform: uppercase;
          letter-spacing: 1px;
          font-weight: 500;
          outline: none;
          position: relative;
          transition: all 0.3s;
          font-family: "Open Sans", sans-serif;
          font-size: 16px;
          text-decoration: none;
        }

        .btn-sm span {
          color: rgba(0, 0, 0, .7);
          font-family: "Open Sans", sans-serif;
        }

        .btn-sm:hover, .btn-sm:focus, .btn-sm:active, .btn-sm.active, .open>.dropdown-toggle.btn-sm {
          background: rgba(255,	215,175, 0.3);
          border: 3px solid #ffd7af;
          color: white;
        }

        .primary{
          background-color: #ffd7af;
        }

        .secondary{
          background-color: #ffd3d3;
        }

        .white{
          background-color: white;
        }

        .black-background{
          background-color: black;
        }

        td img{
          height: 22px;
          width: 22px;
          margin-top: -9px;
        }

        .form-group{
          width: 40vw;
        }

        .wrapper {
          display: flex;
          flex-direction: column;
          align-items: center;
          overflow: scroll;
        }

        .btn-add {
          margin-top: 22px;
        }

        .nopadding {
          margin-left: 0;
          margin-right: 0;
          padding-left: 0;
          padding-right: 0;
        }

        .nopadding-left {
          margin-left: 0;
          padding-left: 0;
        }

        .nopadding-right {
          margin-right: 0;
          padding-right: 0;
        }

        .padding-below {
          padding-bottom: 15px;
        }

        .padding-top {
          padding-top: 10px;
        }

        .margin-top {
          margin-top: 15px;
        }

        .margin-bottom {
          margin-bottom: 12px;
        }

        #more-top {
          margin-top: 20px;
        }

        .footer h4 {
          text-align: center;
        }

        .fullheight {
          height: 100%;
        }

        #edit-address, #edit-phone {
          margin-top: 15px;
        }

        td.edit, td.delete {
          width: 38px;
        }

        td.edit img, td.delete img {
          margin-top: 5px;
        }

        .flex {
          display: flex;
          flex-direction: column;
          justify-content: center;
        }

        .left {
          align-items: flex-start;
        }

        .form-group {
          margin-bottom: 0px;
        }

        .table {
          padding-top: 10px;
        }

        .color-panel {
          height: 100px;
          width: 40%;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
        }

        .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex;
          width: 100vw;
          align-items: center;
          justify-content: center;
          margin-bottom: 10px;
        }

        .black {
          color: black;
        }

        .no-padding {
          padding: 0;
          margin: 0;
        }

        input {
          margin-top: 60px;
          margin-bottom: 60px;
          width: 40vw;
          background-color: transparent;
          color: white;
          outline: none;
          outline-style: none;
          outline-offset: 0;
          border-top: none;
          border-left: none;
          border-right: none;
          border-bottom: solid #eeeeee 1px;
          padding: 3px 10px;
          font-size: 24px;
        }

        ::-webkit-input-placeholder {
          color: #FAEBD7;
        }

        </style>

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        </head>
      <body>
        <div class="container styleguide">

        <a href="/" class="btn btn-primary margin-bottom">Return Home</a>

        <h1>Style Guide</h1>

        <h2 class="center">Colors</h2>
        <hr>

        <div class="row">
          <div class="color-panel primary">
            <p class="black no-padding">Primary color #ffd7af</p>
          </div>
        </div>
        <div class="row">
          <div class="color-panel secondary">
            <p class="black no-padding">Secondary color #ffd3d3</p>
          </div>
        </div>
        <div class="row">
          <div class="color-panel white">
            <p class="black no-padding">White #ffffff</p>
          </div>
        </div>
        <div class="row">
          <div class="color-panel black-background">
            <p class="no-padding">Black #000000</p>
          </div>
        </div>

        <h2 class="center">Headings</h2>
        <hr>
        <h1>'h1' A Large Header (Lobster Two)</h1>
        <h2 class="center">'h2' A Smaller Header (Lobster Two)</h2>
        <h3 class="center">'h3' Even Smaller Header (Open Sans)</h3>
        <h4 class="center">'h4' Even Smaller Header (Open Sans)</h4>
        <h4 class="center">'h5' Smallest Header (Open Sans)</h5>

        <h2 class="center">Body Text</h2>
        <hr>
        <p class="center lead">p.lead Some Large Text (Open Sans)</h4>
        <p class="center">p Some Text (Open Sans)</p>
        <p class="center light">p.light Some Smaller Text (Open Sans)</p>

        <h2 class="center">Buttons</h2>
          <hr>
        <div class="row">
          <a href="#" class="btn btn-lg">Large Button</a>
        </div>
        <div class="row no-padding">
          <a href="#" class="btn btn-med">Medium Button</a>
        </div>
        <div class="row no-padding">
          <a href="#" class="btn btn-primary">Small Button</a>
        </div>
        <div class="row">
          <a href="#" class="btn btn-sm"><span>Square Button</span></a>
        </div>

        <h2 class="center">Text Input</h2>
        <hr>
        <div class="row">
          <form action="#">
            <input type="text" placeholder="sample text input">
          </form>
        </div>
      </div>
    </body>
</html>
