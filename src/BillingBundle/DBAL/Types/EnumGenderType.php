<?php

namespace BillingBundle\DBAL\Types;

class EnumGenderType extends EnumType
{
    const
        GENDER_MALE = 'male',
        GENDER_FEMALE = 'female';

    protected $name = 'enum.gender';
    protected $values = array(
        self::GENDER_MALE,
        self::GENDER_FEMALE
    );
}
