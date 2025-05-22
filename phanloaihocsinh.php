<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Danh sách sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f5;
            padding: 20px;
        }
        h2, h3 {
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background: #3498db;
            color: white;
        }
        input[type="text"], input[type="number"] {
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin: 5px;
        }
        input[type="submit"] {
            padding: 6px 12px;
            background:rgb(193, 89, 89);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background:rgb(193, 89, 89);
        }
        .form-box {
            background: white;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <h2>Danh sách Sinh viên</h2>
    <?php
$students = [
    "Nguyen Van A" => 85,
    "Tran Thi B" => 75,
    "Le Van C" => 92,
    "Pham Thi D" => 68,
    "Doan Van E" => 58
];
if (isset($_POST['new_name']) && isset($_POST['new_score'])) {
    $name = $_POST['new_name'];
    $score = $_POST['new_score'];
    if ($name != "" && $score !== "") {
        $students[$name] = (int)$score;
    }
}
$search = isset($_POST['search']) ? $_POST['search'] : "";
$search_results = [];

if ($search != "") {
    $keys = array_keys($students);
    $values = array_values($students);
    for ($i = 0; $i < count($keys); $i++) {
        if (is_numeric($search)) {
            if ($values[$i] == (int)$search) {
                $search_results[$keys[$i]] = $values[$i];
            }
        } else {
            if (stripos($keys[$i], $search) !== false) {
                $search_results[$keys[$i]] = $values[$i];
            }
        }
    }
} else {
    $search_results = $students;
}
?>


    <div class="form-box">
        <form method="post">
            Tìm kiếm (tên hoặc điểm): 
            <input type="text" name="search" value="<?= $search ?>">
            <input type="submit" value="Tìm">
        </form>
    </div>

    <table>
        <tr>
            <th>Họ tên</th>
            <th>Điểm</th>
            <th>Xếp loại</th>
        </tr>
        <?php
        $keys = array_keys($search_results);
        $values = array_values($search_results);
        for ($i = 0; $i < count($keys); $i++) {
            $score = $values[$i];
            $rank = "";
            if ($score >= 85) {
                $rank = "Giỏi";
            } else if ($score >= 70) {
                $rank = "Khá";
            } else if ($score >= 50) {
                $rank = "Trung bình";
            } else {
                $rank = "Yếu";
            }

            echo "<tr>";
            echo "<td>" . $keys[$i] . "</td>";
            echo "<td>" . $score . "</td>";
            echo "<td>" . $rank . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h3>Thêm Sinh viên</h3>
    <div class="form-box">
        <form method="post">
            Họ tên: <input type="text" name="new_name">
            Điểm: <input type="number" name="new_score" min="0" max="100">
            <input type="submit" value="Thêm">
        </form>
    </div>
</body>
</html>
