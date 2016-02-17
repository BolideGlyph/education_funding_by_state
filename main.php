<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rib
 * Date: 2/16/2016
 * Time: 8:26 PM
 */


//define('SCORE', 'score');
//
//$score = $_GET[SCORE];
//
//
//
//if (!isset($_GET[SCORE])) {
//    echo "<h1>You need to specify the score</h1>";
//    exit;
//
//}
//
//echo "the score is " . $score . '.<br>';
//
//for($i = 0; $i < 10; $i++){
//    $score++;
//    echo $score . '<br>';
//}
//
//echo "Hello World!";

$funding = [];

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


?>






<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Montana 1992</title>

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

<table width="750">


<!--    <B><DT>Datafile Name:</B>   Montanac Outlook Poll-->
<!--    <B><DT>Datafile Subjects:</B>   <dsubjects>-->
<!--        <A HREF="/cgi-bin/dasl.cgi?query=Economics&submit=Search&metaname=dsubjects&sort=swishrank">Economics</a>-->
<!--        ,-->
<!--        <A HREF="/cgi-bin/dasl.cgi?query=Finance&submit=Search&metaname=dsubjects&sort=swishrank">Finance</a>-->
<!--        ,-->
<!--        <A HREF="/cgi-bin/dasl.cgi?query=Consumer&submit=Search&metaname=dsubjects&sort=swishrank">Consumer</a>-->
<!---->
<!--    </dsubjects>-->
<!--    <B><DT>Story Names:</B>-->
<!--    <A HREF="../Stories/montana.html">Montana Outlook Poll</A>-->
<!---->
<!--    <B><DT>Reference:</B>   Bureau of Business and Economic Research, University of Montana, May 1992-->
<!--    <B><DT>Authorization:</B>   free use-->
<!--    <B><DT>Description:</B>   The Montana poll asked a random sample of Montana residents whether their-->
<!--    personal financial status was the worse, the same, or better than a year ago, and-->
<!--    whether they thought the state economic outlook was better over the next year.-->
<!--    This file contains these items and accompanying demographics about the-->
<!--    respondents. The file contains results for every other person included in the-->
<!--    poll.-->
<!---->
<!--    <B><DT>Number of cases:</B>-->


    <table width="500">
        <tr>
            <th>State</th>
            <th>State Spending</th>
            <th>Local Spending</th>
            <th>State and Local</th>
            <th>Gross State Product</th>
            <th>Real State Growth</th>
            <th>Population (million)</th>
        </tr>
        <?php


//        foreach($funding as $key => $subarray) {
//            //Age
//            switch ($funding[$key][0]) {
//                case "1":
//                    $funding[$key][0] = '0 - 35';
//                    break;
//                case "2":
//                    $funding[$key][0] = '35 - 54';
//                    break;
//                case "3":
//                    $funding[$key][0] = '55+';
//                    break;
//            }
//            //Sex
//            switch ($funding[$key][1]) {
//                case "0":
//                    $funding[$key][1] = 'male';
//                    break;
//                case "1":
//                    $funding[$key][1] = 'female';
//                    break;
//            }
//            // Income
//            switch ($funding[$key][2]) {
//                case "1":
//                    $funding[$key][2] = '0 - 20k';
//                    break;
//                case "2":
//                    $funding[$key][2] = '20 - 35k';
//                    break;
//                case "3":
//                    $funding[$key][2] = '35k+';
//                    break;
//            }
//            //Politacl Party
//            switch ($funding[$key][3]) {
//                case "1":
//                    $funding[$key][3] = '<font color="blue"> Democrat </font>';
//                    break;
//                case "2":
//                    $funding[$key][3] = '<font color="#663399">Independent</font>';
//                    break;
//                case "3":
//                    $funding[$key][3] = '<font color="red">Republican</font>';
//                    break;
//            }
//            //Area
//            switch ($funding[$key][4]) {
//                case "1":
//                    $funding[$key][4] = 'Western';
//                    break;
//                case "2":
//                    $funding[$key][4] = 'NorthEastern';
//                    break;
//                case "3":
//                    $funding[$key][4] = 'Southern';
//                    break;
//            }
//            //Financial Status
//            switch ($funding[$key][5]) {
//                case "1":
//                    $funding[$key][5] = 'Worse';
//                    break;
//                case "2":
//                    $funding[$key][5] = 'Same';
//                    break;
//                case "3":
//                    $funding[$key][5] = 'Better';
//                    break;
//            }
//            //Economic Outlook
//            switch ($funding[$key][6]) {
//                case "0":
//                    $funding[$key][6] = 'Better';
//                    break;
//                case "1":
//                    $funding[$key][6] = 'Not Better';
//                    break;
//            }
//            unset($key);
//            unset($subarray);
//        }

        foreach($funding as $row) {
            echo('<tr>');
            echo('<td>');
            echo(implode('</td><td>', $row));
            echo('</td>');
//            echo '<td>' . $row[$line] . '</td>';
            echo('</tr>');
        } ?>
    </table>


</table>

</body>