<?php

namespace BillingBundle\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

abstract class EnumType extends Type
{
    protected $name;
    protected $values = array();

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        $values = array_map(function ($val) {
            return "'" . $val . "'";
        }, $this->values);

        return "ENUM(" . implode(", ", $values) . ") COMMENT '(DC2Type:" . $this->name . ")'";
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!empty($value) && !in_array($value, $this->values)) {
            throw new \InvalidArgumentException("Invalid '" . $this->name . "' value.");
        }
        return $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValues()
    {
        return $this->values;
    }
}
