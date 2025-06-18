<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW `student_schedule` AS select `s`.`id` AS `student_id`,`s`.`full_name` AS `full_name`,`cs`.`id` AS `class_section_id`,`c`.`name` AS `course_name`,`sch`.`weekday` AS `weekday`,`sch`.`start_period` AS `start_period`,`sch`.`end_period` AS `end_period`,`sch`.`room` AS `room`,`ay`.`year` AS `year`,`ay`.`semester` AS `semester` from ((((((`congdaotao`.`enrollments` `e` join `congdaotao`.`students` `s` on((`s`.`id` = `e`.`student_id`))) join `congdaotao`.`users` `u` on((`u`.`id` = `s`.`user_id`))) join `congdaotao`.`class_sections` `cs` on((`cs`.`id` = `e`.`class_section_id`))) join `congdaotao`.`courses` `c` on((`c`.`id` = `cs`.`course_id`))) join `congdaotao`.`schedules` `sch` on((`sch`.`class_section_id` = `cs`.`id`))) join `congdaotao`.`academic_years` `ay` on((`ay`.`id` = `cs`.`academic_year_id`)))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `student_schedule`");
    }
};
