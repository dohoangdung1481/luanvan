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
        DB::statement("CREATE VIEW `student_semester_summary` AS select `s`.`id` AS `student_id`,`ay`.`year` AS `year`,`ay`.`semester` AS `semester`,sum(`c`.`credit`) AS `total_credits`,round((sum((`g`.`total_score` * `c`.`credit`)) / sum(`c`.`credit`)),2) AS `gpa` from (((((`congdaotao`.`students` `s` join `congdaotao`.`enrollments` `e` on((`s`.`id` = `e`.`student_id`))) join `congdaotao`.`grades` `g` on((`g`.`enrollment_id` = `e`.`id`))) join `congdaotao`.`class_sections` `cs` on((`cs`.`id` = `e`.`class_section_id`))) join `congdaotao`.`courses` `c` on((`c`.`id` = `cs`.`course_id`))) join `congdaotao`.`academic_years` `ay` on((`cs`.`academic_year_id` = `ay`.`id`))) group by `s`.`id`,`ay`.`year`,`ay`.`semester`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `student_semester_summary`");
    }
};
