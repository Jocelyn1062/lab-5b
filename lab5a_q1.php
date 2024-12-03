<!DOCTYPE html>
<html lang="en">
<head>
 <title>Lab 5a Q1</title>
</head>
<body>
 <?php
 $name = "Jocelyn Song Zhi Wei";
 $matric_number = "AI220258";
 $course = "BIW";
 $year_of_study = "Year 3 Sem 1";
 $address = "No 1A, Jalan ABC, 3B";
 ?>
 <table border="1">
 <tr>
 <td>Name</td>
 <td>Matric.No</td>
 <td>Course</td>
 <td>Year of Study</td>
 <td>Address</td>
</tr>
 <tr>
 <td><?php echo "$name"; ?></td>
 <td><?php echo "$matric_number"; ?></td>
 <td><?php echo "$course"; ?></td>
 <td><?php echo "$year_of_study"; ?></td>
 <td><?php echo "$address"; ?></td>
 </tr>


 </table>

</body>
</html>