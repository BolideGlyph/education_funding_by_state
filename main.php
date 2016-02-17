<?php
/**
 * Created by IntelliJ IDEA.
 * User: Sai
 * Date: 2/16/2016
 * Time: 8:26 PM
 */

$funding = [];

define('GROSS_STATE_PRODUCT', 4);
define('STATE_AND_LOCAL_SPENDING', 3);
define('AVERAGE_STATE_RATIO', 19.61);


$file = fopen('data/usgs_state_2016.csv', 'r');
if (!$file){
    echo '<h1> Cannot find data/usgs_state_2016.csv </h1>';
    exit;
}

do{

    $line = fgetcsv($file);
    if(!$line){
        break;
    }
    $funding[] = $line;
} while ($line);

fclose($file);

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Education Funding by State</title>

    <link rel="stylesheet" type="text/css" href="style/styles.css" />

    <style>
        td, th {
            border: 2px solid #4d8965;
            width: 100%;
            cellspacing: 1px;
            text-align: center;
            color = "green"
            font = #1e3644;
        }

        body {
            background-color: burlywood;
        }


    </style>

</head>
<body>


<h1>Education Funding by State</h1>

<p>Source of ths data can be found <a href="http://www.usgovernmentspending.com/compare_state_spending">here</a>.</p>
<p>Final columns to determine the percentage of a state's Gross product spent on education and whether that state is higher or lower than national-average was added by Sai Del Cielo.  Each state's political affiliation is based on it's electoral vote in the 2012 eleciton.</p>

<p>Based on this data, it can be hypothsized that one or more of the following may be the case: <br>
    <ul>
        <li>States that vote Democrat tend to invest more in education.</li>
        <li>States that invest in education tend to vote more Democrat.</li>
        <li>States with more education tend to vote Democrat.</li>
        <li>Republican leaders oppose funding for education.</li>
    </ul>
</p>


<b>All figures in billions except Population, which is in millions.</b>

    <table width="750">
        <tr>
            <th>State</th>
            <th>State Spending</th>
            <th>Local Spending</th>
            <th>State and Local</th>
            <th>Gross State Product</th>
            <th>Real State Growth</th>
            <th>Population (million)</th>
            <th>Spending ratio (GSP divided by State & Local</th>
            <th>State higher or lower than average</th>
        </tr>

        <?php

        $democratic_higher = 0;
        $democratic_lower = 0;
        $republican_higher = 0;
        $republican_lower = 0;


        foreach($funding as $row) {
            $spending_ratio = number_format((float)($row[GROSS_STATE_PRODUCT] / $row[STATE_AND_LOCAL_SPENDING]), 2, '.', '');
            $high_or_low = '';
            $higher_tally = false;


            if ($spending_ratio > AVERAGE_STATE_RATIO){
                $high_or_low = "<td bgcolor='#7fffd4'> higher </td>";
                $higher_tally = true;
            }
            if ($spending_ratio < AVERAGE_STATE_RATIO){
                $high_or_low = "<td bgcolor='#ff4500'> lower </td>";
            }


            switch($row[0]) {
                case "Arizona";
                case "Idaho":
                case "Wyoming";
                case "Utah":
                case "North Dakota":
                case "South Dakota":
                case "Nebraska":
                case "Kansas":
                case "Texas":
                case "Missouri":
                case "Arkansas":
                case "Oklahoma":
                case "Indiana":
                case "Kentucky":
                case "Tennessee":
                case "Mississippi":
                case "Alabama":
                case "Georgia":
                case "Alaska":
                case "North Carolina":
                case "South Carolina":
                case "Louisiana":
                case "West Virginia":
                case "Montana":
                    echo('<tr bgcolor="red">');
                    echo('<td>');
                    echo(implode('</td><td>', $row));
                    echo('</td>');
                    echo '<td>' . $spending_ratio  . '</td>';
                    echo $high_or_low;
                    echo('</tr>');
                    if ($higher_tally){
                        $republican_higher += 1;
                    }
                    if (!$higher_tally){
                        $republican_lower += 1;
                    }
                    break;
                case "Oregon":
                case "California":
                case "Nevada":
                case "Colorado":
                case "Washington":
                case "New Mexico":
                case "Minnesota":
                case "Iowa":
                case "Wisconsin":
                case "Illinois":
                case "Ohio":
                case "Michigan":
                case "Virginia":
                case "Pennsylvania":
                case "New York":
                case "Maine":
                case "New Hampshire":
                case "New Jersey":
                case "Florida":
                case "Vermont":
                case "Hawaii":
                case "Rhode Island":
                case "Connecticut":
                case "Delaware":
                case "District of Columbia":
                case "Maryland":
                case "Massachusetts":

                    echo('<tr bgcolor="#00bfff">');
                    echo('<td>');
                    echo(implode('</td><td>', $row));
                    echo('</td>');
                    echo '<td>' . $spending_ratio  . '</td>';
                    echo $high_or_low;
                    echo('</tr>');

                if ($higher_tally){
                    $democratic_higher += 1;
                }
                if (!$higher_tally){
                    $democratic_lower += 1;
                }
                break;

                default:
                    echo('<tr>');
                    echo('<td>');
                    echo(implode('</td><td>', $row));
                    echo('</td>');
                    echo '<td>' . $spending_ratio  . '</td>';

                    echo('</tr>');

                break;
            }
        }

        echo '<b> <p> Republican states with a higher than national-average education spending ratio: ' . $republican_higher . '<br>';
        echo 'Republican states with a lower than national-average education spending ratio: ' . $republican_lower . '<br>';
        echo 'Democrat states with a higher than national-average education spending ratio: ' . $democratic_higher . '<br>';
        echo 'Democrat states with a lower than national-average education spending ratio: ' . $democratic_lower . '</p> </b>';
        ?>
    </table>

</body>