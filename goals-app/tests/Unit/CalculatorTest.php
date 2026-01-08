<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Helpers\Calculator;

class CalculatorTest extends TestCase
{
    /**
     * A basic unit test example.
     */
public function test_it_can_add_two_numbers(): void
    {
        // 1. Arrange (Préparer les données)
        $calculator = new Calculator();
        $a = 10;
        $b = 5;

        // 2. Act (Exécuter l'action)
        $result = $calculator->add($a, $b);

        // 3. Assert (Vérifier le résultat attendu)
        // On vérifie que 10 + 5 est bien égal à 15
        $this->assertEquals(15, $result);
    }
}
