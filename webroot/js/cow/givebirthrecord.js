function exportPDF(data) {
    var data_detail = [];
    var headerRow = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow.push({text: 'วันที่ผสม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'หมายเลขพ่อโค', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'วันที่คลอด', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'หมายเลขลูกโค', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'หมายเหตุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail.push(headerRow);

// set detail
    var row_index = 1;
    data.forEach(function (sourceRow) {
        var dataRow = [];
        var sprdate = sourceRow.breeding_date.split('T');
        dataRow.push({text: sprdate[0], alignment: 'center'});
        dataRow.push({text: sourceRow.father_code, alignment: 'center'});
        dataRow.push('');
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
            {text: 'ประวัติการให้ลูก รหัสโค :  ', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
            {
                table: {
                    headerRows: 1,
                    widths: [50, 80, 50, 80, 80],
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
//        ,pageOrientation: 'landscape'
    }

    pdfMake.createPdf(dd).download('ประวัติการให้ลูก.pdf');
}