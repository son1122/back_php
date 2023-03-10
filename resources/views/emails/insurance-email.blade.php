<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        body {
            background: rgb(204, 204, 204);
        }
        .a4 {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
            width: 21cm;
            height: 29.7cm;
            margin-left: 1cm;
        }
    </style>
</head>
<body>
<div class="a4">
    <div style="display: grid;
    grid-template-rows: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;height: 100%;">
        <div style="margin-left: 20px;display: grid; grid-template-columns: 2fr 1fr 6fr 2fr;align-items: center">
            <p style="font-size: 0.02em;text-align: center">สำนักใหญ่ตั้งอยู่เลขที่ <br/>1115 ถนน พระราม 3 แขวงช่องนนทรี <br/>เขตยานนาวา กรุงเทพ 10120 <br/>โทรศัพท์ 1736 0 2230 2200 <br/>โทรสาร 02230 2040 <br/>เลขประจำตัวผู้เสียภาษี <br/>0007539000533</p>
            <img style="height: 80px;text-align: center" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKRxpwFRKAno71QExzA6t51o8g6ftoqGISXJ89jsOaWEFmeruNh2kLhuhl59t_QoiPXa0&usqp=CAU">
            <div style="display: grid;grid-template-rows: 1fr 1fr;text-align: center">
                <h3 style="margin-block-end: 0.1em;">บริษัท ทิพยประกันภัย จำกัด (มหาชน)</h3>
                <h4 style="margin-block-start: 0.7em;">DHIPAYA INSURANCE PUBLIC COMPANY LIMITED</h4>
            </div>
            <p style="font-size: 0.02em;text-align: center">HEAD OFFICE ADDRESS <br/>1115 RAMA3 ROAD, CHONGNGONSE <br> BANGKOK 10120 <br> TEL 1736, 0 2233 2200<br>FAX 0 2233 2240<br>www.dhipaya.co.th</p>
        </div>
        <div style="text-align: center">
            <h3>ตารางกรรม์ประกันภัย (ขายผ่านช่องทางอิเล็กทรกนิกส์ (Online))<br>THE SCHEDULE <br>กรรม์ประกันภัยส่วนบุคคล </h3>
        </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr">
            <p style="margin-left: 20px;">รหัสบริษัท : DHP<br>Company Code : DHP</p>
            <p>กรมธรรม์ประกันภัยเลขที่ : 999999999 <br>Policy No. : 99999999999</p>
        </div>
        <div style="margin-left: 20px;display: grid; grid-template-columns: 1fr 1fr">
            <p>ผู้เอาประกันภัย : ชื่อและที่อยู่ : {{$firstname}} {{$lastname}}<br>The Insured : Name and Address :</p>
            <p>เลขประจำตัวประชาชน : ID No.     <br> อาชีพ : Occupation : <br>อายุ : Age <br>เบอร์โทรศัพท์ : Telephone No. :</p>
        </div>
        <div style="margin-left: 20px;display: grid; grid-template-columns: 1fr 1fr">
            <p>ผู้รับผลประโยชน์ : ชื่อและที่อยู่ : <br>The Beneficiary : Name and Address :</p>
            <p>ความสัมพันธ์กับผู้เอาประกันภัย : มารดา <br>Relationship to the Insured : Mother</p>
        </div>
        <div style="margin-left: 20px;display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr">
            <p style="font-size: 0.2em">ระยะเวลาประกันภัย <br>Period of Insurance </p>
            <p style="font-size: 0.2em">: เริ่มต้นวันที่<br>: From</p>
            <p style="font-size: 0.2em">24.00</p>
            <p style="font-size: 0.2em">เวลา<br>at</p>
            <p style="font-size: 0.2em">24.00</p>
            <p style="font-size: 0.2em">น.<br>hours</p>
            <p style="font-size: 0.2em">สิ้นสุดวันที่<br>To</p>
            <p style="font-size: 0.2em">24.00</p>
            <p style="font-size: 0.2em">น.<br>hours</p>

        </div>
        <div style="margin-left: 20px;">
            <p>ข้อตกลงความคุ้มครอง(Insuring Agreement/Endosement)</p>
        </div>
        <div style="margin-left: 20px;display: grid; grid-template-columns: 1fr 1fr">
            <p style="text-align: center">ข้อตกลงความคุ้มครอง<br>(Insuring Agreement/Endosement)</p>
            <p style="text-align: center">จำนวนเงินเอาประกันภัย<br>Sum Insured (Bath)</p>
        </div>
        <div style="margin-left: 20px;display: grid; grid-template-columns: 1fr 1fr">
            <p>Description</p>
            <p>Money in Bath</p>
        </div>
        <div style="margin-left: 20px;display: grid; grid-template-columns: 1fr 1fr 1fr 1fr">
            <p>เบี้ยประกันภัยสุทธิ : {{$premium}} บาท<br>Net Premium :     Bath</p>
            <p>อากรแสตมป์ : 20 บาท<br>Stamps Duty:   Bath</p>
            <p>ภาษีมูลค่าเพิ่ม : บาท <br> VAT Bath</p>
            <p>เบี้ยประกันภับรวม  {{$premium*1.07}}  บาท<br>Total Premium  Bath</p>
        </div>
        <div style="margin-left: 20px;display: grid; grid-template-columns: 1fr 1fr 1fr 1fr">
            <p style="font-size: 0.4em"><input type="checkbox" class="onoffswitch-checkbox" checked="true"> ประกันภัยโดยตรง Direct</p>
            <p style="font-size: 0.4em"><input type="checkbox" class="onoffswitch-checkbox" checked="true"> ตัวแทนประกันวินาศภัย Agent</p>
            <p style="font-size: 0.4em"><input type="checkbox" class="onoffswitch-checkbox" checked="true"> นายหน้าประกันวินาศภัยรายนี้ Broker</p>
            <p style="font-size: 0.4em">ใบอนุญาติเลขที่ : <br>License No. : </p>
        </div>
        <div style="margin-left: 20px;">
            <div style="display: grid;grid-template-columns: 1fr 1fr">
                <p>วันทีทำสัญญาประกันภัย : <br>Agreement made on : </p>
                <p>วันออกกรมธรรม์ประกันภัย : <br>Policy issued on : </p>
            </div>
            <p style="font-size: 0.4em">เพื่อเป็นหลักฐาน บริษัท โดยผู้มีอำนาจกระทำการแทนบริษัท ได้ลงลายมือชื่อและตราประทัยของบรอษัทไว้เป็นสำคัญ ณ สำนักงานของบริษัท<br>
                As evidence the Company has caused this policy to be signed by duty authorized persons and the Company's stamp to be affored at its office
            </p>
        </div>
        <div style="margin-left: 20px;display: grid; grid-template-columns: 1fr 1fr 1fr 1fr">


        </div>
    </div>
</div>

</body>
</html>
