<?php
function task1()
{
    $fileData = file_get_contents("src/data.xml");
    $xml = new SimpleXMLElement($fileData);

    $purchaseOrderNumber = $xml->attributes()->PurchaseOrderNumber;
    $orderDate = $xml->attributes()->OrderDate;

    echo "<div>Order number: " . $purchaseOrderNumber . "</div> <div>Order date: " . $orderDate . "</div>";
    foreach ($xml->Address as $address) {
        $addressType = $address->attributes()->Type;
        $name = $address->Name->__toString();
        $street = $address->Street->__toString();
        $city = $address->City->__toString();
        $state = $address->State->__toString();
        $zip = $address->Zip->__toString();
        $country = $address->Country->__toString();

        echo "<table style='margin-top: 30px;'> <thead> <tr> <th>" . $addressType . " address</th> </tr> </thead>" . "<tbody> <tr> <td>Name: </td> <td>" . $name . "</td> </tr> <tr> <td>Street: </td> <td>" . $street . "</td> </tr> <tr> <td>City: </td> <td>" . $city . "</td> </tr> <tr> <td>State: </td> <td>" . $state . "</td> </tr> <tr> <td>Zip code: </td> <td>" . $zip . "</td> </tr> <tr> <td>Country: </td> <td>" . $country . "</td> </tr> </tbody> </table>";
    }

    $deliveryNotes = $xml->DeliveryNotes->__toString();

    echo "<div style='border: 1px solid #000; padding: 15px; margin-top: 30px;'>Customer note: " . $deliveryNotes . "</div>";
    echo "<table style='margin: 30px 0 50px; border-collapse: collapse'> <tr> <td>Part number</td><td>Product name</td><td>Quantity</td><td>Price</td><td>Ship date</td><td>Comment</td>";

    foreach ($xml->Items->Item as $item) {
        $itemPartNumber = $item->attributes()->PartNumber;
        $productName = $item->ProductName->__toString();
        $quantity = $item->Quantity->__toString();
        $usPrice = $item->USPrice->__toString();
        $comment = $item->Comment->__toString();
        $shipDate = $item->ShipDate->__toString();

        echo "<tr> <td style='border: 1px solid #000;'>" . $itemPartNumber . "</td><td style='border: 1px solid #000;'>" . $productName . "</td><td style='border: 1px solid #000;'>" . $quantity . "</td><td style='border: 1px solid #000;'>" . $usPrice . "</td><td style='border: 1px solid #000;'>" . $shipDate . "</td><td style='border: 1px solid #000;'>" . $comment . "</td></tr>";
    }

    echo "</table>";
}

function task2($arr)
{
    $jsonFile = json_encode($arr);
    file_put_contents("src/output.json", $jsonFile);

    $outputFile = file_get_contents("src/output.json");
    $jsonToArray = json_decode($outputFile, true);

    $randomInt = rand(0, 10);
    echo $randomInt . "<br>";

    if ($randomInt >= 5) {
        $jsonToArray["name"] = "Changed Name";

        $outputJson = json_encode($jsonToArray);
        file_put_contents("src/output2.json", $outputJson);
    }
}

function task3()
{
    $outputJson = file_get_contents("src/output.json");
    $jsonToArray = json_decode($outputJson, true);

    $outputJson2 = file_get_contents("src/output2.json");
    $jsonToArray2 = json_decode($outputJson2, true);

    $result = array_diff($jsonToArray2, $jsonToArray);
    echo "Измененное значение: ";
    print_r($result);
    echo "<br>";

}

function task4()
{
    $arrayInt = [];
    do {
        array_push($arrayInt, rand(0, 100));
    } while (sizeof($arrayInt) < 50);

    $outputCsv = fopen("src/output.csv", "w");
    fputcsv($outputCsv, $arrayInt);

    echo print_r($arrayInt) . "<br>";
}

function task5()
{
    $fp = fopen("src/output.csv", "r");
    $arr = [];
    while ($str = fgetcsv($fp, 1000 * 1024, ",")) {
        $arr = $str;
    }
    $result = 0;
    foreach ($arr as $item) {
        if ($item % 2 === 0) {
            $result += $item;
        }
    }
    echo "Сумма четных чисел: " . $result . "<br>";
}

function task6()
{
    $data = file_get_contents("https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json");
    $dataArr = json_decode($data, true);

    echo "Page Id: " . $dataArr["query"]["pages"]["15580374"]["pageid"] . "<br>";
    echo "Title: " . $dataArr["query"]["pages"]["15580374"]["title"];
}

