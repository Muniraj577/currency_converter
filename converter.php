<?php
    $currency_codes = ['Afghani Afghani' => 0.011, 'Albenian Lek' => 0.0091, 'INR' => 0.013, 'USD' => 1, 'NPR' => '0.0083'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <link rel="stylesheet" href="css/bootstrap-4.4.1.min.css">
    <style>
        .form-control:focus{
            box-shadow: none;
            outline: none;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card mt-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="first_input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control" id="first_select">
                                <option value="">USD</option>
                                <option value="">NPR</option>
                                <option value="">INR</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="second_input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control" id="second_select">
                                <option value="">USD</option>
                                <option value="">NPR</option>
                                <option value="">INR</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </section>
</body>
<script src="js/jquery-3.5.1.min.js"></script>
</html>
