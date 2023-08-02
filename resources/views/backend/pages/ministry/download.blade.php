<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon/favicon.ico')}}">
    <title>{{$ministry->name ?? 'Organization'}}</title>
</head>
<body>
    <table style="margin-left: auto; margin-right: auto;">
        <thead>
            <tr style="text-align: center; width:100%">
                <th style="text-align: right; margin-right:10px; width:40%">
                    <img style="height: 60px; width:60px" src="{{asset('images/logo/logo-govt.png')}}">
                </th>
                <th  style="text-align: center; width:60%">ভূমি অধিগ্রহণ শাখা  <br> জেলা প্রশাসকের কার্যালয়, ঢাকা</th>
                <th style="text-align: left; margin-left:10px; width:40%">
                    <img style="height: 60px; width:60px" src="{{asset('images/logo/logo-icon.png')}}" >
                </th>
            </tr>
            <tr>
                <th colspan="3" style="text-align:center; border:1px solid black; padding:2px" >মন্ত্রণালয়ের তথ্য বিবরণ</th>
            </tr>
        </thead>
       <tbody>
        <tr>
            <td>Name:</td>
            <td colspan="2">{{$ministry->name}}</td>
        </tr>
        <tr>
            <td>Name in Bengali:</td>
            <td colspan="2">{{$ministry->bn_name}}</td>
        </tr>
        <tr>
            <td>Description:</td>
            <td colspan="2">{{$ministry->description}}</td>
        </tr>
        <tr>
            <td>Status:</td>
            <td colspan="2">{{$ministry->status ? 'Active' : 'Inactive'}}</td>
        </tr>
       </tbody>
    </table>
</body>
</html>