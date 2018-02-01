function exportPDF (data,filter_text) {
    if(data ===''){
        return false;
    }
    var data_detail = [];
    var headerRow = [];

    headerRow.push({text: 'ลำดับ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'ชื่อ-นามสกุล', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'ระดับสมาชิก', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'รหัสประจำตัวประชาชน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headerRow.push({text: 'ที่อยู่', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    data_detail.push(headerRow);

// set detail
    var row_index = 1;
    data.forEach(function (sourceRow) {
        var dataRow = [];
        dataRow.push(row_index);
        dataRow.push(sourceRow.fullname);
        dataRow.push({text: sourceRow.grade, alignment: 'center'});
        dataRow.push({text: sourceRow.idcard, alignment: 'center'});
        dataRow.push({text: sourceRow.address.text, alignment: 'left'});
        data_detail.push(dataRow);
        row_index++;
    });

//return ;
    pdfMake.fonts = {
        SriSuriwongse: {

            normal: 'THSarabun.ttf'
            , bold: 'THSarabun-Bold.ttf'
        }
    };

    var dd = {
        content: [
            {text: 'รายงานผู้เลี้ยงโค ', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
            filter_text,
            {
                table: {
                    headerRows: 1,
                    widths: [25, 100, 60, 100,'*'],
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
    };

    pdfMake.createPdf(dd).download('herdsnam_report.pdf');
}