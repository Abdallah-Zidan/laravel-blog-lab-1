<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>ITI Blog</title>
        <link
            href="/bootstrap/css/bootstrap.min.css"
            rel="stylesheet"
            id="bootstrap-css"
        />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 mb-4">
            <a class="navbar-brand" href="#">ITI Blog</a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"
                            >All Posts <span class="sr-only">(current)</span></a
                        >
                    </li>
                </ul>
            </div>
        </nav>

        @yield('content')

        <script src="/bootstrap/js/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
