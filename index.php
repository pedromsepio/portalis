<?php
    /* https://packagist.org/packages/hubspot/api-client */
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.hubapi.com/crm/v3/objects/deals?limit=10&archived=false&hapikey=2d1462a0-0239-4439-9502-d94d18093798",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $json = array();
    $json = json_decode($response, true);
    echo "<pre>";
    print_r($json);
    echo "</pre>";
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Sepio Systems</title>
</head>
<body>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Amount</th>
            <th scope="col">Close Date</th>
            <th scope="col">Create Date</th>
            <th scope="col">Deal Name</th>
            <th scope="col">Deal Stage</th>
            <th scope="col">hs_lastmodifieddate</th>
            <th scope="col">hs_object_id</th>
            <th scope="col">pipeline</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($response != '') {
            //echo $response;
            $i = 0;
            foreach ($json as $deals){
        ?>
            <tr>
                <td><?php echo $json['results'][$i++]['properties']['amount']; ?></td>
                <td><?php echo $json['results'][$i++]['properties']['closedate']; ?></td>
                <td><?php echo $json['results'][$i++]['properties']['createdate']; ?></td>
                <td><?php echo $json['results'][$i++]['properties']['dealname']; ?></td>
                <td><?php echo $json['results'][$i++]['properties']['dealstage']; ?></td>
                <td><?php echo $json['results'][$i++]['properties']['hs_lastmodifieddate']; ?></td>
                <td><?php echo $json['results'][$i++]['properties']['hs_object_id']; ?></td>
                <td><?php echo $json['results'][$i++]['properties']['pipeline']; ?></td>
            </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>