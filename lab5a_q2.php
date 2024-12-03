<?php
$students = [
    [
        'name' => 'Alice',
        'program' => 'BIP',
        'age' => 21        
    ],
    [
        'name' => 'Bob',
        'program' => 'BIS',
        'age' => 20        
    ],
    [
        'name' => 'Raju',
        'program' => 'BIT',
        'age' => 22        
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Program</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['name']; ?></td>
                    <td><?= $student['program']; ?></td>
                    <td><?= $student['age']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
