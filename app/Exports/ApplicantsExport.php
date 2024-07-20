<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Database\Eloquent\Builder;

class ApplicantsExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected Builder $query;

    /**
     * ApplicantsExport constructor.
     *
     * @param Builder $query
     */
    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->query;
    }

    /**
     * @param mixed $applicant
     * @return array
     */
    public function map($applicant): array
    {
        return [
            $applicant->id,
            $applicant->name,
            $applicant->email,
            $applicant->phone,
            $applicant->course,
            $applicant->msg,
            $applicant->level,
            $applicant->rate,
            $applicant->created_at,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Phone',
            'Course',
            'Message',
            'Level',
            'Rate',
            'Date',
        ];
    }
}
