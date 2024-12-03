<?php
// Function to calculate the area of a rectangle
function calculateArea($length, $width) {
    return $length * $width;
}

// Call the function with sample values
$length = 10; // Example length
$width = 5;   // Example width
$area = calculateArea($length, $width);

// Display the result
echo "The area of a rectangle with a width $width and length $length is $area.";
?>
