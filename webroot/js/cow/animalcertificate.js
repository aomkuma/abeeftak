function exportPDF(datacow, datafath, datamoth) {
    if (datacow[0]['gender'] === 'M') {
        datacow[0]['gender'] = 'ผู้'
    } else {
        datacow[0]['gender'] = 'เมีย'
    }

    if (datacow[0]['origin'] === 'IN') {
        datacow[0]['origin'] = 'สัตว์ในประเทศ'
    } else {
        datacow[0]['origin'] = 'สัตว์นำเข้าจากประเทศ'
    }

    var sprdatecow = datacow[0]['birthday'].split('T');
    datacow[0]['birthday'] = sprdatecow[0];

    if (datacow[0]['import_date'] !== '') {
        var sprdateim = datacow[0]['import_date'].split('T');
        datacow[0]['import_date'] = sprdateim[0];
    } else {
        datacow[0]['import_date'] = '-';
    }

    // ตารางรูป //////////////////////////////////
    var data_detail = [];
    var firstRow = [];

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

    var firstRow3 = [];

    firstRow3.push({text: 'ลักษณะรูปพรรณ : ' + datacow[0]['description'], style: 'tableHeader', colSpan: 6, alignment: 'left', fontSize: 12, bold: true});
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
    headerRow2.push({text: 'ที่อยู่ฟาร์ม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'เบอร์โทร', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'วันที่เป็นเจ้าของ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail2.push(headerRow2);

//    var row_index = 1;
//    data.forEach(function (sourceRow) {
//        var dataRow = [];
//        var sprdate = sourceRow.movement_date.split('T');
//        dataRow.push({text: row_index, alignment: 'center'});
//        dataRow.push({text: sourceRow.departure, alignment: 'center'});
//        dataRow.push({text: sourceRow.destination, alignment: 'center'});
//        dataRow.push({text: sprdate[0], alignment: 'center'});
//        dataRow.push({text: sourceRow.description, alignment: 'center'});
//        dataRow.push('');
//        dataRow.push('');
//        data_detail.push2(dataRow);
//        row_index++;
//    });

    // ตาราง ประวัติการเคลื่อนย้าย  ////////////////////
    var data_detail3 = [];
    var headerRow3 = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow3.push({text: 'ลำดับ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'ต้นทาง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'ปลายทาง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'วันที่เดินทาง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'จุดประสงค์การเคลื่อนย้าย', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'ชื่อผู้ตรวจสอบ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail3.push(headerRow3);

// set detail
//    var row_index = 1;
//    data.forEach(function (sourceRow) {
//        var dataRow = [];
//        var sprdate = sourceRow.movement_date.split('T');
//        dataRow.push({text: row_index, alignment: 'center'});
//        dataRow.push({text: sourceRow.departure, alignment: 'center'});
//        dataRow.push({text: sourceRow.destination, alignment: 'center'});
//        dataRow.push({text: sprdate[0], alignment: 'center'});
//        dataRow.push({text: sourceRow.description, alignment: 'center'});
//        dataRow.push('');
//        dataRow.push('');
//        data_detail.push(dataRow);
//        row_index++;
//    });

// ตาราง ประวัติการรักษา  ////////////////////
    var data_detail4 = [];
    var headerRow4 = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow4.push({text: 'ลำดับ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'วันที่รักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'โรค', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'การให้ยารักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'ผู้รักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail4.push(headerRow4);
    
    //////////
    
    // ตาราง ประวัติการฉีดวัคซีน  ////////////////////
    var data_detail4 = [];
    var headerRow4 = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow4.push({text: 'ลำดับ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'วันที่รักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'โรค', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'การให้ยารักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'ผู้รักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail4.push(headerRow4);
    
    //////////
    
    // ตาราง ประวัติการผสมเทียม  ////////////////////
    var data_detail4 = [];
    var headerRow4 = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow4.push({text: 'ลำดับ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'วันที่รักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'โรค', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'การให้ยารักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'ผู้รักษา', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow4.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail4.push(headerRow4);
    
    //////////
    pdfMake.fonts = {
        SriSuriwongse: {

            normal: 'SRISURYWONGSE.ttf'
            , bold: 'SRISURYWONGSE-Bold.ttf'
        }
    };

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
                            , {text: '    ' + datacow[0]['cow_breed']['name'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' พันธุ์ '}
                            , {text: '    ' + datacow[0]['grade'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' เพศ '}
                            , {text: '    ' + datacow[0]['gender'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' วันเกิด  '}
                            , {text: '    ' + datacow[0]['birthday'] + '      ', decoration: 'underline', decorationStyle: 'dashed'}

                            , {text: '\n\n พ่อพันธุ์ชื่อ '}
                            , {text: '    ' + datafath[0]['cow_breed']['name'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' หมายเลขทะเบียนโค '}
                            , {text: '    ' + datafath[0]['code'] + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' พันธุ์ '}
                            , {text: '    ' + datafath[0]['grade'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}

                            , {text: '\n\n แม่พันธุ์ชื่อ '}
                            , {text: '    ' + datamoth[0]['cow_breed']['name'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' หมายเลขทะเบียนโค '}
                            , {text: '    ' + datamoth[0]['code'] + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' พันธุ์ '}
                            , {text: '    ' + datamoth[0]['grade'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}

                            , {text: '\n\n สถานภาพสัตว์ '}
                            , {text: '    ' + datacow[0]['origins'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' วันที่นำเข้า '}
                            , {text: '    ' + datacow[0]['import_date'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}

                            , {text: '\n\n\n'}

                        ], margin: [60, 0, 0, 0]}

                ]
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
                            , {text: '   วัว   ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' เดือน '}
                            , {text: '    ' + datacow[0]['cow_breed']['name'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' ปี '}
                            , {text: '    ' + datacow[0]['grade'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}


                            , {text: '\n\n ลงชื่อ____________________________ผู้ตรวจสอบ '}
                            , {text: '\n  (                              )     '}
                            , {text: '\n ตำแหน่ง '}
                            , {text: '                                  ', decoration: 'underline', decorationStyle: 'dashed'}

                            , {text: '\n\n ลงชื่อ____________________________ผู้รับรอง '}
                            , {text: '\n  (                              )     '}
                            , {text: '\n ตำแหน่ง '}
                            , {text: '                                  ', decoration: 'underline', decorationStyle: 'dashed'}

                        ], alignment: 'center'}

                ], pageBreak: 'after', pageOrientation: 'landscape'
            },

            {text: 'ประวัติการเป็นเจ้าของโค รหัสโค :  ' + datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}
            , {text: '\n'},
            {
                table: {
                    headerRows: 1,
                    widths: [50, 90, 100, 80, 100, 100, 100],
                    body: data_detail2
                }, margin: [40, 0, 0, 0]
                , pageBreak: 'after', pageOrientation: 'landscape'
            },
            {text: 'ประวัติการเคลื่อนย้าย รหัสโค :  '+ datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}
            , {text: '\n'},
            {
                table: {
                    headerRows: 1,
                    widths: [50, 90, 90, 80, 100, 100, 100],
                    body: data_detail3
                }, margin: [40, 0, 0, 0]
                , pageBreak: 'after', pageOrientation: 'landscape'
            },
            {text: 'ประวัติการรักษา รหัสโค :  '+ datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}
            , {text: '\n'},
            {
                table: {
                    headerRows: 1,
                    widths: [50, 90, 130, 140, 100, 110],
                    body: data_detail4
                }, margin: [40, 0, 0, 0]
                , pageBreak: 'after', pageOrientation: 'landscape'
            },
            {text: 'ประวัติการฉีดวัคซีน รหัสโค :  '+ datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}
            , {text: '\n'}
            ,
//            {
//                table: {
//                    headerRows: 1,
//                    widths: [50, 90, 130, 140, 100, 110],
//                    body: data_detail5
//                }, margin: [40, 0, 0, 0]
//                , pageBreak: 'after', pageOrientation: 'landscape'
//            },
            {text: 'ประวัติการผสมเทียม รหัสโค :  '+ datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}
            , {text: '\n'}
//            ,
//            {
//                table: {
//                    headerRows: 1,
//                    widths: [50, 90, 130, 140, 100, 110],
//                    body: data_detail6
//                }, margin: [40, 0, 0, 0]
//                , pageBreak: 'after', pageOrientation: 'landscape'
//            }
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
}