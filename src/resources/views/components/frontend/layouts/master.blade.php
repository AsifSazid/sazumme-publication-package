<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>
<head>
    <x-sp-frontend-meta />
    <x-sp-frontend-title/>
    <x-sp-frontend-favicon />
    <x-sp-frontend-style />
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


    <x-sp-frontend-js />
</body>
</html>
