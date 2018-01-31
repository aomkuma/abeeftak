function exportPDF(datacow, datagrowth, datagrowthW, dataBreed) {
    var data_detail = [];
    var firstRow = [];
// set header
//headerRow.push('ห้องประชุม');
    firstRow.push({text: 'น้ำหนักและคะแนนของพ่อโค', style: 'tableHeader', colSpan: 6, alignment: 'center', fontSize: 12, bold: true});
    firstRow.push({text: ''});
    firstRow.push({text: ''});
    firstRow.push({text: ''});
    firstRow.push({text: ''});
    firstRow.push({text: ''});

    data_detail.push(firstRow);

    var headerRow = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow.push({text: 'วันที่', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'อายุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'น้ำหนัก', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'น้ำหนักเพิ่ม กรัม/วัน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'ความสูง (ซม.)', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'รอบอก (ซม.)', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail.push(headerRow);

// set detail
    var row_index = 0;
    datagrowth.forEach(function (sourceRow) {
        var dataRow = [];
        var sprdate = sourceRow.record_date.split('T');
        dataRow.push({text: sprdate[0], alignment: 'center'});
        dataRow.push({text: sourceRow.age, alignment: 'center'});
        dataRow.push({text: sourceRow.weight, alignment: 'center'});
        dataRow.push({text: sourceRow.growth_stat, alignment: 'center'});
        dataRow.push({text: sourceRow.height, alignment: 'center'});
        dataRow.push({text: sourceRow.chest, alignment: 'center'});
        data_detail.push(dataRow);
        row_index++;
    });
    var sprdatecow = datacow[0]['birthday'].split('T');
    datacow[0]['birthday'] = sprdatecow[0];
//return ;

    var data_detail2 = [];
    var headerRow2 = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow2.push({text: 'วันที่', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'อายุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'น้ำหนัก', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'จำนวนอาหารที่กิน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'น้ำหนักเพิ่ม กรัม/วัน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'คะแนน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail2.push(headerRow2);

// set detail
    var row_index2 = 1;
    datagrowth.forEach(function (sourceRow) {
        var dataRow2 = [];
        var sprdate = sourceRow.record_date.split('T');
        dataRow2.push({text: sprdate[0], alignment: 'center'});
        dataRow2.push({text: sourceRow.age, alignment: 'center'});
        dataRow2.push({text: sourceRow.weight, alignment: 'center'});
        dataRow2.push({text: sourceRow.total_eating, alignment: 'center'});
        dataRow2.push({text: sourceRow.growth_stat, alignment: 'center'});
        dataRow2.push('');
        data_detail2.push(dataRow2);
        row_index2++;
    });

    var data_detail3 = [];
    var headerRow3 = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow3.push({text: 'วันที่ผสม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'หมายเลขแม่วัว', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'วันที่ผสม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'หมายเลขแม่วัว', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail3.push(headerRow3);

// set detail

    var row_index3 = 0;
    for(var i = 0 ; i < dataBreed.length ; i++){
        var dataRow3 = [];
        var sprdate = dataBreed[row_index3]['breeding_date'].split('T');
        dataRow3.push({text: sprdate[0], alignment: 'center'});
        dataRow3.push({text: dataBreed[row_index3]['mother_code'], alignment: 'center'});
        dataRow3.push('');
        row_index3++;
        var sprdate2 = dataBreed[row_index3]['breeding_date'].split('T');
        dataRow3.push({text: sprdate2[0], alignment: 'center'});
        dataRow3.push({text: dataBreed[row_index3]['mother_code'], alignment: 'center'});
        dataRow3.push('');
        data_detail3.push(dataRow3);
        row_index3++;
    }

    pdfMake.fonts = {
        SriSuriwongse: {

            normal: 'SRISURYWONGSE.ttf'
            , bold: 'SRISURYWONGSE-Bold.ttf'
        }
    };

    var dd = {
        content: [
            {
                columns: [

                    {text: [
                            {text: 'บัตรประจำตัวพ่อโค\n\n', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},

                            {text: ' หมายเลขทะเบียนโค '}
                            , {text: '    ' + datacow[0]['code'] + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' พันธุ์ '}
                            , {text: '    ' + datacow[0]['grade'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' ชื่อ '}
                            , {text: '    ' + datacow[0]['cow_breed']['name'] + '       ', decoration: 'underline', decorationStyle: 'dashed'},
                            {text: '\n\n วันเกิด  '}
                            , {text: '    ' + datacow[0]['birthday'] + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' น้ำหนักแรกเกิด '}
                            , {text: '    ' + datagrowthW[0]['weight'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' กิโลกรัม '}
                            , {text: '\n\n น้ำหนักหย่านม '}
                            , {text: '    ' + datagrowthW[0]['weight1'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' กิโลกรัม '}
                            , {text: ' อัตรการเจริญเติบโต '}
                            , {text: '    ' + datagrowthW[0]['growth_stat'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' กิโลกรัม '}

                        ], margin: [60, 0, 0, 0]},
                    {
                        table: {
                            headerRows: 1,
                            widths: [45, 45, 45, 45, 45, 45],
                            body: data_detail

                        }
                    }
                ]
            },

            {
                columns: [
                    {text: [
                            {text: ' \n\n\n ', alignment: 'center'},
                            {text: '     รหัสปู่  '}
                            , {text: '    12345     ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: '\n รหัส พ่อโค '}
                            , {text: '     ' + datacow[0]['father_code'] + '', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: '\n รหัสย่า ', alignment: 'center'}
                            , {text: '    12345    ', decoration: 'underline', decorationStyle: 'dashed'}


                        ], margin: [60, 0, 0, 0]},
                    {text: [
                            {text: ' \n\n\n ', alignment: 'center'},
                            {text: '     รหัสปู่  '}
                            , {text: '    12345     ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: '\n      รหัส แม่โค '}
                            , {text: '     ' + datacow[0]['mother_code'] + '', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: '\n รหัสย่า ', alignment: 'center'}
                            , {text: '    12345    ', decoration: 'underline', decorationStyle: 'dashed'}


                        ], margin: [30, 0, 0, 0]}
                ]
            },
            {
                columns: [
                    {text: [
                            {text: ' \n\n\n '},
                            {text: 'ลักษณะรูปพรรณ '}
                            , {text: '    ' + datacow[0]['description'] + '    ', decoration: 'underline', decorationStyle: 'dashed'}

                        ], margin: [60, 0, 0, 0]}
                ], pageBreak: 'after'
            },

            {text: 'สถิติการเจริญเติบโต รหัสโค :  ' + datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
            {
                table: {
                    headerRows: 1,
                    widths: [100, 70, 70, 120, 120, 100],
                    body: data_detail2, alignment: 'center'
                }, margin: [60, 10, 0, 0]
            }

            ,
            {text: '\n ประวัติการผสมพันธุ์ รหัสโค :  ' + datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
            {
                table: {
                    headerRows: 1,
                    widths: [70, 120, 100, 70, 120, 100],
                    body: data_detail3, alignment: 'center'
                }, margin: [60, 10, 0, 0]
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
        , pageOrientation: 'landscape'
    }

    pdfMake.createPdf(dd).download('บัตรประจำตัวพ่อโค รหัส' + datacow[0]['code'] + '.pdf');
}