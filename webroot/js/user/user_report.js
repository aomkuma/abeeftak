function exportPDF(data, data2) {
    var data_detail = [];
    var headerRow = [];
// set header
//headerRow.push('');
    headerRow.push({text: 'ลำดับที่', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'ชื่อ - นามสกุล', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'E-mail', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'ตำแหน่ง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail.push(headerRow);

// set detail
    var row_index = 1;
    data.forEach(function (sourceRow) {

        var dataRow = [];
//        dataRow.push(row_index);
        var nameuser = sourceRow.title + sourceRow.firstname + ' ' + sourceRow.lastname;
//        dataRow.push(nameuser);
//
//        dataRow.push(sourceRow.email);
//        dataRow.push(sourceRow.role.name);

        dataRow.push({text: row_index, alignment: 'center'});
        dataRow.push({text: nameuser, alignment: 'center'});
        dataRow.push({text: sourceRow.email, alignment: 'center'});
        dataRow.push({text: sourceRow.role.name, alignment: 'center'});
        data_detail.push(dataRow);
        row_index++;
    });

//return ;

    var data_detail2 = [];
    var headerRow2 = [];
    headerRow2.push({text: 'ตำแหน่ง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow2.push({text: 'จำนวน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail2.push(headerRow2);
    data2.forEach(function (sourceRow) {

        var dataRow = [];



        dataRow.push({text: sourceRow.role.name, alignment: 'center'});
        dataRow.push({text: sourceRow.count, alignment: 'center'});
        data_detail2.push(dataRow);

    });

    pdfMake.fonts = {
        SriSuriwongse: {

            normal: 'SRISURYWONGSE.ttf'
            , bold: 'SRISURYWONGSE-Bold.ttf'
        }
    };

    var dd = {
        content: [
            {text: 'รายงานข้อมูลผู้ปฏิบัติงาน ', style: 'header', alignment: 'center'},
            {
                table: {
                    headerRows: 1,
                    widths: [50, 150, 150, 100],
                    body: data_detail
                    
                }
               ,margin: [0, 10, 0, 0]
            },
            {text: 'สรุปจำนวนผู้ปฏิบัติงาน ', style: 'header', alignment: 'center', margin: [0, 30, 0, 0]},
            {
                table: {
                    headerRows2: 1,
                    widths: [50, 150],
                    body: data_detail2
                }
                ,margin: [0, 10, 0, 0]
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
    }

    pdfMake.createPdf(dd).download('summary_user.pdf');
}