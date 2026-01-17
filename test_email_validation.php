<?php

// Copied logic from app/controllers/registro.php
function is_valid_email_strict($str)
{
    if (!filter_var($str, FILTER_VALIDATE_EMAIL))
        return false;

    // Chequeos adicionales
    if (strpos($str, ' ') !== false)
        return false;
    if (strpos($str, '..') !== false)
        return false;
    if (strpos($str, '@@') !== false)
        return false;

    // Desglosar
    $parts = explode('@', $str);
    if (count($parts) !== 2)
        return false;
    $user = $parts[0];
    $domain = $parts[1];

    // Dominios
    if (strpos($domain, '.') === false)
        return false;
    $dParts = explode('.', $domain);
    $tld = end($dParts);

    // TLD reglas
    if (strlen($tld) < 2)
        return false;
    if (preg_match('/\d/', $tld))
        return false; // sin numeros en TLD

    // Regla Gmail (Anti-Spam / User Preference)
    if (strtolower($domain) === 'gmail.com') {
        // Bloquear si empieza con 4+ numeros
        if (preg_match('/^\d{4,}/', $user)) {
            return false;
        }
    }

    return true;
}

$tests = [
    'carlos@gmail.com' => true,
    'carlos.perez@elarca.mx' => true,
    'c123@gmail.com' => true,
    '123carlos@gmail.com' => true, // 3 nums ok
    '1234carlos@gmail.com' => false, // 4 nums bad
    'carlos..perez@gmail.com' => false,
    'carlos @gmail.com' => false,
    'carlos@@gmail.com' => false,
    'user@domain' => false, // No TLD
    'user@domain.c' => false, // TLD < 2
    'user@domain.123' => false, // TLD num
    'simple' => false
];

$passed = 0;
$total = count($tests);

foreach ($tests as $email => $expected) {
    $result = is_valid_email_strict($email);
    echo "Testing '$email': ";
    if ($result === $expected) {
        echo "PASS\n";
        $passed++;
    } else {
        echo "FAIL (Expected " . ($expected ? 'true' : 'false') . ", got " . ($result ? 'true' : 'false') . ")\n";
    }
}

echo "\nSummary: $passed / $total passed.\n";
if ($passed === $total) {
    exit(0);
} else {
    exit(1);
}
