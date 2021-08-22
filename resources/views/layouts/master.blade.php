<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')
    @include('includes.style')
</head>
<body>
   
    @include('includes.navbar')
    <div class="container pt-3">
        @yield('content')
    </div>
    @include('includes.script')
</body>
</html>
