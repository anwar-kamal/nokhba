<?php

namespace App\Livewire;

use App\Services\CustomerService;
use DateInterval;
use DatePeriod;
use DateTime;
use Livewire\Component;

class StudentTimeTableComponent extends Component
{
    public function render()
    {
        $current_courses = CustomerService::current_courses();

        $days = ['السبت', 'الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'];
        $colors = ["yellow", "green", "purple", "red", "yellow", "green", "purple", "red"];

        $semester = CustomerService::current_semester();

        $startDate = new DateTime($semester->from);
        $endDate = new DateTime($semester->to);
        $endDate->modify('last day of this month');
        $dateInterval = DateInterval::createFromDateString('1 month');
        $datePeriod   = new DatePeriod($startDate, $dateInterval, $endDate);
        $months = [];
        foreach ($datePeriod as $date) {
            $months[$date->format('m')] = $date->format('F');
        }

        $final_exams = CustomerService::final_exams();

        return view('livewire.student-time-table-component', ["current_courses" => $current_courses, "final_exams" => $final_exams, "days" => $days, "months" => $months, "colors" => $colors]);
    }
}
