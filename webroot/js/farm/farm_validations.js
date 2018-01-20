var Validation = function () {
    return {
        //Validation
        initValidation: function () {
            $("#frm").validate({
                rules:
                        {
                            name:
                                    {
                                        required: true
                                    },
                            "address[address_line]":
                                    {
                                        required: true
                                    },
                            "address[houseno]":
                                    {
                                        required: true
                                    },
                            "address[villageno]":
                                    {
                                        required: true,
                                        number:true
                                    },
                            "address[villagename]":
                                    {
                                        required: true
                                    },
                            "address[subdistrict]":
                                    {
                                        required: true
                                    },
                            "address[district]":
                                    {
                                        required: true
                                    },
                            "address[province_id]":
                                    {
                                        required: true
                                    },
                            "address[postalcode]":
                                    {
                                        required: true
                                    },
                            lastname:
                                    {
                                        required: true
                                    },

                            phone:
                                    {
                                        required: true,
                                        number: true
                                    },
                            address1:
                                    {
                                        required: true
                                    }

                        },

                // Messages for form validation
                messages:
                        {
                            name:
                                    {
                                        required: 'กรูณาระบุชื่อฟาร์ม'
                                    },
                            "address[address_line]":
                                    {
                                        required: 'กรุณาระบุที่อยู่'
                                    },
                            "address[houseno]":
                                    {
                                        required: "กรุณาระบุบ้านเลขที่"
                                    },
                            "address[villageno]":
                                    {
                                        required: "กรุณาระบุหมู่ที่",
                                        number: "ตัวเลขเท่านั้น"
                                    },
                            "address[villagename]":
                                    {
                                        required: "กรูณาระบุชื่อหมู่บ้าน"
                                    },
                            "address[subdistrict]":
                                    {
                                        required: "กรุณาระบุตำบล"
                                    },
                            "address[district]":
                                    {
                                        required: "กรูณาระบุอำเภอ"
                                    },
                            "address[province_id]":
                                    {
                                        required: "กรุณาระบุจังหวัด"
                                    },
                            "address[postalcode]":
                                    {
                                        required: "กรูณาระบุรหัสไปรษณีย์"
                                    },
                            phone:
                                    {
                                        number: 'Please enter valid Phone No.'
                                    },
                            card_no:
                                    {
                                        number: 'Please enter valid Card No.'
                                    }
                        },

                // Do not change code below
                errorPlacement: function (error, element)
                {
                    error.insertAfter(element.parent());
                }
            });
        }

    };
}();