<?php
// $currency_codes = ['Afghani Afghani' => 0.011, 'Albenian Lek' => 0.0091, 'INR' => 0.013, 'USD' => 1, 'NPR' => '0.0083'];

$currencies = [
    [
        'currency_code' => 'Afghani Afghani',
        'rate' => 0.011,
    ],
    [
        'currency_code' => 'Albenian Lek',
        'rate' => 0.0091,
    ],
    [
        'currency_code' => 'INR',
        'rate' => 0.013,
    ],
    [
        'currency_code' => 'NPR',
        'rate' => 0.0083,
    ],
    [
        'currency_code' => 'USD',
        'rate' => 1,
    ],

];

$npr_rate = filterCurrencyByCurrencyCode($currencies, 'NPR');
// print_r($npr_rate[0]);
// var_dump($npr_rate);

function filterCurrencyByCurrencyCode($arr, $code){
    $currency_code = array_filter($arr, function($value) use($code){
        return $value['currency_code'] == $code;
    });
    return array_column($currency_code, 'rate');
}
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
                            <input type="text" class="form-control" value="1" id="first_input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control" id="first_select">
                            <?php foreach ($currencies as $currency) {?>
			                <option value="<?php echo $currency['rate']; ?>" data-name="<?php echo $currency['currency_code']; ?>" <?php echo $currency['currency_code'] == 'NPR' ? 'selected' : '' ?>><?php echo $currency['currency_code']; ?></option>
		                    <?php }?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php print_r($npr_rate[0]); ?>" id="second_input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control" id="second_select">
                            <?php foreach ($currencies as $currency) {?>
			                <option value="<?php echo $currency['rate']; ?>" data-name="<?php echo $currency['currency_code']; ?>" <?php echo $currency['currency_code'] == 'USD' ? 'selected' : '' ?>><?php echo $currency['currency_code']; ?></option>
		                    <?php }?>
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

<script>
    function ConvertCurrency($first_rate, $second_rate, $my_value){
        if($my_value != ''){
            var convert_amount_to_base = parseFloat($first_rate * $my_value);
            var resultAmount = parseFloat(convert_amount_to_base / $second_rate);
            return resultAmount.toFixed(3);
        }

    }
    $("#first_input").on('keyup', function(){
        var convertedamount = '';
        var my_value = $(this).val();
        var my_rate = $("#first_select").val();
        var second_select_rate = $("#second_select").val();
        if(my_value == ''){
            $("#second_input").val('');
        } else {
            convertedamount = ConvertCurrency(my_rate, second_select_rate, my_value);
        }
        $("#second_input").val(convertedamount);

    });

    $("#second_input").on('keyup', function() {
        var convertedamount = '';
        var my_value = $(this).val();
        var my_rate = $("#second_select").val();
        var second_select_rate = $("#first_select").val();
        if(my_value == ''){
            $("#first_input").val('');
        } else {
            convertedamount = ConvertCurrency(my_rate, second_select_rate, my_value);
        }
        $("#first_input").val(convertedamount);
    });


    $("#first_select").on('change', function(){
        var convertedamount = '';
        var $my_rate = $(this).val(),
            $my_value = $("#first_input").val(),
            $second_rate = $("#second_select").val();
        if($my_value == ''){
            $("#second_input").val('');
        } else {
            convertedamount = ConvertCurrency($my_rate, $second_rate, $my_value);
        }
        
        $("#second_input").val(convertedamount);
    });

    $("#second_select").on('change', function(){
        var $my_rate = $(this).val(),
            $my_value = $("#second_input").val(),
            $second_rate = $("#first_select").val();
        if($my_value == ''){
            $("#first_input").val('');
        } else {
            convertedamount = ConvertCurrency($my_rate, $second_rate, $my_value);
        }
        $("#first_input").val(convertedamount);
    });


</script>
</html>
