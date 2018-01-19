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
                            email:
                                    {
                                        required: true,
                                        email: true
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
                                        required: 'Please enter something'
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