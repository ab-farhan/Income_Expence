<!DOCTYPE html>
<html>
    <head>
      <title>PDF</title>
      <style>
          .wrapper{
            width: 600px;
            margin: 0px auto;
          }

          h1{
              text-align: center;
          }


      </style>
    </head>
    <body>
      <div class="wrapper">
          <h1>All User Information</h1>
          <table width="500" align="center" style="border-collapse: collapse; border:1px solid #000; outline:0;">
              <tr style="background-color:black; color:#fff">
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>User phone</th>
                  <th>User Role</th>
              </tr>
              @foreach($all as $data)
              <tr>
                  <td style="border:1px solid #000; outline:0;">{{$data->name}}</td>
                  <td style="border:1px solid #000; outline:0;">{{$data->email}}</td>
                  <td style="border:1px solid #000; outline:0;">{{$data->user_phone}}</td>
                  <td style="border:1px solid #000; outline:0;"></td>
              </tr>
              @endforeach
          </table>
      </div>
    </body>
</html>
