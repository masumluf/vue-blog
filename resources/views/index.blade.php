<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("/css")}}/app.css">


</head>
<body>



      <!-- Default box -->
      <div id="app" class="container">

        <h1>hello</h1>


            <public-master></public-master>
      </div>
      <!-- /.card -->


</body>
<script src="/bower_components/admin-lte/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="{{asset("js/app.js")}}"></script>

</html>
