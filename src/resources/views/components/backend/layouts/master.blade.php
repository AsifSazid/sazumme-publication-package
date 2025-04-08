<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>
<head>
    <x-sp-backend-meta />
    <x-sp-backend-title/>
    <x-sp-backend-favicon />
    <x-sp-backend-style />
</head>

<body>


    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="content">
                {{ $slot }}
            </div>
        </div>
        <!-- / Main content -->
    </div>


    <x-sp-backend-js />
</body>
</html>
