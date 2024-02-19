<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="hu" xml:lang="hu">

<head>
    <title>Laraverseny - {{ $title }}</title>
    <meta charset="utf8" />
    <link rel="stylesheet" href="{{ asset('/css/colours.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/links.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <x-top-nav />
    <main class="row">
        <x-side-nav />
        <section id="page" class="centered column">
            {{ $slot }}
        </section>
    </main>
    <x-feedback />

    <script type="text/javascript">
        $(document).ready(function() {

            $("a").click(function(event) {
                    event.preventDefault();
                    // event.stopPropagation();
                    // event.stopImmediatePropagation();

                    // alert(this.href);

                    jQuery.ajax({
                        url: this.href,
                        type: 'GET',
                        success: function(result) {
                            $("#page").html(result);
                        }
                    });

                    // fetch('/bye')
                    //     .then(response => {
                    //         if (response.ok) {
                    //             return response.text();
                    //         }
                    //         throw new Error('Network response was not ok.');
                    //     })
                    //     .then(html => {
                    //         $('#page').innerHTML = html;
                    //     })
                    //     .catch(error => {
                    //         console.error('There has been a problem with your fetch operation:',
                    //             error);
                    //     });



                    // window.location.href = '/welcome';

            });

            // $("#stop").click(function(event) {
            //     event.stopPropagation();
            // });
        });
    </script>
</body>

</html>
