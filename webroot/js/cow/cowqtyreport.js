function exportPDF(data) {
    var data_detail = [];
    var headerRow = [];
// set header
//headerRow.push('');
    headerRow.push({text: 'อำเภอ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    data.forEach(function (sourcehead) {
        headerRow.push({text: sourcehead.type, style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    });

    data_detail.push(headerRow);

// set detail

    data.forEach(function (sourceRow) {

        var dataRow = [];



        dataRow.push({text: sourceRow.district, alignment: 'center'});
        dataRow.push({text: sourceRow.amt, alignment: 'center'});

        data_detail.push(dataRow);
      
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
            {text: 'รายงานสรุปจำนวนวัว ', style: 'header', alignment: 'center'},
            {
                table: {
                    headerRows: 1,

                    body: data_detail

                }
                , margin: [0, 10, 0, 0]
            },
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

    pdfMake.createPdf(dd).download('summary_cow.pdf');
}