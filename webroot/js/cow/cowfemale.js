function exportPDF(data) {
    var data_detail = [];
    var headerRow = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow.push({text: 'ลำดับ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'ต้นทาง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'ปลายทาง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'วันที่เดินทาง', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'จุดประสงค์การเคลื่อนย้าย', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'ชื่อผู้ตรวจสอบ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail.push(headerRow);

// set detail
    var row_index = 1;
    data.forEach(function (sourceRow) {
        var dataRow = [];
        var sprdate = sourceRow.movement_date.split('T');
        dataRow.push({text: row_index, alignment: 'center'});
        dataRow.push({text: sourceRow.departure, alignment: 'center'});
        dataRow.push({text: sourceRow.destination, alignment: 'center'});
        dataRow.push({text: sprdate[0], alignment: 'center'});
        dataRow.push({text: sourceRow.description, alignment: 'center'});
        dataRow.push('');
        dataRow.push('');
        data_detail.push(dataRow);
        row_index++;
    });
//return ;
    pdfMake.fonts = {
        SriSuriwongse: {

            normal: 'SRISURYWONGSE.ttf'
            , bold: 'SRISURYWONGSE-Bold.ttf'
        }
    };

    var dd = {
        content: [ 
            {text: 'ประวัติการเคลื่อนย้าย รหัสโค :  ', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
            {
                table: {
                    headerRows: 1,
                    widths: [50, 90, 90, 80, 100, 100, 100],
                    body: data_detail
                }
//                ,pageBreak: 'after'
            }
//            ,{text: 'สถิติการเจริญเติบโต (พ่อโค) ', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]}, {
//                table: {
//                    headerRows: 1,
//                    widths: [50, 50, 50, 80, 80, 50],
//                    body: data_detail2
//                }
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
        ,pageOrientation: 'landscape'
    }

    pdfMake.createPdf(dd).download('ประวัติการเคลื่อนย้าย.pdf');
}