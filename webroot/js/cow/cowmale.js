function exportPDF(datacow, datagrowth) {
    var data_detail = [];
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
    var row_index = 1;
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

//return ;
    pdfMake.fonts = {
        SriSuriwongse: {

            normal: 'SRISURYWONGSE.ttf'
            , bold: 'SRISURYWONGSE-Bold.ttf'
        }
    };

    var dd = {
        content: [
            {
                alignment: 'justify',
                columns: [

                    {text: 'บัตรประจำตัวพ่อโค', style: 'header', alignment: 'center', margin: [0, 10, 0, 0]},
                    {
                        table: {
                            headerRows: 1,
                            widths: [45, 45, 45, 45, 45, 45],
                            body: data_detail
                        }
                    }

                ],
                columns: [

                    {text: 'บัตรประจำตัวพ่อโค', alignment: 'left'}
                ]
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

    pdfMake.createPdf(dd).download('บัตรประจำตัวพ่อโค.pdf');
}