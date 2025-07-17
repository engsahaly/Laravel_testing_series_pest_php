<?php

expect()->extend('toBeMahmoud', function () {
    return $this->toBe('Mahmoud')
        ->toBeString()
        ->not->toBeInt();
});