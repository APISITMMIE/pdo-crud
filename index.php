<?php
$title = "หน้าแรก";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_admin.php";
$result = $controller->getEmployees();

?>

<body>
    <div class="container">
        <h1 class="text-center my-3"><?php echo "ข้อมูลพนักงาน"; ?></h1>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ชื่อพนักงาน</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">เงินเดือน</th>
      <th scope="col">แผนก</th>
      <th scope="col">ดำเนินการ</th>
    </tr>
  </thead>
  <tbody>
    <?php  while($row = $result->fetch(PDO::FETCH_ASSOC)){?>
    <tr>
        <td><?php echo $row["fname"]; ?></td>
        <td><?php echo $row["lname"]; ?></td>
        <td><?php echo number_format($row["salary"]); ?></td>
        <td><?php echo $row["department_name"]; ?></td>
        <td>
            <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')"
            href="delete.php?id=<?php echo $row["emp_id"]; ?>" class="btn btn-danger">Delete</a>
            <a href="editForm.php?id=<?php echo $row["emp_id"];?>" class="btn btn-warning">Edit</a>
        </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
</body>

