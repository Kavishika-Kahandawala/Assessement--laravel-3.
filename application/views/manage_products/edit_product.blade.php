<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit product | ABC </title>
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
            <!-- <form action="{{ URL::to('api/add-product') }}" method="post"> -->
            <form id="form">


                <h3>Edit product</h3><br />

                <div class="form-holder">
                    <div class="mb-3">
                        <label for="pname" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="pname" name="pname" placeholder="">
                    </div>
                </div>
                <div class="form-holder">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category</label>

                        <!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Select
                            </button>&nbsp&nbsp -->
                        <br />
                        <div class="row">
                            <div class="col-10">
                                <select class="form-select" name="pcat" id="pcat" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                </select>

                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-outline-success" onclick="window.location.href = '../add-category';">+</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-holder">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="">
                    </div>
                </div>
                <div class="form-holder">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="">
                    </div>
                </div>

                <!-- <div class="form-holder">
                    <div class="mb-3">
                    </div>
                </div> -->

                <p id="form_result"></p>
                <button class="button_submit" type="submit">
                    <span>Edit Item</span>
                </button>
                <br />
            </form>
        </div>
    </div>

    <script>
        const form = document.getElementById('form');
        const url = window.location.pathname;
        const parts = url.split('/');
        const pid = parts[parts.length - 1];

        function fetchAndPopulateData() {
            fetch("../api/view-product/" + pid)
                .then((response) => response.json())
                .then((product) => {
                    // Populate the form fields with the product data
                    form.elements["pname"].value = product.attributes.pname;
                    form.elements["quantity"].value = product.attributes.quantity;
                    form.elements["price"].value = product.attributes.price;
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        }

        fetchAndPopulateData();

        async function fetchAndPopulateCategories() {
            try {
                const response = await fetch('../api/get-category'); // Replace with your actual API endpoint
                if (response.ok) {
                    const categoryData = await response.json();
                    pcat.innerHTML = ''; // Clear existing options

                    // Add each category as an option to the dropdown
                    categoryData.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.attributes.cat_name; // Use the appropriate value for the category
                        option.textContent = category.attributes.cat_name; // Use the appropriate property for the category name
                        pcat.appendChild(option);
                    });
                }
            } catch (error) {
                console.error('Error fetching categories:', error);
            }
        }

        // Call the function to populate categories when the page loads
        fetchAndPopulateCategories();



        form.addEventListener('submit', async event => {
            event.preventDefault();

            const data = {
                pname: document.getElementById('pname').value,
                pcat: document.getElementById('pcat').value,
                quantity: document.getElementById('quantity').value,
                price: document.getElementById('price').value
            };

            const form = document.getElementById('form');
            const url = window.location.pathname;
            const parts = url.split('/');
            const pid = parts[parts.length - 1];

            try {
                const res = await fetch('../api/edit-product/' + pid, {
                    method: 'PUT',
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
                    textElement.textContent = "An error occurred while processing the request. Make sure every fields are filled correctly";
                    textElement.style.color = "#f74f4f";
                    // alert('Error: ' + "An error occurred while processing the request. Make sure every fields are filled correctly");
                }
            } catch (err) {
                console.error(err);
                var textElement = document.getElementById("form_result");
                textElement.textContent = "An error occurred while processing the request. Make sure every fields are filled correctly";
                textElement.style.color = "#f74f4f";
                // alert('An error occurred: ' + err.message);
            }
        });
    </script>
</body>

</html>