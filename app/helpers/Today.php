<?php

use Carbon\Carbon;

function ent_to_nepali_num_convert1($number)
{
    $eng_number = array(
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    );
    $nep_number = array(
        '०', '१', '२', '३', '४', '५', '६', '७', '८', '९'
    );
    return str_replace($eng_number, $nep_number, $number);
}

function todayDate()
{

    $carbonInstance = Carbon::now();

    $year = $carbonInstance->year; // Get the year as an integer
    $month = $carbonInstance->month; // Get the month as an integer
    $day = $carbonInstance->day;
    $date = ad_to_bs($year, $month, $day);

    $month = $date['month'];
    $week = $date['weekday'];
    $year = $date['year'];
    $day = $date['day'];



    if ($month == 1) {
        $data['month'] = "बैशाख";
    } else if ($month == 2) {
        $data['month'] = "जेठ";
    } else if ($month == 3) {
        $data['month'] = "अषाढ";
    } else if ($month == 4) {
        $data['month'] = "श्रावण";
    } else if ($month == 5) {
        $data['month'] = "भाद्र";
    } else if ($month == 6) {
        $data['month'] = "आश्विन";
    } else if ($month == 7) {
        $data['month'] = "कार्तिक";
    } else if ($month == 8) {
        $data['month'] = "मङ्सिर";
    } else if ($month == 9) {
        $data['month'] = "पौष";
    } else if ($month == 10) {
        $data['month'] = "माघ";
    } else if ($month == 11) {
        $data['month'] = "फाल्गुन";
    } else if ($month == 12) {
        $data['month'] = "चैत्र";
    }



    if ($week == 1) {
        $data['week'] = "आइतवार";
    } else if ($week == 2) {
        $data['week'] = "सोमवार";
    } else if ($week == 3) {
        $data['week'] = "मङ्गलवार";
    } else if ($week == 4) {
        $data['week'] = "बुधवार";
    } else if ($week == 5) {
        $data['week'] = "बिहिवार";
    } else if ($week == 6) {
        $data['week'] = "शुक्रवार";
    } else if ($week == 7) {
        $data['week'] = "शनिवार";
    }

    $data['year'] = ent_to_nepali_num_convert1($date['year']);
    $data['day'] = ent_to_nepali_num_convert1($date['day']);
    // return
    return $data;
}
