function exportPDF(datacow, datagrowth, datagrowthW, datagbR, datafath, datamoth) {
    var data_detail = [];
    var firstRow = [];
// set header
//headerRow.push('ห้องประชุม');
    firstRow.push({text: 'น้ำหนักและคะแนนของแม่โค', style: 'tableHeader', colSpan: 6, alignment: 'center', fontSize: 12, bold: true});
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
    for (var i = 0; i < 5; i++) {
        var firstRow = [];
        if (i < datagrowth.length) {
            if (datagrowth[i]['record_date'] !== null) {
                var sprdate = datagrowth[i]['record_date'].split('T');
                firstRow.push({text: sprdate[0], alignment: 'center'});
            } else {
                firstRow.push({text: '-', alignment: 'center'});
            }

            if (datagrowth[i]['age'] !== null) {

                firstRow.push({text: datagrowth[i]['age'], alignment: 'center'});

            } else {
                firstRow.push({text: '-', alignment: 'center'});
            }

            if (datagrowth[i]['weight'] !== null) {

                firstRow.push({text: datagrowth[i]['weight'], alignment: 'center'});

            } else {
                firstRow.push({text: '-', alignment: 'center'});
            }

            if (datagrowth[i]['growth_stat'] !== null) {

                firstRow.push({text: datagrowth[i]['growth_stat'], alignment: 'center'});

            } else {
                firstRow.push({text: '-', alignment: 'center'});
            }

            if (datagrowth[i]['height'] !== null) {

                firstRow.push({text: datagrowth[i]['height'], alignment: 'center'});

            } else {
                firstRow.push({text: '-', alignment: 'center'});
            }

            if (datagrowth[i]['chest'] !== null) {

                firstRow.push({text: datagrowth[i]['chest'], alignment: 'center'});

            } else {
                firstRow.push({text: '-', alignment: 'center'});
            }

        } else {
            firstRow.push({text: '-', alignment: 'center'});
            firstRow.push({text: '-', alignment: 'center'});
            firstRow.push({text: '-', alignment: 'center'});
            firstRow.push({text: '-', alignment: 'center'});
            firstRow.push({text: '-', alignment: 'center'});
            firstRow.push({text: '-', alignment: 'center'});
        }
        data_detail.push(firstRow);
    }

    var sprdatecow = datacow[0]['birthday'].split('T');
    datacow[0]['birthday'] = sprdatecow[0];
//return ;

    var data_detail3 = [];
    var headerRow3 = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow3.push({text: 'วันที่ผสม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'หมายเลขพ่อโค', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'วันที่คลอด', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'หมายเลขลูกโค', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'วันที่ผสม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'หมายเลขพ่อโค', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'วันที่คลอด', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow3.push({text: 'หมายเลขลูกโค', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail3.push(headerRow3);

// set detail
    var row_index3 = 0;
    for (var i = 0; i < 10; i++) {
        var dataRow3 = [];
        if (row_index3 < datagbR.length) {

            if (datagbR[row_index3]['breeding_date'] !== null) {
                var sprdate = datagbR[row_index3]['breeding_date'].split('T');
                dataRow3.push({text: sprdate[0], alignment: 'center'});
            } else {
                dataRow3.push({text: '-', alignment: 'center'});
            }

            if (datagbR[row_index3]['father_code'] !== null) {

                dataRow3.push({text: datagbR[row_index3]['father_code'], alignment: 'center'});

            } else {
                dataRow3.push({text: '-', alignment: 'center'});
            }

            dataRow3.push('');
            dataRow3.push('');

            row_index3++;
            if (row_index3 < datagbR.length) {
                if (datagbR[row_index3]['breeding_date'] !== null) {
                    var sprdate2 = datagbR[row_index3]['breeding_date'].split('T');
                    dataRow3.push({text: sprdate2[0], alignment: 'center'});
                } else {
                    dataRow3.push({text: '-', alignment: 'center'});
                }

                if (datagbR[row_index3]['father_code'] !== null) {

                    dataRow3.push({text: datagbR[row_index3]['father_code'], alignment: 'center'});

                } else {
                    dataRow3.push({text: '-', alignment: 'center'});
                }

                dataRow3.push('');
                dataRow3.push('');
            } else {
                dataRow3.push({text: '-', alignment: 'center'});
                dataRow3.push({text: '-', alignment: 'center'});
                dataRow3.push({text: '-', alignment: 'center'});
                dataRow3.push({text: '-', alignment: 'center'});
            }

            row_index3++;
        } else {
            dataRow3.push({text: '-', alignment: 'center'});
            dataRow3.push({text: '-', alignment: 'center'});
            dataRow3.push({text: '-', alignment: 'center'});
            dataRow3.push({text: '-', alignment: 'center'});
            dataRow3.push({text: '-', alignment: 'center'});
            dataRow3.push({text: '-', alignment: 'center'});
            dataRow3.push({text: '-', alignment: 'center'});
            dataRow3.push({text: '-', alignment: 'center'});

        }
        data_detail3.push(dataRow3);

    }

    pdfMake.fonts = {
        SriSuriwongse: {

            normal: 'THSarabun.ttf'
            , bold: 'THSarabun-Bold.ttf'
        }
    };

    var dd = {
        content: [
            {
                columns: [

                    {text: [
                            {text: 'บัตรประจำตัวแม่โค\n\n', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},

                            {text: ' หมายเลขทะเบียนโค '}
                            , {text: '    ' + datacow[0]['code'] + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' พันธุ์ '}
                            , {text: '    ' + datacow[0]['grade'] + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' ชื่อ '}
                            , {text: '    ' + (datacow[0]['cow_breed']['name']=== 0 ? ' - ' : datacow[0]['cow_breed']['name']) + '       ', decoration: 'underline', decorationStyle: 'dashed'},
                            {text: '\n\n วันเกิด  '}
                            , {text: '    ' + datacow[0]['birthday'] + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' น้ำหนักแรกเกิด '}
                            , {text: '    ' + (datagrowthW.length === 0 ? ' - ' : datagrowthW[0]['weight']) + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' กิโลกรัม '}
                            , {text: '\n\n น้ำหนักหย่านม '}
                            , {text: '    ' + (datagrowthW.length === 0 ? ' - ' : datagrowthW[0]['weight1']) + '       ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: ' กิโลกรัม '}
                            , {text: ' อัตรการเจริญเติบโต '}
                            , {text: '    ' + (datagrowthW.length === 0 ? ' - ' : datagrowthW[0]['growth_stat']) + '       ', decoration: 'underline', decorationStyle: 'dashed'}
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
                            , {text: '    ' + (datafath.length === 0 ? ' - ' : datafath[0]['father_code']) + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: '\n รหัส พ่อโค '}
                            , {text: '     ' + (datacow[0]['father_code'] === null ? ' - ' : datacow[0]['father_code']) + '', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: '\n รหัสย่า ', alignment: 'center'}
                            , {text: '    ' + (datafath.length === 0 ? ' - ' : datafath[0]['mother_code']) + '      ', decoration: 'underline', decorationStyle: 'dashed'}


                        ], margin: [60, 0, 0, 0]},
                    {text: [
                            {text: ' \n\n\n ', alignment: 'center'},
                            {text: '     รหัสปู่  '}
                            , {text: '    ' + (datamoth.length === 0 ? ' - ' : datamoth[0]['father_code']) + '      ', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: '\n      รหัส แม่โค '}
                            , {text: '     ' + (datacow[0]['mother_code'] === null ? ' - ' : datacow[0]['mother_code']) + '', decoration: 'underline', decorationStyle: 'dashed'}
                            , {text: '\n รหัสย่า ', alignment: 'center'}
                            , {text: '    ' + (datamoth.length === 0 ? ' - ' : datamoth[0]['mother_code']) + '      ', decoration: 'underline', decorationStyle: 'dashed'}


                        ], margin: [30, 0, 0, 0]}
                ]
            },
            {
                columns: [
                    {text: [
                            {text: ' \n\n\n '},
                            {text: 'ลักษณะรูปพรรณ '}
                            , {text: '    ' + (datacow[0]['description']=== null ? ' - ' :datacow[0]['description']) + '    ', decoration: 'underline', decorationStyle: 'dashed'}

                        ], margin: [60, 0, 0, 0]}
                ], pageBreak: 'after'
            },

            {text: 'ประวัติการให้ลูก รหัสโค :  ' + datacow[0]['code'], style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
            {
                table: {
                    headerRows: 1,
                    widths: [70, 100, 70, 90, 70, 100, 70, 90],
                    body: data_detail3, alignment: 'center'
                }, margin: [30, 10, 0, 0]
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

    pdfMake.createPdf(dd).download('บัตรประจำตัวแม่โค รหัส' + datacow[0]['code'] + '.pdf');
}