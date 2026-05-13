<?php
echo '--- Looping dengan For ---';
echo '<br/>';
for ($x=1; $x<=5; $x++) {
    echo '<br/>Bilangan'.$x;
}
echo '<br/>';

for ($x=5; $x>=1; $x--) {
    echo '<br/>Bilangan'.$x;
}
echo '<br/>';
echo '<br/> --- Looping dengan While ---';
echo '<br/>';
$a = 1;
while ($a <= 5) { // Jika masih true maka terus looping 
    echo '<br/>Bilangan'.$a;
    $a++;
}

echo '<br/>';

$a = 5;
while ($a >= 1) { // Jika masih true maka terus looping 
    echo '<br/>Bilangan'.$a;
    $a--;
}

?>
echo '<br/>';
<?php
echo '<br/> --- Looping dengan Do While ---';
echo '<br/>';
$b = 1;
do {
    echo '<br/>Bilangan'.$b;
    $b++;
} while ($b <= 5);
echo '<br/>';

