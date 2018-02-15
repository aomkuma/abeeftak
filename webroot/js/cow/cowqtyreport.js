function exportPDF(data, data2, data3, data4, data5, data6, data7, data8) {
    var data_detail = [];
    var headerRow = [];
    var headday = ['แรกเกิด', '205', '365', '548', '2 ปี', '3 ปี', '4 ปี', '5 ปี'];

// set header
//headerRow.push('');
    headerRow.push({text: 'อำเภอ', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    headday.forEach(function (sourcehead) {
        headerRow.push({text: 'อายุ ' + sourcehead, style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
    });

    data_detail.push(headerRow);

// set detail
    var index = 0;
    data.forEach(function (sourceRow) {

        var dataRow = [];



        dataRow.push({text: sourceRow.amphur, alignment: 'center'});

        dataRow.push({text: sourceRow.cnt + ' ตัว', alignment: 'center'});
        dataRow.push({text: data2[index].cnt + ' ตัว', alignment: 'center'});
        dataRow.push({text: data3[index].cnt + ' ตัว', alignment: 'center'});
        dataRow.push({text: data4[index].cnt + ' ตัว', alignment: 'center'});
        dataRow.push({text: data5[index].cnt + ' ตัว', alignment: 'center'});
        dataRow.push({text: data6[index].cnt + ' ตัว', alignment: 'center'});
        dataRow.push({text: data7[index].cnt + ' ตัว', alignment: 'center'});
        dataRow.push({text: data8[index].cnt + ' ตัว', alignment: 'center'});
        data_detail.push(dataRow);
index++;
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
            {text: 'รายงานสรุปจำนวนโค ', style: 'header', alignment: 'center'},
            {
                table: {
                    headerRows: 1,

                    body: data_detail

                }
                , margin: [65, 10, 0, 0]
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