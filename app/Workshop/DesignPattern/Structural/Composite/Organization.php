<?php

namespace App\Workshop\DesignPattern\Structural\Composite;

class Organization
{
    protected array $employees;

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getNetSalaries(): float
    {
        $netSalary = 0;

        foreach ($this->employees as $employee) {
            $netSalary += $employee->getSalary();
        }

        return $netSalary;
    }
}
