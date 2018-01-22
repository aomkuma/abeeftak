function exportPDF (data) {
    var data_detail = [];
    var headerRow = [];
// set header
//headerRow.push('ห้องประชุม');
    headerRow.push({text: 'ห้องประชุม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'พื้นที่', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'จำนวนครั้งที่ใช้งาน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'ปี', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    data_detail.push(headerRow);

// set detail
    var row_index = 1;
    data.forEach(function (sourceRow) {
        var dataRow = [];
        dataRow.push(sourceRow.name);
        dataRow.push(sourceRow.name);
        dataRow.push({text: sourceRow.name, alignment: 'center'});
        dataRow.push({text: sourceRow.name, alignment: 'center'});
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
            {text: 'สรุปการใช้ห้องประชุมประจำปี ', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
            {
                table: {
                    headerRows: 1,
                    widths: [170, 150, 100, 50],
                    body: data_detail
                }
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

    pdfMake.createPdf(dd).download('summary_room.pdf');
}