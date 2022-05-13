<?php
session_start();
requireValidSession();

$currentDate = new DateTime();

$user = $_SESSION['user'];
$selectedUserid = $user->id;
$users = null;
if($user->is_admin){
    $users = User::get();
    $selectedUserid = $_POST['user'] ? $_POST['user'] : $user->id;
}

$selectedPeriod = $_POST['period'] ? $_POST['period'] : $currentDate->format('Y-m');
$periods = [];
for($yearDiff = 0; $yearDiff <= 2; $yearDiff ++){
    $year = date('Y') - $yearDiff;
    for($month = 12; $month >= 1; $month--){
        $date = new DateTime("{$year}-{$month}-1");
        $periods[$date->format('Y-m')] = strftime("%B de %Y", $date->getTimestamp());
    }
}

$registries = WorkingHours::getMonthlyReport($selectedUserid, $selectedPeriod);

$report = [];
$workDay = 0;
$sumOfWOrkedTime = 0;
$lastDay = getLastDayOfMonth($selectedPeriod)->format('d');

for($day = 1; $day <= $lastDay; $day++){
    $date = $selectedPeriod . '-' .  sprintf('%02d',$day);
    $registry = $registries[$date];
    
    if(isPastWorkday($date)) $workDay ++;

    if($registry){
        $sumOfWOrkedTime += $registry->worked_time;
        array_push($report,$registry);
    }else{
        array_push($report, new WorkingHours([
            'work_date' =>$date,
            'worked_time' => 0
        ]));
    }
}

$expectedTime = $workDay * DAILY_TIME;
$balance = getTimeStringFroMSeconds(abs($sumOfWOrkedTime - $expectedTime));
$sign = ($sumOfWOrkedTime >= $expectedTime) ? "+" : "-";

loadTemplateView('monthly_report',[
    'report' => $report,
    'sumOfWOrkedTime' => getTimeStringFroMSeconds($sumOfWOrkedTime),
    'balance' => "{$sign}{$balance}",
    'periods' => $periods,
    'users' =>$users,
    'selectedPeriod' =>$selectedPeriod,
    'selectedUserid' => $selectedUserid,

]);