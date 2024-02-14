<!DOCTYPE html>
<html>

<head>
    <title>Elite Leaders Institute</title>
</head>

<body style="margin: 40px">
    <div style="justify-content: space-between;display: flex">
        <h1 style="color: #8b0303;">{{ $data['subject'] }}</h1>
        <img width="100" title="logo" src="{{ env('APP_URL') }}/assets/{{ $data['logo'] }}" alt="logo">
    </div>
    @if ($data['name'])
        <p><span style="color: #8b0303;font-size: 20px">Name</span> : {{ $data['name'] }}</p>
    @endif
    @if ($data['phone'])
        <p><span style="color: #8b0303;font-size: 20px">Phone</span> : {{ $data['phone'] }}</p>
    @endif
    @if ($data['email'])
        <p><span style="color: #8b0303;font-size: 20px">Email</span> : {{ $data['email'] }}</p>
    @endif
    @if ($data['age'])
        <p><span style="color: #8b0303;font-size: 20px">Age</span> : {{ $data['age'] }}</p>
    @endif
</body>

</html>
