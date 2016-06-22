<?php

namespace BillingBundle\DBAL\Types;

class EnumGenderType extends EnumType
{
    const
        GENDER_MALE = 'gender.male',
        GENDER_FEMALE = 'gender.female';

    protected $name = 'enum.gender';
    protected $values = array(
        self::GENDER_MALE,
        self::GENDER_FEMALE
    );
}
