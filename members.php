<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Campaigners Portal</title>
    <style media="screen">
      *{
        margin:0;
        padding:0;
        box-sizing: border-box;
      }
      html,body{
        width:100%;
        height: 100%;
      }
      body{
        background: #eee;
      }
      #sidebar{
        height:100%;
        background: #1d272b;
        width:300px;
        position: fixed;
        top:0;
        left:0;
        z-index: 99;
      }
      #main-body{
        width:100%;
        padding:50px 50px 50px 350px;
      }
      .wrapper{
        width:100%;
        height:100%;
      }
      #header{
        width:100%;
        height:80px;
        background: #fff;
      }
      #main-body .page-title{
        font-size:30px;
        color:#555;
        font-weight: bold;
      }
      #main-body .cards{
        width:100%;
        display: flex;
      }
      #main-body .cards .row{
        width:100%;
        display: flex;
        margin:20px 0;
        padding:5px 0;
        flex-wrap: wrap;
      }

      #main-body .cards .row .item{
        flex:1;
        height: 300px;
        min-width: 300px;
        margin-right:20px;
        margin-bottom:20px;
        background: #fff;
        padding:20px;
        box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.2);
      }
      #main-body .cards .row .item h1{
        border-bottom:1px solid #999;
        color:#555;
      }

    </style>
  </head>
  <body>
    <div class="wrapper">
      <div id="header">

      </div>
      <div id="sidebar">

      </div>
      <div id="main-body">
        <div class="page-title">
          Page Title
        </div>
        <div class="cards">
          <div class="row">
            <div class="item">
              <h1>Test</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
