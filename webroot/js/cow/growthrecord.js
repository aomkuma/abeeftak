function exportPDF(data) {
    var data_detail = [];
    var headerRow = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow.push({text: 'วันที่', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'อายุ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'น้ำหนัก', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'จำนวนอาหารที่กิน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'น้ำหนักเพิ่ม กรัม/วัน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'คะแนน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});

    data_detail.push(headerRow);

// set detail
    var row_index = 1;
    data.forEach(function (sourceRow) {
        var dataRow = [];
        var sprdate = sourceRow.record_date.split('T');
        dataRow.push({text: sprdate[0], alignment: 'center'});
        dataRow.push({text: sourceRow.age, alignment: 'center'});
        dataRow.push({text: sourceRow.weight, alignment: 'center'});
        dataRow.push({text: sourceRow.total_eating, alignment: 'center'});
        dataRow.push({text: sourceRow.growth_stat, alignment: 'center'});
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
            {text: 'สถิติการเจริญเติบโต รหัสโค :  ', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
            {
                table: {
                    headerRows: 1,
                    widths: [50, 50, 50, 80, 80, 50],
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

    pdfMake.createPdf(dd).download('สถิติการเจริญเติบโต.pdf');
}