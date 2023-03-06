<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{-- 1.สร้างหน้าสำหรับลงทะเบียนโดยให้มี Field ดังต่อไปนี้
- ชื่อ - นามสกุล
- เบอร์โทรศัพท์
- ที่อยู่ (บ้านเลขที่,ตำบล,อำเภอ,จังหวัด,รหัสไปรษณีย์)
- เพศ
- วันเดือนปีเกิด
- สถานะภาพ (โสด,สมรส)
- ที่อยู่ที่ทำงาน (บ้านเลขที่,ตำบล,อำเภอ,จังหวัด,รหัสไปรษณีย์)
- บริษัทที่ทำงาน
2.หน้าจอสำหรับ Login --}}

<div style="height : 100vh;display: flex;
justify-content: center;
align-items: center;
    flex-direction: column; background-color: blue;">
    <div style="padding: 3%;background-color:white;padding-top:1%;">
    <h2> Sign Up</h2>

    <form>
        <label for="fname">UserName:</label><br>
        <input type="text" id="user" name="fname"><br>
        <label for="lname">Password:</label><br>
        <input type="text" id="password" name="lname"><br>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="lname">Address:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="lname">sex:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="lname">Date of Birth:</label><br>
        <input type="Date" id="lname" name="lname"><br>
        <label for="lname">Marry ?:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="lname">Company Location:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="lname">Company Name:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <input type="submit" id="submit_button" name="submit button"/>
        <a href="login">Login</a>
      </form>
    </div>
</div>
</body>
</html>