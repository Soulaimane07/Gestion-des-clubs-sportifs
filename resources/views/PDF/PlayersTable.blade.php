<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link href="{{ public_path('assets/css/pdf.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div style="text-align: center; margin-top: 20px">
        <img src="{{ storage_path('app/public/images/cadi.jpg')}}" width="30%">
    </div>

    <div class="container" style="margin-top: 30px">
    <h1 style="text-align: center; margin-bottom: 20px">{{$tournoie[0]->title}}</h1>

    <h3 style="margin-bottom: 20px">{{$etab[0]->etab}}</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Full name</th>
            <th scope="col"> CIN </th>
            <th scope="col"> CNE </th>
            <th scope="col"> Filiere </th>
          </tr>
        </thead>
        <tbody >
            @foreach($players as $key => $data )
                <tr>
                    <th scope="row"> {{++$key}} </th>
                    <td> {{$data->lname}} {{$data->fname}} </td>
                    <td> {{$data->CNI}} </td>
                    <td> {{$data->CNE}} </td>
                    <td> {{$data->filier}} </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</body>
</html>