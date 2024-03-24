<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    @include('components.owner.navbar')
    <div class="min-h-screen flex flex-col pt-8 bg-gray-100">
        <div class="mx-6">
            <h1 class="font-bold">Home page</h1>
            <p>add something here like user deets</p>
        </div>
    </div>

    
</body>
</html>