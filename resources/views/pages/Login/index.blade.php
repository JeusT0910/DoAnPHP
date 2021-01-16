<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
    box-sizing: border-box;
    } 
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    p {
      letter-spacing: 20px;
      line-height: 150px;
      /* position: relative; */
    }
    .nen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      z-index: 1;
      background-color: rgba(0, 0, 0, 0.4 );
      padding-top: 100px;
      padding-bottom: 50px;
      font-size: 10px;
    }
    .khung {
      background-color: greenyellow;
      position: relative;
      margin: auto;
      width: 800px;
      height: 255px;
      
    }
    .khung1 {
      margin: 1rem;
    }
    .header {
      margin: 0 auto;
      padding: 100px;
      margin-left: 35%;
      margin-right: 35%;
      border: solid 5px yellow;
      background-image: url("img/hieu.jpg");
      border-radius: 50%;
      background-size: 100%;
    }
    .footer {
      position: absolute;
      top: 104%;
      width: 800px;
      height: 20%;
      margin: auto;
      background-color: gray;
      margin: -1rem;
    }
    .duoi {
      float: left;
      
    }
    .duoi .cach a{
      text-decoration: none;
      color: white;

    }
    .cach li {
      list-style: none;
      padding: 10px 20px;
      background-color: red;
      margin: 10px;
    }
    /* .khung input {
      width: 100%;
    } */
    .duoi .cach2 a{
      color: black;
      text-decoration: none;
    }
    .cach2 li {
      margin-top: 20px;
      list-style: none;
    }
    .cach1 li {
      list-style: none;
      margin-top: 20px;
      margin-right: 20px;
    }
    .container {
      margin-top: 10px;
      margin-bottom: 10px;
      text-align: center;
    }
    .container .load {
      font-size: 20px;
      background-color: green;
    }
    .container .load a {
      text-decoration: none;
      color: white;
    }
    .load li {
      list-style: none;
    }
    .dautat {
      float: right;
      margin: 20px;
      font-size: 20px;
    }
    .dautat li{
      list-style: none;
    }
    .dautat a {
      text-decoration: none;
      color: black;
      font-size:  -webkit-xxx-large;
    }
    .in {
      width: 100%;
    }
    .pa {
      width: 100%;
    }
    .h {
      display: block;
      margin-top: 3px;
    }
    .urmo .a{
      float: left;
    }
    .urmo input {
      margin-left: -1px;
    }
    .hieu {
      position: absolute;
      margin-top: 20px;
    }
    .chich{
      text-decoration: none;
      font-size: large;
      color: white;
      
    }
    .hieu li{
      list-style: none;
      background-color:  red;
      padding: 5px 1px;
      margin-left: 30px;
      margin-right: 100px;
      text-align: center;
    }
    .abc {
        position: absolute;
        margin-top: -30px;
    }
    .pas {
      margin-bottom: 5px;
    }
  
  </style>
</head>

<body>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis tempore obcaecati saepe reprehenderit quis
      possimus ipsum, earum odio necessitatibus quisquam labore, ut velit laudantium quos. Omnis consectetur
      voluptatibus ab eaque?
    </p>
    <div class="nen">
      <div class="khung">
        <div class="dautat"><li><a href="">X</a></li></div>
        <form action="{{route('login.login')}}" method="post" class="khung1">
            @csrf
          <div class="urname">
            <h1 class="abc">Email</h1>
            <input type="email" placeholder="Enter Username" name="email" class="in">
          </div>
          <div class="urpassword">
            <h1 class="pas">Password</h1>
            <input type="password" placeholder="Enter password" name="password" class="pa">
          </div>
          <div class="container">
            <button type="submit">Login</button>
          </div>
          <div class="urmo">
            <div class="a"><input type="checkbox" value="" > </div>
            <div class="a"><h3 class="h">Remember me</h3> </div>
            <br><br>
          </div>
          <div class="footer">
            <div class="duoi">
              <div class="cach"><li><a href="">Cancel</a></li></div>
            </div>
            <div class="duoi" style="float: right;">
              <div class="cach1" ><li><a href="">Password?</a></li></div>
            </div>
            <div class="duoi" style="float: right;" >
              <div class="cach2" ><li><a href="">Forgot</a></li></div>
            </div>
            
          </div>
        </form>
      </div>
    </div>
    <script>  
     @if(session('thongbao')=='2')
        alert('Vui lòng kiểm tra thông tin đăng nhập');
    @endif
         </script>    
</body>
</html>