<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link href="{{ public_path('assets/css/pdf.css') }}" rel="stylesheet">
</head>
<body>
            <article style="margin: 0;">
                @foreach($players ?? '' as $data)
                    <section class="card" style=" padding: 10px; height: 204.01889764px; width: 323.52755906px">
                        <article style="cadi" style="margin-bottom: 6px">
                            <img src="{{ storage_path('app\public\images\cadi.jpg')}}">
                        </article>
                        <article style="cadi" style="margin-bottom: 14px; background-color: #a44c24; color: white; border-radius: 8px; padding-top: 4px; padding-bottom: 4px">
                            <h4> {{$tournoie[0]->title}} </h4>
                        </article>
                        <div class="card-body" >
                            <div style="width: 28%; float: left">
                                <img src="{{ storage_path('app/public/images/players/image/'.$data->image) }}" style="width: 100%; border-radius: 8px">
                            </div>
                            <div style=" padding-left: 20px">
                                <h3 style="margin-bottom: 6px"> {{$data->lname}} {{$data->fname}} </h3> 
                                <h5 style="margin-bottom: 3px"> Etablissement: {{$data->etab}} </h5>
                                <h5 style="margin-bottom: 3px"> Filiere: {{$data->filier}} </h5>
                                <h6 style="margin-bottom: 3px"> CNI: {{$data->CNI}} </h6>
                                <h6 style="margin-bottom: 3px"> CNE: {{$data->CNE}} </h6>
                            </div>
                        </div>
                        <span></span>
                    </section>
                @endforeach
        </article>
</body>
</html>