<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $employee_id
 * @property \Illuminate\Support\Carbon $date
 * @property \Illuminate\Support\Carbon|null $check_in_time
 * @property \Illuminate\Support\Carbon|null $check_out_time
 * @property string|null $work_hour Jam kerja hasil perhitungan otomatis
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance byDepartment(?string $department)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance byWorkHour(?float $minHours, ?float $maxHours)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance inMonth(string $yearMonth)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance ofEmployee(int $employeeId)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance search(?string $term)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereCheckInTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereCheckOutTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereWorkHour($value)
 */
	class Attendance extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $manager_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Employee> $employees
 * @property-read int|null $employees_count
 * @property-read \App\Models\User|null $manager
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $employee_code
 * @property string $position
 * @property int $department_id
 * @property \Illuminate\Support\Carbon $join_date
 * @property \App\Enums\EmploymentStatus $employment_status
 * @property numeric $basic_salary Gaji pokok per bulan (untuk kalkulasi gaji berdasarkan attendance)
 * @property string|null $contact
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attendance> $attendances
 * @property-read int|null $attendances_count
 * @property-read \App\Models\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LeaveRequest> $leaveRequests
 * @property-read int|null $leave_requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PerformanceReview> $performanceReviews
 * @property-read int|null $performance_reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SalarySlip> $salarySlips
 * @property-read int|null $salary_slips_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee search(?string $term)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereBasicSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereEmployeeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereEmploymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereJoinDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUserId($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $employee_id
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property string|null $reason
 * @property \App\Enums\LeaveStatus $status
 * @property int|null $reviewed_by
 * @property string|null $reviewer_note
 * @property string|null $foto_cuti
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @property-read \App\Models\User|null $reviewer
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest approved()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest byDateRange(?string $startDate, ?string $endDate)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest byDepartment(?string $department)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest byDuration(?int $minDays, ?int $maxDays)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest byStatus(?string $status)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest forManagerTeam(int $managerUserId)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest inPeriod(?string $yearMonth)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest pending()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest rejected()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest search(?string $term)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereFotoCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereReviewedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereReviewerNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeaveRequest whereUpdatedAt($value)
 */
	class LeaveRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $message
 * @property bool $is_read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification ofUser(int $userId)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification unread()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereUserId($value)
 */
	class Notification extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $employee_id
 * @property int $reviewer_id
 * @property string $period Periode: 2025-10, Q4-2025, dll
 * @property int $total_star Rating 1-10 bintang
 * @property string $review_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @property-read \App\Models\User $reviewer
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview byDateRange(?string $dateFrom = null, ?string $dateTo = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview byDepartment(?string $department)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview byPeriodType(?string $periodType = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview byRatingRange(?int $minRating = null, ?int $maxRating = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview byReviewer(int $reviewerId)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview byYear(?string $year = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview inPeriod(string $period)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview ofEmployee(int $employeeId)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview search(?string $searchTerm)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview whereReviewDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview whereReviewerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview whereTotalStar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PerformanceReview whereUpdatedAt($value)
 */
	class PerformanceReview extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $employee_id
 * @property int $created_by
 * @property string $period_month Format: 2025-10
 * @property numeric $basic_salary
 * @property numeric $allowance
 * @property numeric $deduction
 * @property numeric $total_salary basic + allowance - deduction
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $creator
 * @property-read \App\Models\Employee $employee
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip filterBasicSalary(?float $salaryFrom, ?float $salaryTo)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip filterTotalSalary(?float $from, ?float $to)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip inPeriod(string $period)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip ofEmployee(int $employeeId)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip search(?string $term)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip whereAllowance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip whereBasicSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip whereDeduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip wherePeriodMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip whereTotalSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalarySlip whereUpdatedAt($value)
 */
	class SalarySlip extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property Role|string $role
 * @property bool $status_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SalarySlip> $createdSalarySlips
 * @property-read int|null $created_salary_slips_count
 * @property-read \App\Models\Employee|null $employee
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PerformanceReview> $givenPerformanceReviews
 * @property-read int|null $given_performance_reviews_count
 * @property-read \App\Models\Department|null $managedDepartment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Employee> $managedEmployees
 * @property-read int|null $managed_employees_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LeaveRequest> $reviewedLeaveRequests
 * @property-read int|null $reviewed_leave_requests_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User active()
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatusActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Tymon\JWTAuth\Contracts\JWTSubject {}
}

