<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login | ABC </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{ URL::to('fonts/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/form_styles.css') }}">

    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</head>

<body>
    <div class="wrapper">
        <div class="inner">
            <form id="form">


                <h3>Add Category</h3><br />

                <div class="form-holder">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="pcat" name="pcat" placeholder="">
                    </div>
                </div>

                <p id="form_result"></p>
                <button class="button_submit" type="submit">
                    <span>Add Item</span>
                </button>
                <br />
            </form>
        </div>
    </div>

    <script>
        const form = document.getElementById('form');

        form.addEventListener('submit', async event => {
            event.preventDefault();

            const data = {
                pcat: document.getElementById('pcat').value,
            };

            try {
                const res = await fetch('http://localhost/Assessement%20-laravel%203/public/api/add-category', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data),
                });

                if (res.ok) {
                    const resData = await res.json();
                    console.log(resData);
                    var textElement = document.getElementById("form_result");
                    textElement.textContent = "Data has been saved successfully";
                    textElement.style.color = "#28d479";
                    var baseUrl = "{{ URL::base() }}";

                    // Construct the login URL
                    var redirect = baseUrl + '/dashboard';

                    // Redirect to the login page
                    window.location.href = redirect;
                } else {
                    const errorData = await res.json();
                    console.log('Error:', errorData);
                    var textElement = document.getElementById("form_result");
                    textElement.textContent = "An error occurred while processing the request. Make sure category name is filled and is unique";
                    textElement.style.color = "#f74f4f";
                    // alert('Error: ' + "An error occurred while processing the request. Make sure every fields are filled correctly");
                }
            } catch (err) {
                console.error(err);
                var textElement = document.getElementById("form_result");
                textElement.textContent = "An error occurred while processing the request. Make sure category name is filled and is unique";
                textElement.style.color = "#f74f4f";
                // alert('An error occurred: ' + err.message);
            }
        });
    </script>
</body>

</html>