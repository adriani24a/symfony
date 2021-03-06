<?php

namespace Symfony\Tests\Component\Form;

use Symfony\Component\Form\CountryField;
use Symfony\Component\Form\FormConfiguration;

class CountryFieldTest extends \PHPUnit_Framework_TestCase
{
    public function testCountriesAreSelectable()
    {
        FormConfiguration::setDefaultLocale('de_AT');

        $field = new CountryField('country');
        $choices = $field->getOtherChoices();

        $this->assertArrayHasKey('DE', $choices);
        $this->assertEquals('Deutschland', $choices['DE']);
        $this->assertArrayHasKey('GB', $choices);
        $this->assertEquals('Vereinigtes Königreich', $choices['GB']);
        $this->assertArrayHasKey('US', $choices);
        $this->assertEquals('Vereinigte Staaten', $choices['US']);
        $this->assertArrayHasKey('FR', $choices);
        $this->assertEquals('Frankreich', $choices['FR']);
        $this->assertArrayHasKey('MY', $choices);
        $this->assertEquals('Malaysia', $choices['MY']);
    }

    public function testUnknownCountryIsNotIncluded()
    {
        $field = new CountryField('country');
        $choices = $field->getOtherChoices();

        $this->assertArrayNotHasKey('ZZ', $choices);
    }
}