<?php
function TimeDate(string $current): string
{
    $timeAgo = strtotime($current);
    $currentTime = time();
    $timeDifference = $currentTime - $timeAgo;
    $seconds = $timeDifference;
    $minutes = round($seconds / 60);
    $hours = round($seconds / 3600);
    $days = round($seconds / 86400);
    $weeks = round($seconds / 604800);
    $months = round($seconds / 2629440);
    $years = round($seconds / 31553280);

    if ($seconds <= 60) {
        return "Vừa xong";
    } else if ($minutes <= 60) {
        return $minutes == 1 ? "1 phút trước" : "$minutes phút trước";
    } else if ($hours <= 24) {
        return $hours == 1 ? "1 giờ trước" : "$hours giờ trước";
    } else if ($days <= 7) {
        if ($days == 1) {
            return "Hôm qua";
        } else if ($days == 2) {
            return "Hôm kia";
        } else {
            return "$days ngày trước";
        }
    } else if ($weeks <= 4.3) {
        return $weeks == 1 ? "1 tuần trước" : "$weeks tuần trước";
    } else if ($months <= 12) {
        return $months == 1 ? "1 tháng trước" : "$months tháng trước";
    } else {
        return $years == 1 ? "1 năm trước" : "$years năm trước";
    }
}
