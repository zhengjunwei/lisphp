<?php
require_once 'Lisphp/Form.php';
require_once 'Lisphp/Scope.php';

final class Lisphp_Symbol implements Lisphp_Form {
    protected static $map = array();
    public $symbol;

    static function get($symbol) {
        if (isset(self::$map[$symbol])) return self::$map[$symbol];
        return self::$map[$symbol] = new self($symbol);
    }

    protected function __construct($symbol) {
        if (!is_string($symbol)) {
            throw new UnexpectedValueException('expected string');
        }
        $this->symbol = $symbol;
    }

    function evaluate(Lisphp_Scope $scope) {
        return $scope[$this];
    }

    function __toString() {
        return $this->symbol;
    }
}

