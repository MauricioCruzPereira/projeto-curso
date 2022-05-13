<?php

function getDateAsDateTime($date){
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeekend($date){
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6;
}

function isBefore($date1,$date2){
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);
    return $inputDate1 <= $inputDate2;
}

function getNextDay($date){
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('+1 day');
    return $inputDate;
}

function getFirstDayOfMonth($date){
    $time = getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date('Y-m-1',$time));
}

function getLastDayOfMonth($date){
    $time = getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date('Y-m-t',$time));
}

function getSecondsFromDateInterval($interval){
    $d1 = new DateTimeImmutable();
    $d2 = $d1->add($interval);
    return $d2->getTimestamp() - $d1->getTimestamp();
}

function isPastWorkday($date){
    return !isWeekend($date) && isBefore($date, new DateTime());
}

function getTimeStringFroMSeconds($seconds){
    $h = intdiv ($seconds, 3600);
    $m = intdiv ($seconds % 3600, 60);
    $s = $seconds - ($h * 3600) - ($m * 60);

    return sprintf('%02d:%02d:%02d',$h,$m,$s);
}

function formatDateWithlocale($date,$pattern){
    $time = getDateAsDateTime($date)->getTimestamp();
    return strftime($pattern,$time);
}