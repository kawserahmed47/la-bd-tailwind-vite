<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon/favicon.ico')}}">
    <title>Organization</title>
</head>
<body>
    <table style="margin-left: auto; margin-right: auto;">
        <thead>
            <tr style="text-align: center">
                {{-- <th style="text-align: right; margin-right:10px">
                    <img src="https://la.kinabeca.com/clientAdmin/image/governmentOfBangladesh1.svg">
                </th> --}}
                <th colspan="3" style="text-align: center">ভূমি অধিগ্রহণ শাখা  <br> জেলা প্রশাসকের কার্যালয়, ঢাকা</th>
                {{-- <th style="text-align: left; margin-left:10px">
                    <img src="{{asset('images/logo/logo-icon.png')}}" >
                </th> --}}
            </tr>
            <tr>
                <th colspan="3" style="text-align:center; border:1px solid black; padding:2px" >প্রত্যাশী সংস্থার তথ্য বিবরণ</th>
            </tr>
        </thead>
       <tbody>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td>{{$organization->name}}</td>
        </tr>
        <tr>
            <td>Name in Bengali</td>
            <td>:</td>
            <td>{{$organization->bn_name}}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>:</td>
            <td>{{$organization->description}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>{{$organization->status ? 'Active' : 'Inactive'}}</td>
        </tr>
       </tbody>
    </table>
</body>
</html>