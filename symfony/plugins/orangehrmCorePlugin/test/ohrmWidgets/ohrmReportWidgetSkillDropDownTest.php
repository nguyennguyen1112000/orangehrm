<?php
/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 */

/**
 * @group ohrmWidget
 */
class ohrmReportWidgetSkillDropDownTest extends PHPUnit\Framework\TestCase
{
    /**
     * @var ohrmReportWidgetSkillDropDown
     */
    private $ohrmReportWidgetSkillDropDown = null;

    protected function setUp(): void
    {
        $this->ohrmReportWidgetSkillDropDown = $this->getMockBuilder(ohrmReportWidgetSkillDropDown::class)
            ->setMethods(['configure'])
            ->getMock();
    }

    public function testGenerateWhereClausePart()
    {
        $returnValue = $this->ohrmReportWidgetSkillDropDown->generateWhereClausePart('hs_hr_emp_skill.skill_id', '1');
        $this->assertEquals("hs_hr_emp_skill.skill_id = '1'", $returnValue);
    }

    public function testGenerateWhereClausePartWithSql()
    {
        $returnValue = $this->ohrmReportWidgetSkillDropDown->generateWhereClausePart(
            'hs_hr_emp_skill.skill_id',
            '1;DELETE FROM `hs_hr_employee` WHERE `hs_hr_employee`.`emp_number` = "1";'
        );
        $this->assertEquals(
            'hs_hr_emp_skill.skill_id = \'1;DELETE FROM `hs_hr_employee` WHERE `hs_hr_employee`.`emp_number` = \"1\";\'',
            $returnValue
        );
    }
}
