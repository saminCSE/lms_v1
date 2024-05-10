<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
 use Illuminate\Support\Facades\DB;

class UniqueDateForExams implements Rule
{
   /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $examName;

    public function __construct($examName)
    {
        $this->examName = $examName;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $count = DB::table('exam_management')
            ->where('date', $value)
            ->where('exam_name', $this->examName)
            ->count();

        return $count === 0;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Exam with the same date and exam Type already exists.';
    }
}
