<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="UTF-8">
        <title>Social Places: Contact</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
        
    </head>
    <body>
        <header id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <a href="{{ route('contact-view') }}">Contact Us</a>

                    <div class="topnav" id="myTopnav">
                        <a class="navlink" href="{{ route('login') }}">Login</a>
                    </div>
                </div>
            </div>
        </header>
                
        <!-- Start Content Area -->
        @yield('content')
                
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script type="text/javascript">

        $('#SubmitForm').on('submit',function(e){
            e.preventDefault();
            $("#submitButton").prop('disabled', true);

            let name = $('#name').val();
            let email = $('#email').val();
            let gender = $('#gender').val();
            let content = $('#content').val();

            $('#nameErrorMsg').text('');
            $('#emailErrorMsg').text('');
            $('#genderErrorMsg').text('');
            $('#contentErrorMsg').text('');

            $.ajax({
              url: "store",
              type:"POST",
              data:{
                "_token": "{{ csrf_token() }}",
                name:name,
                email:email,
                gender_id:gender,
                content:content,
              },
              success:function(response){
                $('#successMsg').show();
                $("#submitButton").prop('disabled', false);
                console.log(response);
              },
              error: function(response) {
                $('#nameErrorMsg').text(response.responseJSON.errors.name);
                $('#emailErrorMsg').text(response.responseJSON.errors.email);
                $('#genderErrorMsg').text(response.responseJSON.errors.gender_id);
                $('#contentErrorMsg').text(response.responseJSON.errors.content);
                $("#submitButton").prop('disabled', false);
              },
              });
            });
          </script>
    </body>
</html>