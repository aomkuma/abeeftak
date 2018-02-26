function getBase64Image(img) {
    var canvas = document.createElement("canvas");
    canvas.width = img.width;
    canvas.height = img.height;
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);
    var dataURL = canvas.toDataURL("image/png");
    return dataURL;//.replace(/^data:image\/(png|jpg);base64,/, "");
}

function getBase64Emty() {
    var canvas = document.createElement("canvas");
    canvas.width = 275;
    canvas.height = 210;
    var dataURL = canvas.toDataURL("image/png");
    return dataURL;//.replace(/^data:image\/(png|jpg);base64,/, "");
}

function exportPDF(datacow, datafath, datamoth, datamove, datatreat, dataowner, dataai) {
    if (datacow[0]['gender'] === 'M') {
        datacow[0]['gender'] = 'ผู้';
    } else {
        datacow[0]['gender'] = 'เมีย';
    }

    if (datacow[0]['origins'] === 'IN') {
        datacow[0]['origins'] = 'สัตว์ในประเทศ';
    } else {
        datacow[0]['origins'] = 'สัตว์นำเข้าจากต่างประเทศ';
    }

    var sprdatecow = datacow[0]['birthday'].split('T');
    datacow[0]['birthday'] = sprdatecow[0];

    if (datacow[0]['import_date'] !== null) {
        var sprdateim = datacow[0]['import_date'].split('T');
        datacow[0]['import_date'] = sprdateim[0];
    } else {
        datacow[0]['import_date'] = '-';
    }
    // ตารางรูป //////////////////////////////////
    var data_detail = [];
    var firstRow = [];
    /*
     firstRow.push({text: '', style: 'tableHeader', colSpan: 6, rowSpan: 41, alignment: 'center', fontSize: 12, bold: true});
     firstRow.push({text: ''});
     firstRow.push({text: ''});
     firstRow.push({text: ''});
     firstRow.push({text: ''});
     firstRow.push({text: ''});
     
     
     data_detail.push(firstRow);
     
     for (var i = 0; i < 40; i++) {
     var firstRow2 = [];
     firstRow2.push({text: ''});
     firstRow2.push({text: ''});
     firstRow2.push({text: ''});
     firstRow2.push({text: ''});
     firstRow2.push({text: ''});
     firstRow2.push({text: ''});
     
     data_detail.push(firstRow2);
     }
     */

    var firstRow3 = [];

    firstRow3.push({text: 'ลักษณะรูปพรรณ : ' + (datacow[0]['description'] === null ? ' - ' : datacow[0]['description']), style: 'tableHeader', colSpan: 6, alignment: 'left', fontSize: 12, bold: true});
    firstRow3.push({text: ''});
    firstRow3.push({text: ''});
    firstRow3.push({text: ''});
    firstRow3.push({text: ''});
    firstRow3.push({text: ''});


    data_detail.push(firstRow3);

    // ตาราง ประวัติการเป็นเจ้าของ /////
    // 
    var data_detail2 = [];
    var headerRow2 = [];

    headerRow2.push({text: 'ลำดับ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'ชื่อ-สกุล', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'หมายเลขประจำตัวประชาชน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'ชื่อฟาร์ม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'วันที่เป็นเจ้าของ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail2.push(headerRow2);

    for (var i = 0; i < 10; i++) {
        var row2 = [];
        if (i < dataowner.length) {

            if (dataowner[i]['farm_cows'].length !== 0 && dataowner[i]['farm_cows'][0]['farm']['farm_herdsmans'].length !== 0) {
                row2.push({text: i + 1, alignment: 'center'});
                var fullname = dataowner[i]['farm_cows'][0]['farm']['farm_herdsmans'][0]['herdsman']['title'] + dataowner[i]['farm_cows'][0]['farm']['farm_herdsmans'][0]['herdsman']['firstname']
                        + "   " + dataowner[i]['farm_cows'][0]['farm']['farm_herdsmans'][0]['herdsman']['lastname'];
                var card = dataowner[i]['farm_cows'][0]['farm']['farm_herdsmans'][0]['herdsman']['idcard'];

                row2.push({text: fullname, alignment: 'center'});
                row2.push({text: card, alignment: 'center'});
                row2.push({text: dataowner[i]['farm_cows'][0]['farm']['name'], alignment: 'center'});
                if (dataowner[i]['farm_cows'][0]['moved_in_date'] !== null) {
                    var sprdate = dataowner[i]['farm_cows'][0]['moved_in_date'].split('T');
                    row2.push({text: sprdate[0]});
                } else {
                    row2.push({text: ''});
                }

            } else {
                row2.push({text: '-', alignment: 'center'});
                row2.push({text: '-', alignment: 'center'});
                row2.push({text: '-', alignment: 'center'});
                row2.push({text: '-', alignment: 'center'});
                row2.push({text: '-', alignment: 'center'});
            }

//            var sprdate = dataowner[i]['movement_date'].split('T');


            row2.push({text: ''});
        } else {
            row2.push({text: '-', alignment: 'center'});
            row2.push({text: '-', alignment: 'center'});
            row2.push({text: '-', alignment: 'center'});
            row2.push({text: '-', alignment: 'center'});
            row2.push({text: '-', alignment: 'center'});
            row2.push({text: '-', alignment: 'center'});
        }
        data_detail2.push(row2);
    }

    // ตาราง ประวัติการเคลื่อนย้าย  ////////////////////
    var data_detail3 = [];
    var headerRow3 = [];
// set header
    headerRow3.push({text: 'ลำดับ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'ต้นทาง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'ปลายทาง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'วันที่เดินทาง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'จุดประสงค์การเคลื่อนย้าย', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'ชื่อผู้ตรวจสอบ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail3.push(headerRow3);

    for (var i = 0; i < 10; i++) {
        var firstRow3 = [];
        if (i < datamove.length) {
            var sprdate = datamove[i]['movement_date'].split('T');
            firstRow3.push({text: i + 1, alignment: 'center'});
            firstRow3.push({text: datamove[i]['departure'], alignment: 'center'});
            firstRow3.push({text: datamove[i]['destination'], alignment: 'center'});
            firstRow3.push({text: sprdate[0], alignment: 'center'});
            firstRow3.push({text: datamove[i]['description'], alignment: 'center'});
            firstRow3.push({text: ''});
            firstRow3.push({text: ''});
        } else {
            firstRow3.push({text: '-', alignment: 'center'});
            firstRow3.push({text: '-', alignment: 'center'});
            firstRow3.push({text: '-', alignment: 'center'});
            firstRow3.push({text: '-', alignment: 'center'});
            firstRow3.push({text: '-', alignment: 'center'});
            firstRow3.push({text: '-', alignment: 'center'});
            firstRow3.push({text: '-', alignment: 'center'});
        }
        data_detail3.push(firstRow3);
    }

// ตาราง ประวัติการรักษา  ////////////////////datatreat
    var data_detail4 = [];
    var headerRow4 = [];
// set header
    headerRow4.push({text: 'ลำดับ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'วันที่รักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'การรักษา/การให้วัคซีน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'การให้ยา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'ผู้รักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail4.push(headerRow4);

    for (var i = 0; i < 10; i++) {
        var firstRow4 = [];
        if (i < datatreat.length) {
            var sprdatetreat = datatreat[i]['treatment_date'].split('T');
            datatreat[i]['birthday'] = sprdatetreat[0];
            firstRow4.push({text: i + 1, alignment: 'center', fontSize: 12, bold: true});
            firstRow4.push({text: datatreat[i]['birthday'], alignment: 'center'});
            firstRow4.push({text: datatreat[i]['disease'], alignment: 'center'});
            firstRow4.push({text: datatreat[i]['drug_used'], alignment: 'center'});
            firstRow4.push({text: datatreat[i]['conservator'], alignment: 'center'});
            firstRow4.push({text: datatreat[i]['description'], alignment: 'center'});
        } else {
            firstRow4.push({text: '-', alignment: 'center'});
            firstRow4.push({text: '-', alignment: 'center'});
            firstRow4.push({text: '-', alignment: 'center'});
            firstRow4.push({text: '-', alignment: 'center'});
            firstRow4.push({text: '-', alignment: 'center'});
            firstRow4.push({text: '-', alignment: 'center'});
        }


        data_detail4.push(firstRow4);
    }

    //////////

    // ตาราง ประวัติการฉีดวัคซีน  ////////////////////
//    var data_detail5 = [];
//    var headerRow5 = [];
//// set header
////headerRow.push('ห้องประชุม');
//    headerRow5.push({text: 'ชนิดวัคซีน \n Type', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
//    headerRow5.push({text: 'ครั้งที่ \n No.', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
//    headerRow5.push({text: 'ชุดที่ \n Lot No.', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
//    headerRow5.push({text: 'หมดอายุวันที่ \n Expried Date', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
//    headerRow5.push({text: 'วันที่ฉีด \n Vaccination Date', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
//    headerRow5.push({text: 'ฉีดครั้งต่อไป \n Next Vaccination', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
//    headerRow5.push({text: 'ผู้ฉีด \n Vaccinator', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
//    headerRow5.push({text: 'สัตวแพทย์ผู้รับรอง \n Vet Authorized', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
//
//    data_detail5.push(headerRow5);
//
//    for (var i = 1; i <= 10; i++) {
//        var firstRow5 = [];
//        if (i === 1) {
//            firstRow5.push({text: 'ปากและ \n เท้าเปื่อย \n FMD', style: 'tableHeader', rowSpan: 10, alignment: 'center', fontSize: 12, bold: true});
//            firstRow5.push({text: i, alignment: 'center', fontSize: 12, bold: true});
//            firstRow5.push({text: ''});
//            firstRow5.push({text: ''});
//            firstRow5.push({text: ''});
//            firstRow5.push({text: ''});
//            firstRow5.push({text: ''});
//            firstRow5.push({text: ''});
//        } else {
//            firstRow5.push({text: ''});
//            firstRow5.push({text: i, alignment: 'center', fontSize: 12, bold: true});
//            firstRow5.push({text: ''});
//            firstRow5.push({text: ''});
//            firstRow5.push({text: ''});
//            firstRow5.push({text: ''});
//            firstRow5.push({text: ''});
//            firstRow5.push({text: ''});
//        }
//
//
//        data_detail5.push(firstRow5);
//    }
//
//    for (var i = 1; i <= 5; i++) {
//        var firstRow52 = [];
//        if (i === 1) {
//            firstRow52.push({text: 'เฮโมรายิก \n เซพติซีเมีย \n Haemo', style: 'tableHeader', rowSpan: 5, alignment: 'center', fontSize: 12, bold: true});
//            firstRow52.push({text: i, alignment: 'center', fontSize: 12, bold: true});
//            firstRow52.push({text: ''});
//            firstRow52.push({text: ''});
//            firstRow52.push({text: ''});
//            firstRow52.push({text: ''});
//            firstRow52.push({text: ''});
//            firstRow52.push({text: ''});
//        } else {
//            firstRow52.push({text: ''});
//            firstRow52.push({text: i, alignment: 'center', fontSize: 12, bold: true});
//            firstRow52.push({text: ''});
//            firstRow52.push({text: ''});
//            firstRow52.push({text: ''});
//            firstRow52.push({text: ''});
//            firstRow52.push({text: ''});
//            firstRow52.push({text: ''});
//        }
//        data_detail5.push(firstRow52);
//    }
//
//    for (var i = 1; i <= 5; i++) {
//        var firstRow53 = [];
//        if (i === 1) {
//            firstRow53.push({text: 'บรูเซอโลซิล \n เซพติซีเมีย \n Bru', style: 'tableHeader', rowSpan: 5, alignment: 'center', fontSize: 12, bold: true});
//            firstRow53.push({text: i, alignment: 'center', fontSize: 12, bold: true});
//            firstRow53.push({text: ''});
//            firstRow53.push({text: ''});
//            firstRow53.push({text: ''});
//            firstRow53.push({text: ''});
//            firstRow53.push({text: ''});
//            firstRow53.push({text: ''});
//        } else {
//            firstRow53.push({text: ''});
//            firstRow53.push({text: i, alignment: 'center', fontSize: 12, bold: true});
//            firstRow53.push({text: ''});
//            firstRow53.push({text: ''});
//            firstRow53.push({text: ''});
//            firstRow53.push({text: ''});
//            firstRow53.push({text: ''});
//            firstRow53.push({text: ''});
//        }
//
//
//        data_detail5.push(firstRow53);
//    }

    //////////

    // ตาราง ประวัติการผสมเทียม  ////////////////////dataAI
    var data_detail6 = [];
    var headerRow6 = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow6.push({text: 'ลำดับ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow6.push({text: 'วันที่ผสม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow6.push({text: 'พ่อพันธู์', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow6.push({text: 'สถานะการผสม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow6.push({text: 'วันคลอด', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow6.push({text: 'หมายเลขลูก', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow6.push({text: 'เพศ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow6.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail6.push(headerRow6);

    for (var i = 0; i < 10; i++) {
        var firstRow6 = [];
        if (i < dataai.length) {

            firstRow6.push({text: i + 1, alignment: 'center', fontSize: 12, bold: true});
            if (dataai[i]['breeding_date'] !== null) {
                var sprdateai = dataai[i]['breeding_date'].split('T');
                firstRow6.push({text: sprdateai[0], alignment: 'center'});
            } else {
                firstRow6.push({text: '', alignment: 'center'});
            }
            firstRow6.push({text: dataai[i]['father_code'], alignment: 'center'});

            if (dataai[i]['breeding_status'] === 'Y') {
                var breeding_status = 'ติด';
            } else {
                var breeding_status = 'ไม่ติด';
            }
            firstRow6.push({text: breeding_status, alignment: 'center'});

            if (dataai[i]['cow']['birthday'] !== null) {
                var sprdateaibd = dataai[i]['cow']['birthday'].split('T');
                firstRow6.push({text: sprdateaibd[0], alignment: 'center'});
            } else {
                firstRow6.push({text: '', alignment: 'center'});
            }

            firstRow6.push({text: dataai[i]['cow']['code'], alignment: 'center'});

            if (dataai[i]['cow']['gender'] === 'M') {
                dataai[i]['cow']['gender'] = 'ผู้';
            } else {
                dataai[i]['cow']['gender'] = 'เมีย';
            }

            firstRow6.push({text: dataai[i]['cow']['gender'], alignment: 'center'});
            firstRow6.push({text: '', alignment: 'center'});
        } else {
            firstRow6.push({text: i + 1, alignment: 'center', fontSize: 12, bold: true});
            firstRow6.push({text: '-', alignment: 'center'});
            firstRow6.push({text: '-', alignment: 'center'});
            firstRow6.push({text: '-', alignment: 'center'});
            firstRow6.push({text: '-', alignment: 'center'});
            firstRow6.push({text: '-', alignment: 'center'});
            firstRow6.push({text: '-', alignment: 'center'});
            firstRow6.push({text: '-', alignment: 'center'});
        }


        data_detail6.push(firstRow6);
    }

    //////////
    pdfMake.fonts = {
        SriSuriwongse: {

            normal: 'THSarabun.ttf'
            , bold: 'THSarabun-Bold.ttf'
        }
    };
    console.log(document.getElementById("imageid").value);
//    if (typeof document.getElementById("imageid").value !== "undefined") {
    var imageBase64 = getBase64Image(document.getElementById("imageid"));
    if (imageBase64 === 'data:,') {
        var imageBase64 = getBase64Emty();
    }
    console.log(imageBase64);
//    } else {
//        var imageBase64 = getBase64Emty();
//    }

    var dd = {
        content: [
            {text: 'บัตรประจำตัวสัตว์', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
            {text: 'ANIMAL CERTIFICATE', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
            {
                columns: [

                    {text: [
                            {text: '\n หมายเลขทะเบียนโค '}
                            , {text: '    ' + datacow[0]['code'] + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: '\n\n ชนิดสัตว์ '}
                            , {text: '   วัว   ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' ชื่อ '}
                            , {text: '    ' + (datacow[0]['cow_breed']['name'] === 0 ? ' - ' : datacow[0]['cow_breed']['name']) + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' พันธุ์ '}
                            , {text: '    ' + datacow[0]['grade'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' เพศ '}
                            , {text: '    ' + datacow[0]['gender'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' วันเกิด  '}
                            , {text: '    ' + datacow[0]['birthday'] + '      ', decoration: 'underline', decorationStyle: 'dashed'}

                            , {text: '\n\n พ่อพันธุ์ชื่อ '}
                            , {text: '    ' + (datafath.length === 0 ? ' - ' : datafath[0]['cow_breed']['name']) + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' หมายเลขทะเบียนโค '}
                            , {text: '    ' + (datafath.length === 0 ? ' - ' : datafath[0]['code']) + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' พันธุ์ '}
                            , {text: '    ' + (datafath.length === 0 ? ' - ' : datafath[0]['grade']) + '       ', decoration: 'underline', decorationStyle: 'dashed'}

                            , {text: '\n\n แม่พันธุ์ชื่อ '}
                            , {text: '    ' + (datamoth.length === 0 ? ' - ' : datamoth[0]['cow_breed']['name']) + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' หมายเลขทะเบียนโค '}
                            , {text: '    ' + (datamoth.length === 0 ? ' - ' : datamoth[0]['code']) + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' พันธุ์ '}
                            , {text: '    ' + (datamoth.length === 0 ? ' - ' : datamoth[0]['grade']) + '       ', decoration: 'underline', decorationStyle: 'dashed'}

                            , {text: '\n\n สถานภาพสัตว์ '}
                            , {text: '    ' + datacow[0]['origins'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' วันที่นำเข้า '}
                            , {text: '    ' + datacow[0]['import_date'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}

                            , {text: '\n\n\n'}

                        ], margin: [60, 0, 0, 0]}

                ]
            },
            {
                image: (imageBase64 === null ? '-' : imageBase64),
                width: 325,
                margin: [100, 50, 50, 10]
            },
            {
                table: {
                    headerRows: 1,
                    widths: [45, 45, 45, 45, 45, 45],
                    body: data_detail

                }, margin: [100, 0, 0, 0]
            },

            {
                columns: [

                    {text: [
                            {text: '\n\n ออกให้ ณ วันที่ '}
                            , {text: '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' เดือน '}
                            , {text: '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' ปี '}
                            , {text: '      ', decoration: 'underline', decorationStyle: 'dashed'}


                            , {text: '\n\n ลงชื่อ____________________________ผู้ตรวจสอบ '}
                            , {text: '\n  (                              )     '}
                            , {text: '\n ตำแหน่ง '}
                            , {text: '                                  ', decoration: 'underline', decorationStyle: 'dashed'}

                            , {text: '\n\n ลงชื่อ____________________________ผู้รับรอง '}
                            , {text: '\n  (                              )     '}
                            , {text: '\n ตำแหน่ง '}
                            , {text: '                                  ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: '\n                                       '}

                        ], alignment: 'center'}

                ], pageBreak: 'after', pageOrientation: 'landscape'
            },

            {text: 'ประวัติการเป็นเจ้าของโค รหัสโค :  ' + datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}
            , {text: '\n'},
            {
                table: {
                    headerRows: 1,
                    widths: [50, 110, 120, 120, 120, 100],
                    body: data_detail2
                }, margin: [40, 0, 0, 0]
                , pageBreak: 'after', pageOrientation: 'landscape'
            },
            {text: 'ประวัติการเคลื่อนย้าย รหัสโค :  ' + datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}
            , {text: '\n'},
            {
                table: {
                    headerRows: 1,
                    widths: [50, 90, 90, 80, 100, 100, 100],
                    body: data_detail3
                }, margin: [40, 0, 0, 0]
                , pageBreak: 'after', pageOrientation: 'landscape'
            },
            {text: 'ประวัติการรักษา รหัสโค :  ' + datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}
            , {text: '\n'},
            {
                table: {
                    headerRows: 1,
                    widths: [50, 90, 130, 140, 100, 110],
                    body: data_detail4
                }, margin: [40, 0, 0, 0]
                , pageBreak: 'after', pageOrientation: 'landscape'
            },
//            {text: 'ประวัติการฉีดวัคซีน รหัสโค :  ' + datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}
//            , {text: '\n'}
//            ,
//            {
//                table: {
//                    headerRows: 1,
//                    widths: [50, 30, 30, 100, 100, 100, 110, 110],
//                    body: data_detail5
//                }, margin: [40, 0, 0, 0]
//                , pageBreak: 'after', pageOrientation: 'landscape'
//            },
            {text: 'ประวัติการผสมเทียม รหัสโค :  ' + datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}
            , {text: '\n'}
            ,
            {
                table: {
                    headerRows: 1,
                    widths: [30, 100, 90, 70, 100, 90, 50, 90],
                    body: data_detail6
                }, margin: [40, 0, 0, 0]
            }
        ],
        styles: {
            header: {
                bold: true,
                fontSize: 18
            }
        },
        defaultStyle: {
            fontSize: 12,
            font: 'SriSuriwongse'
        }
//        ,pageOrientation: 'landscape'
    }

    pdfMake.createPdf(dd).download('บัตรประจำตัวสัตว์ รหัสโค' + datacow[0]['code'] + '.pdf');
    setTimeout(function () {
        window.close();
    }, 2000);

}