<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@800&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
        font-family: 'Poppins', sans-serif;
        background: #eee;
      }
      #sidebar{
        height:100%;
        background: #28572a;
        width:250px;
        position: fixed;
        top:0;
        left:0;
        color:white;
        z-index: 99;
        padding:20px 0;
      }
      #sidebar .title{
        font-size: 10px;
        text-align: center;
        font-family:'Playfair Display';
      }

      .title h1 {
        letter-spacing: 4px;
      }

      #sidebar .title img{
        width:40px;
      }
      #sidebar .nav{
        width:100%;
        margin-top:30px;
      }
      #sidebar .nav .item{
        width:100%;
        padding:10px 30px;
        text-align: left;
        color:white;
      }
      #sidebar .nav .item i{
        margin-right: 10px;
      }

      #sidebar .nav .item:hover{
        background: rgba(255,255,255,0.2);
      }

      #main-body{
        width:100%;
        padding:50px 50px 50px 300px;
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
        flex-wrap: wrap;
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
        overflow-x: hidden;
      }
      #main-body .cards .row .item h1{
        border-bottom:1px solid #999;
        color:#555;
        margin-bottom: 10px;
      }
      #main-body .cards .row .item table{
        width:100%;
        text-align: left;
        border-collapse: collapse;
        overflow-x: auto;
      }
      #main-body .cards .row .item table tr td{
        margin:0;
        padding:5px;
      }
      #main-body .cards .row .item table tr{
        background: #eee;
      }

      #main-body .cards .row .item table tr:nth-of-type(2){
        background: #bbb;
      }

      #main-body .cards .row .item table tr th{
        padding:5px;
        background: #000;
        color:white;
      }
      .table-container{
        overflow-x: auto;
        margin-bottom: 20px;
      }
      .xbutton{
        padding:10px 20px;
        background: #137717;
        display: table;
        color:white;
        font-weight: 700;
      }
      .xbutton.red{
        background: #ea3232;
      }
      .xbutton.blue{
        background: #32b4ea;
      }

      table .xbutton{
        width:50px;
        height: 20px;
        text-align: center;
      }

      .binput {
        width: 80%;
        height: 50px;
        outline: none;
        border: 3px solid #28572a;
        padding: 5px 10px;
        border-radius: 25px;
        transition: .7s all;
        font-size: 18px;
      }

      .binput:focus {
        border-radius: 5px;
      }

      .group-input {
        margin-bottom: 20px;
      }

      .group-input p {
        padding-left: 10px;
      }

      .flex {
        display: flex;
      }

      .fl-1 {
        flex: 1;
      }

      .binput.invalid {
        border: 3px solid red !important;
        box-shadow: 0 0 4px 0 rgba(236, 9, 9, 0.08), 0 2px 4px 0 rgba(230, 12, 12, 0.12);
      }

    </style>
  </head>
  <body>
    <div class="wrapper">
      <div id="header">

      </div>
      <div id="sidebar">
        <div class="title">
          <img src="layout/png/logo-white.png" alt="Campaigners Logo White">
          <h1>Campaigners</h1>
        </div>
        <div class="nav">
          <div class="item">
             <i class="fas fa-tachometer-alt"></i>
            Dashboard
          </div>
          <div class="item">
             <i class="fas fa-star-of-life"></i>
            Updates
          </div>
          <div class="item">
             <i class="fas fa-cogs"></i>
            Settings
          </div>
          <div class="item">
             <i class="fas fa-users"></i>
            Members
          </div>
          <div class="item">
             <i class="far fa-star"></i>
            My Points
          </div>
          <div class="item">
             <i class="fas fa-tasks"></i>
            My Tasks
          </div>
          <div class="item">
             <i class="far fa-calendar-alt"></i>
            Calendar
          </div>
          <div class="item">
             <i class="far fa-envelope"></i>
            Mail
          </div>
          <div class="item">
             <i class="fas fa-door-open"></i>
            Logout
          </div>
        </div>
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
          <!-- Table START -->
          <div class="row">
            <div class="item">
              <h1>"Committee" members</h1>
              <div class="table-container">
                <table>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>ID</th>
                    <th>Committee</th>
                    <th>Evaluate</th>
                    <th>Warn</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Mohamed Ashraf</td>
                    <td>01156052920</td>
                    <td>Mohamed.ashraf881999@gmail.com</td>
                    <td>2018/12470</td>
                    <td>Personell</td>
                    <td><div class="xbutton blue"> <i class="fas fa-star"></i> </div></td>
                    <td><div class="xbutton red"> <i class="fas fa-exclamation-triangle"></i> </div></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Mohamed Ashraf</td>
                    <td>01156052920</td>
                    <td>Mohamed.ashraf881999@gmail.com</td>
                    <td>2018/12470</td>
                    <td>Personell</td>
                    <td><div class="xbutton blue"> <i class="fas fa-star"></i> </div></td>
                    <td><div class="xbutton red"> <i class="fas fa-exclamation-triangle"></i> </div></td>
                  </tr>
                </table>
              </div>
              <div class="xbutton">View All</div>
            </div>
          </div>
          <!-- Table END -->

          <div class="row">
            <div class="item">
              <h1>Form</h1>
              <div class="form">
                <form action="index.php" method="POST">
                <div class="flex">
                <div class="group-input fl-1">
                  <p>Text Input :</p>
                  <input type="text" class="binput" name="name" placeholder="Enter Your Name">
                </div>
                <div class="group-input fl-1">
                  <p>Invalid Text Input :</p>
                  <input type="text" class="binput invalid" name="name" placeholder="Enter Your Name">
                </div>
                </div>
                <div class="group-input">
                  <p>Select :</p>
                  <!-- <input type="email" class="binput" name="email" placeholder="Enter Your E-Mail"> -->
                  <select name="select" id="select" class="binput">
                    <option value="" selected disabled>Please Select From The Following</option>
                    <option value="">Option 1</option>
                  </select>
                </div>
                </form>
              </div>
            </div>
          </div>

      </div>
    </div>

  </body>
</html>
