<?php

// Prepare the employees
use App\Workshop\DesignPattern\Structural\Composite\Designer;
use App\Workshop\DesignPattern\Structural\Composite\Developer;
use App\Workshop\DesignPattern\Structural\Composite\Organization;

$john = new Developer('John Doe', 12000);
$jane = new Designer('Jane Doe', 15000);

// Add them to organization
$organization = new Organization();
$organization->addEmployee($john);
$organization->addEmployee($jane);

echo "Net salaries: " . $organization->getNetSalaries(); // Net Salaries: 27000
